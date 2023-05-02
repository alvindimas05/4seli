<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::controller(UserController::class)->prefix("users")->group(function(){
    Route::post("/create", "create");
    Route::post("/login", "login");
    Route::post("/profile", "profile");
    Route::get("/{id_user}", "show");
});
Route::controller(PostController::class)->prefix("posts")->group(function(){
    Route::post("/", "create");
    Route::post("/rill", "rill");
    Route::post("/fek", "fek");
    Route::get("/comment", "comments");
    Route::post("/comment", "comment");
    Route::get("/{id_post?}", "show");
});