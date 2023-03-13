<?php 
namespace Controllers;

use Models\User;

class AuthController{
    public function register(){
       view("register","Auth");
    }
    public function store(){
        $userName=request('userName');
        $email=request('email');
        $password=request('password');

            // Validator::make([

            //]);
        $errors = [];
        $success=[];
        if($userName==""){
            $errors["nameErr"] = "Name field is required";
        }
        
        if($email=="") {
            $errors["emailErr"] = "Email field is required";
        }
        
        if($password==""){
            $errors["passwordErr"] = "Password field is required";
        }
        
        if(!empty($errors)){
            return back()->with($errors);
        }else{
          try{
                User::create([
                'name'=>$userName,
                'email'=>$email,
                'password'=>$password
            ]);
            return back()->with(["success"=>"User Created!"]);
          }catch(PDOException $err){
              echo $err->getMessage();
          }

        }
      
    }

}

?>