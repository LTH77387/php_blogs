<?php
namespace Controllers;

use Models\User;
use Models\Model;

class IndexController{
   public function index(){
    view("index","",[
       'users'=>User::get()
    ]);
   }
}

?>