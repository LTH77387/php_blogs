<?php
namespace core;
class Auth{
    public static function check(){
        if(isset( $_SESSION['user_id'] )){
           return $_SESSION['user_id'];
          }else{
              return null;
          }

    }
}

?>