<?php 
namespace Controllers;

use App;
use Models\Post;
use Models\Comment;

class CommentController{
    protected $pdo;
    public function __construct(){
        $this->pdo=App::get("database");
    }
    public function index(){
        $posts=Post::get();
        $comments=Comment::get();
     $encodedPost=json_encode($posts);
     $encodedComment=json_encode($comments);
    return back()->with(["posts"=>$encodedPost,"comments"=>$encodedComment]);
    }
    public function store(){
       $model=new self();
       $body=request("body");
       $postID=request("postID");
       if(empty($body)){
           return back()->with(["commentError"=>"You can't upload empty comment"]);
       }
       try{
           Comment::create([
               "body"=>$body,
               "user_id"=>1,
               "post_id"=>$postID
           ]);
           return back()->with(['success'=>"Comment Created!"]);
       }catch(\PDOException $err){
           echo $err->getMessage();
       }
    }
}
?>