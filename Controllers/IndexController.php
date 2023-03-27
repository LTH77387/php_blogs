<?php
namespace Controllers;

use App;
use PDO;
use Models\Post;
use Models\User;
use Models\Model;
use Models\Category;

class IndexController{
  protected $pdo;
   public function __construct(){
     $this->pdo=App::get("database");
   }
   public function index(){
     $posts= Post::paginate(5); //loading concept
     $categories=Category::get();
     view("index","","",[
       "posts"=>$posts,
       "categories"=>$categories
      ]);
   }
}

?>