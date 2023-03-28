<?php 
namespace Controllers;

use App;
use PDO;
use Models\User;
use PDOException;

class AuthController{
    protected $pdo;
    public function __construct(){
        $this->pdo=App::get("database");
    }
    public function register(){
       view("register","Auth");
    }
    public function store(){
        $userName=request('userName');
        $email=request('email');
        $password=request('password');
        $hashPassword=password_hash($password,PASSWORD_BCRYPT);
            // Validator::make([//]);
        $errors = [];
        $success=[];
        // if any of the errors occur, the error messages will be pushed in $errors array.
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
               $user= User::create([
                'name'=>$userName,
                'email'=>$email,
                'password'=>$hashPassword,
                "role"=>"user"
            ]);
          
            return redirect('/login')->with(["success"=>"Successfully Registered!"]);
          }catch(PDOException $err){
              echo $err->getMessage();
          }

        }
      
   
}
// LOGIN
public function login_page(){
    view("login","Auth");
}
public function login(){
    $model = new self();
    $errors = [];
    $email = request("email");
    $password = request("password");

    if(empty($email)){
        $errors['emailError'] = "Email field is required";
    }
    if(empty($password)){
        $errors['passwordError'] = "Password field is required";
    }

    // If there were any errors, display them
    if (!empty($errors)) {
        return back()->with($errors);
    }

    // Query the database for the user with the given email address
    $statement = $this->pdo->prepare("SELECT * FROM users WHERE email = :email");
    $statement->execute(array(':email' => $email));
    $user = $statement->fetch(PDO::FETCH_OBJ);
    // dd($user);

    // Check if the user exists and the password is correct
    if ($user && password_verify($password, $user->password)) {
        // Password is correct, so set session variables and redirect to the dashboard
        session_start();
        $_SESSION['user_id'] = $user->id;
        $_SESSION['email'] = $user->email;
        $_SESSION['user_name']=$user->name;
        $_SESSION['role']=$user->role;
        return redirect("/");
        exit();
    } else {
        // User not found or password incorrect, so display an error message
        return back()->with(["loginError"=>"Invalid email or password"]);
    }
}
public function logout(){
    if(isset($_SESSION['user_id'])){
        unset($_SESSION['user_id']);
    }
    if( isset($_SESSION['user_name'])){
        unset($_SESSION['user_name']);
    }
    if(isset($_SESSION['email'])){
        unset($_SESSION['email']);
    }
    return redirect('/');
}
public function profile($id){
   $data=User::find($id);
    view("profile","User","Profile",[
        "data"=>$data
    ]);

}
public function profileEdit($id){
    $data=User::find($id);
    view("edit","User","Profile",[
        "data"=>$data
    ]);
}
public function update($id){
    $errors=[];
    $name=request("name");
    $email=request("email");
   if(empty($name)){
       $errors['nameError']="Name field is required";
   }
   if(empty($email)){
       $errors['emailError']="Email field is required";
   }
   if(!empty($errors)){
       return back()->with([$errors]);
   }
   User::update($id,[
        "name"=>$name,
        "email"=>$email
   ]);
   return back()->with(["userUpdateSuccess"=>"Updated Successfully!"]);
}

}


?>