<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    // username, password, vpassword
    public function create(Request $req){
        if($req->password != $req->vpassword)
        return $this->response(false, "Wrong verification password!");

        $user = new User();
        $user->username = $req->username;
        $user->password = $req->password;
        $user->save();
        return $this->response(true, $user->id_user);
    }
    // username, password
    public function login(Request $req){
        $exist = User::whereUsername($req->username)->wherePassword($req->password)->exists();
        return $this->response($exist, !$exist ? "Wrong username or password" : null);
    }
    // id_user
    public function show(string $id_user){
        return response()->json(User::whereIdUser($id_user)->first(["username"]));
    }
    // id_user, image, description
    public function profile(Request $req){
        if(!User::validate($req->id_user)) return response();
        $user = User::whereIdUser($req->id_user);
        $req->file("image")->move(public_path()."/profiles", $user->first(["username"])->username);
        $user->update([ "description" => $req->description ]);
        return response()->json([ "success" => true ]);
    }
    function response(bool $success = true, string $msg = null){
        return response()->json([ "success" => $success, "message" => $msg ]);
    }
}