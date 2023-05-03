<?php

namespace App\Http\Controllers;

use App\Jobs\CanCommentJob;
use App\Models\Block;
use App\Models\Comment;
use App\Models\Fek;
use App\Models\Post;
use App\Models\Rill;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\File;

class PostController extends Controller
{
    public $min_rill_fek = 5;
    // id_user?
    public function show(Request $req, string $id_post = null, string $search = null, bool $trending = false){
        $id_user = $req->id_user | null;
        $posts = new Post;
        if($id_post != null) $posts->whereIdPost($id_post);
        if($search !== null) $posts->orWhere("title", "like", "%".$search."%")->orWhere("description", "like", "%".$search."%");
        if($trending) $posts->where("rill", ">", $this->min_rill_fek)->orWhere("fek", ">", $this->min_rill_fek);

        if($id_user !== null){
            $blocks = Block::whereIdUserMe($id_user)->get(["id_user_you"]);
            foreach($blocks as $block)
                $posts->where("id_user", "<>", $block->id_user_you);
        }

        if($id_post === null) $posts = $posts->paginate(10);
        else $posts = $posts->first();

        $comments = Comment::where(function(Builder $query) use ($posts, $id_post){
            if($id_post != null)
                $query->orWhere("id_post", "=", $posts->id_post);
            else {
                foreach($posts as $post)
                    $query->orWhere("id_post", "=", $post->id_post);
            }
        })->get();
        for($i = 0; $i < count($comments); $i++){
            $tcom = $comments[$i]->created_at;
            $tdif = Carbon::now()->diff($tcom);
            unset($comments[$i]->created_at);

            $time = $tdif->s." seconds";;
            if($tdif->m > 0) $time = $tdif->m." months";
            else if($tdif->d > 0) $time = $tdif->d." days";
            else if($tdif->h > 0) $time = $tdif->h." hours";
            else if($tdif->m > 0) $time = $tdif->m." minutes";

            $comments[$i]->time = $time." ago...";
        }
        if($id_post != null) $posts->comments = $comments;
        else {
            for($i = 0; $i < count($posts); $i++){
                $post_comments = [];
                foreach($comments as $com){
                    if($com->id_post == $posts[$i]->id_post)
                        array_push($post_comments, $com);
                }
                $posts[$i]->comments = $post_comments;
            }
        }
        return response()->json($posts);
    }
    public function trending(Request $req){
        return $this->show($req, null, null, true);
    }
    // query
    public function search(Request $req, string $query = null){
        return $this->show($req, null, $query);
    }
    // title, description, id_user
    public function create(Request $req){
        if(!User::validate($req->id_user)) return response();
        $req->validate(["image" => File::types(["jpg", "png", "jpg", "gif", "mp4"])->max(5 * 1024)]);

        $isImage = $req->file("image")->getClientOriginalExtension() != "mp4";
        $post = new Post();
        $post->id_user = $req->id_user;
        $post->title = $req->title;
        $post->description = $req->description;
        $post->isImage = $isImage;
        $post->save();

        $req->file("image")->move(public_path().($isImage ? "/images" : "/videos"), $post->id_post);
        return response()->json([ "id_post" => $post->id_post ]);
    }
    // id_user, id_post, comment
    public function comment(Request $req){
        if(!User::validate($req->id_user) || !Post::validate($req->id_post)) return response();
        $user = User::whereIdUser($req->id_user)->first(["canComment"]);

        if(!$user->canComment) return response()->json([ "cooldown" => true ]);
        User::whereIdUser($req->id_user)->update([ "canComment" => 0 ]);

        $comment = new Comment();
        $comment->id_user = $req->id_user;
        $comment->id_post = $req->id_post;
        $comment->comment = $req->comment;
        $comment->save();

        CanCommentJob::dispatch($req->id_user)->delay(now()->addMinutes(2));
        return response()->json([ "cooldown" => false ]);
    }
    // id_user, id_post
    public function rill(Request $req){
        return $this->postres($req, true);
    }
    // id_user, id_post
    public function fek(Request $req){
        return $this->postres($req, false);
    }
    public function postres(Request $req, bool $rill){
        if(!User::validate($req->id_user) || !Post::validate($req->id_post)) return response();

        $val = $rill ? Rill::whereIdUser($req->id_user)->whereIdPost($req->id_post)
        : Fek::whereIdUser($req->id_user)->whereIdPost($req->id_post);
        $exist = $val->first() !== null;
        if($exist) $val->delete();
        else {
            $val = $rill ? new Rill() : new Fek();
            $val->id_post = $req->id_post;
            $val->id_user = $req->id_user;
            $val->save();
        }

        Post::whereIdPost($req->id_post)->increment("rill", $exist ? -1 : 1);
        return response("");
    }
}
