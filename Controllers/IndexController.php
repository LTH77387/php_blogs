<?php
namespace Controllers;

use Models\Post;
use Models\User;
use Models\Model;

class IndexController{
   
   public function index(){
      $posts=Post::get();
    view("index","","",[
      "posts"=>$posts
    ]);
   }
}

?>