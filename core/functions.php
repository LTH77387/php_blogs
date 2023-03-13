<?php
 session_start();
// die dump
function dd($data){
    echo "<pre>";
    die(var_dump($data));
}
// dynamic view function
function view($fileName,$folderName="",$data=[]){
    extract($data);
    if($folderName!==""){
        return require "views/$folderName/$fileName.view.php";
    }
    return require "views/$fileName.view.php";
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


class With {
   
    public function with($data=[]) {
        foreach ($data as $key => $value) {
            $_SESSION[$key] = $value;
        }
    }
    
}


?>
 