<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Creating users
     */
    public function create(Request $req){
        if($req->password != $req->vpassword)
        return $this->response(false, "Missing verification password!");

        $user = new User();
        $user->username = $req->username;
        $user->password = $req->password;
        $user->save();
        return $this->response(true, $user->id_user);
    }
    public function login(Request $req){
        $exist = User::whereUsername($req->username)->wherePassword($req->password)->exists();
        return $this->response($exist, !$exist ? "Wrong username or password" : null);
    }
    function response(bool $success = true, string $msg = null){
        return response()->json([ "success" => $success, "message" => $msg ]);
    }
}