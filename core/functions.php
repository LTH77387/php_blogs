<?php
 session_start();
// die dump
function dd($data){
    echo "<pre>";
    die(var_dump($data));
}
// dynamic view function
function view($fileName,$folderName_1="",$folderName_2="",$data=[]){
    extract($data);
    //test the both conditions ture first so that it will not only render the folder_1 return.
    if($folderName_1!=="" && $folderName_2!==""){
        return require "views/$folderName_1/$folderName_2/$fileName.view.php";
    }
    
    if($folderName_1!==""){
        return require "views/$folderName_1/$fileName.view.php";
    }
    
     if($folderName_1=="" && $folderName_2==""){
        return require "views/$fileName.view.php";
    }
    
}

function back(){
    header("Location: {$_SERVER['HTTP_REFERER']}");
    return new With();
    
}
//user request method
function request($name) {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        return $_POST[$name];
    } else {
        return $_GET[$name];
    }
}
function redirect($uri){
    header("Location: $uri");
    return new With();
}

class With {
   
    public function with($data=[]) {
        foreach ($data as $key => $value) {
            $_SESSION[$key] = $value;
        }
    }
    
}


?>
 