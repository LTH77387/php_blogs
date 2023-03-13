<?php

use Controllers\AuthController;
use Controllers\PostController;
use Controllers\IndexController;

//for index controller 
Route::get("",[IndexController::class,'index'])->name('home');

// For posts 
Route::get("posts/create",[PostController::class,'store']);

//for auth 
Route::get('register',[AuthController::class,'register']);
Route::post('register',[AuthController::class,'store'])->name('register');

?>