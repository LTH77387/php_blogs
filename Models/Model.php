<?php
namespace Models;

use App;
use PDO;

class Model{
    protected static $pdo;
    protected static $tableName;
    protected static $primaryKey = 'id';
    protected static $fillable = [];

    public function __construct() {
        self::$pdo = App::get("database");
    }
    //store 
    public static function create($dataArr) {
        $model = new self(); // create new instance of current class
        $getKeys = array_keys($dataArr);
        $implodeKeys = implode(',', $getKeys);
        $getValues = array_values($dataArr);
        $questionMark = "";
        foreach($getKeys as $key){
            $questionMark .= "?,";
        }
        $questionMark = rtrim($questionMark, ",");
        $sql="INSERT INTO " . static::$tableName . " ($implodeKeys) VALUES ($questionMark)"; //static ka extends hlann loke tk kg yk property
        dd($sql);
        // $sql = "INSERT INTO " . static::$tableName . " ($implodeKeys) VALUES ($questionMark)";
        try {
            $statement = self::$pdo->prepare($sql);
    
            if ($statement) {
                $statement->execute($getValues);
            } else {
                throw new PDOException('Unable to prepare statement');
            }
        } catch (PDOException $err) {
            echo $err->getMessage();
        }
    }
    


    //index
    public static function get(){
        $model = new self(); // create new instance of current class
        $sql="SELECT * FROM " . static::$tableName; //"SELECT * FROM users"
        $statement=self::$pdo->prepare($sql);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_OBJ);
    }
    //update 

    //delete 
}

?>