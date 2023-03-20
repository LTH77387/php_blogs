<?php
namespace Controllers;

use App;
use core\Auth;
use Models\Post;
use Models\Category;

class PostController{
    public function create(){
        $categories=Category::get();
    view("create","User","Post",[
        "categories"=>$categories
    ]);
        
    }
    public function store(){
        $errors=[];
        $title=request('title');
        $body=request('body');
        $category_id=request('category_id');
        if(empty($title)){
            $errors['titleErr']="Titile field is required";
        }
         if(empty($body)){
            $errors['bodyErr']="Body field is required";
        }
         if (empty($category_id)){
            $errors['categoryIDErr']="Choose Category";
        }
     if(!empty($errors)){
         return back()->with($errors);
     }else{
         try{
            Post::create([
                "title"=>$title,
                "body"=>$body,
                "user_id"=>1,
                "category_id"=>$category_id
            ]);
            return back()->with(["success"=>"Post Created"]);
         }catch(PDOException $err){
             echo $err->getMessage();
         }
     }
    }
    public function edit($id){
    //     $pdo=App::get("database");
    //     $sql="SELECT * FROM posts INNER JOIN categories ON posts.category_id=categories.id";
    //    $statement=$pdo->prepare($sql);
    //  $relation= $statement->execute();
       $post=Post::find($id);
       $category_id=$post->category_id;
       $category=Category::find($category_id);
       $categories=Category::get();
        // $category=Category::find($category_id);
        view("update","User","Post",[
            "post"=>$post,
           "categories"=>$categories
        ]);
    }
    public function update($id){
        Post::update($id,[
            "title"=>request("title"),
            "body"=>request("body"),
            "user_id"=>1,
            "category_id"=>request("category_id")
        ]);
        return back()->with(["success"=>"Post Updated!"]);
    }
    public function delete($id){
        Post::delete($id);
        return back()->with(["success"=>"Post Deleted!"]);
    }
}
?>