<?php
class App{
    protected static $data=[];
    public static function save($key,$value){
        self::$data[$key]=$value;
    }
    public static function get($key){
     return self::$data[$key];
    }
}

?>