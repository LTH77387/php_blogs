<?php
namespace Controllers;

use App;
use core\Auth;
use Models\Post;
use Models\User;
use PDOException;
use Models\Comment;
use Models\Category;

class PostController{
    public function create(){
        // check if the user is logined or not
        if(Auth::check()){
            // dd($_SESSION['user_id']);
            $categories=Category::get();
            view("create","User","Post",[
                "categories"=>$categories
            ]);
        }else{
            return redirect("/register");
        }
       
        
    }
    ########## STORE ##########
    public function store(){
        // Validator::make(request()->all(),[
            // "name" => "required",
        // ])->validate();
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
        //if there is smth wrong, the errors will be returned.
        if(!empty($errors)){
            return back()->with($errors);
        }

        // default array to be created
                $createData=[
                    "title"=>$title,
                    "body"=>$body,
                    "user_id"=>1,
                    "category_id"=>$category_id
                ];
        // test whether the image exists or not
        $imgErr= $_FILES['image']['error'];

        //if err !==0 upload image is null
        if($imgErr!==0){
            //try catch and insert post data
             //if image is null
        try{
            Post::create($createData);
            return back()->with(["success"=>"Post Created!"]);
            }catch(PDOException $err){
            echo $err->getMessage();
            }
        }
        if(isset($_FILES['image'])){
            $imgName=uniqid() . '_' . $_FILES['image']['name'];
            $tmpName = $_FILES['image']['tmp_name'];
            $valid_extensions = ['jpg', 'jpeg', 'png'];
            $extension = strtolower(pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION));
        //image include if err==0
        if($imgErr==0){
            if (!in_array($extension, $valid_extensions)) {
                // handle invalid file type
                return back()->with(['typeError' => 'Invalid file type']);
            }

        // size testing
            if($imgErr <= 3145728){ //3 mb
                //continue uploading
            $createData['image']=$imgName;
            $target_file='storage/' . $imgName;
            move_uploaded_file($tmpName,$target_file); //store in folder
            try{
                Post::create($createData);
                return back()->with(["success"=>"Post Created!"]);
            }catch(PDOException $err){
                echo $err->getMessage();
            }
            }else{
                //size error
                return back()->with(["sizeError"=>"Image Size is too large"]);
            }
            
        }else {
            //error in uploading
            return back()->with(["errorUploading"=>"There's an error in uploading image"]);
        }
        }
        
    }
    ########## EDIT ##########
    public function edit($id){
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
    ########## UPDATE ##########
    public function update($id){
        $imgErr= $_FILES['updateImage']['error'];
        // dd($imgErr);//error if null 
        $title=request("title");
        $body=request("body");
        $category_id=request("category_id");
        $updateData=[
            "title"=>$title,
            "body"=>$body,
            "user_id"=>1,
            "category_id"=>$category_id
        ];
        $find = Post::find($id);
        $getImage = $find->image;
        //image null case
        if($imgErr!==0){
           
                // no new image uploaded
                $updateData['image'] = $getImage; // set image to old image name
                try {
                    Post::update($id, $updateData);
                    return back()->with(["updateSuccess" => "Post Updated!"]);
                } catch(PDOException $err) {
                    echo $err->getMessage();
                }
        }
        // test the image 
        if (isset($_FILES['updateImage'])) {
            // dd($_FILES['updateImage']); //new image
            $imgName=uniqid() . '_' . $_FILES['updateImage']['name'];
          
            $tmpName = $_FILES['updateImage']['tmp_name'];
            $valid_extensions = ['jpg', 'jpeg', 'png'];
            $extension = strtolower(pathinfo($_FILES['updateImage']['name'], PATHINFO_EXTENSION));
            $fileError=$_FILES['updateImage']['error'];
 
            // dd($getImage); //old image
            $file_path = $_SERVER['DOCUMENT_ROOT'] . '/storage/' . $getImage;
            if($fileError == UPLOAD_ERR_OK){


            //type testing 
                if (!in_array($extension, $valid_extensions)) {
                       // handle invalid file type
                         return back()->with(['typeError' => 'Invalid file type']);
                 }

             //if type ok 
    
                //size testing 
                if($imgErr <= 3145728){
                    //image update if all conditions fine 
                    $updateData['image']=$imgName;
                    $target_file='storage/' . $imgName;
                    move_uploaded_file($tmpName,$target_file); //store in folder
    
                    // Delete the old image file only after the new file has been uploaded successfully
                    if (file_exists($file_path)) {
                        unlink($file_path);
                    }
    
                    try{ //Category::update()
                        Post::update($id,$updateData);
                        return back()->with(["success"=>"Post Updated!"]);
                    }catch(PDOException $err){
                        echo $err->getMessage();
                    }
    
                }else{
                    //size error 
                    return back()->with(["sizeError"=>"Image Size is too large"]);
                }

            
            } else {
                //if there is something wrong. 
                return back()->with(["errorUploading"=>"There's an error in uploading image"]);
            }
        }
    }
    ########## SHOW ##########
    public function show($id){
        $post=Post::find($id);
        $categories=Category::get();
        $comments=Comment::get();
        $users=User::get();
        view("show","User","Post",[
            "post"=>$post,
            "categories"=>$categories,
            "comments"=>$comments,
            "users"=>$users
        ]);
    }
    ########## DELETE ##########
    public function delete($id){
        // Post::where("posts.id",$id)->delete();
        Post::delete($id);
        return back()->with(["success"=>"Post Deleted!"]);
    }
}
?>