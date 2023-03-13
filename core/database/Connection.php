<?php
class Connection{
    public static function make($config){
       try{
        return $pdo= new PDO(
            "{$config['DB_CONNECTION']}:host={$config['DB_HOST']};dbname={$config['DB_DATABASE']}",
            "{$config['DB_USERNAME']}",
            "{$config['DB_PASSWORD']}"
        );
       }catch(PDOException $err){
           echo $err->getMessage();
       }
    }
}

?>                                                  