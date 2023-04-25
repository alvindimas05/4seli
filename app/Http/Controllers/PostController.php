<?php

namespace App\Http\Controllers;

use App\Models\Fek;
use App\Models\Post;
use App\Models\Rill;
use App\Models\User;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function create(Request $req){
        if(!User::validate($req->id_user)) return response();

        $post = new Post();
        $post->title = $req->title;
        $post->description = $req->description;
        $post->save();

        $req->file("image")->move(public_path()."/images", $post->id_post);
        return response()->json([ "id_post" => $post->id_post ]);
    }
    public function rill(Request $req){
        return $this->postres($req, true);
    }
    public function fek(Request $req){
        return $this->postres($req, false);
    }
    public function postres(Request $req, bool $rill){
        if(!User::validate($req->id_user) || !Post::validate($req->id_post)) return response();

        $val = $rill ? new Rill() : new Fek();
        $val = $val->whereIdUser($req->id_user)->whereIdPost($req->id_post);
        if($val->exists) $val->delete();
        else {
            $rill = $rill ? new Rill() : new Fek();
            $rill->id_post = $req->id_post;
            $rill->id_user = $req->id_user;
            $rill->save();
        }
        return response();
    }
}
