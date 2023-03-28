<?php
namespace Controllers\Admin;

use Models\User;

class AdminController {
    public function index(){
        view('Home',"Admin");
    }
    public function show(){
        $users=User::get();
        view("users","Admin","Users",[
            "users"=>$users
        ]);
    }
}

?>