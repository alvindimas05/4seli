<?php

namespace App\Http\Controllers;

use App\Jobs\CanCommentJob;
use App\Models\Comment;
use App\Models\Fek;
use App\Models\Post;
use App\Models\Rill;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function show(string $id_post = null){
        $posts = $id_post == null ? Post::paginate(10) : 
        Post::whereIdPost($id_post)->first();
        
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
    // title, description, id_user
    public function create(Request $req){
        if(!User::validate($req->id_user)) return response();

        $post = new Post();
        $post->title = $req->title;
        $post->description = $req->description;
        $post->save();

        $req->file("image")->move(public_path()."/images", $post->id_post);
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
