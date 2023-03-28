<?php
namespace Models;

use App;
use PDO;
use PDOException;

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
        
        // get the keys of an accociative array and turn it into new array
        $getKeys = array_keys($dataArr);

        // separate with ,
        $implodeKeys = implode(',', $getKeys); // INSERT INTO static::$tableName (name,email,password) 

        // get the values of an associative array and turn it into new array.
        $getValues = array_values($dataArr);
        $questionMark = "";
        // equal keys and equal questionMark
        foreach($getKeys as $key){
            $questionMark .= "?,";
        }
        $questionMark = rtrim($questionMark, ","); //remove the last ,
        $sql="INSERT INTO " . static::$tableName . " ($implodeKeys) VALUES ($questionMark)"; //static ka extends hlann loke tk kg yk property
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
    // find
    public static function find($id){
        $model= new self();
        $sql="SELECT * FROM " . static::$tableName . " WHERE id=?";
        $statement=self::$pdo->prepare($sql);
        $statement->execute([$id]);
        return $statement->fetch(PDO::FETCH_OBJ); //fetch because of a single object
    }
    // paginate
    public static function paginate($limit){
        $model= new self();
        $sql="SELECT * FROM " . static::$tableName . " ORDER BY updated_at DESC LIMIT $limit";
        $statement=self::$pdo->prepare($sql);
         $statement->execute();
         return $statement->fetchAll(PDO::FETCH_OBJ);
    }

    //update 
    public static function update($id, $data)
    {
        $model = new self();
        $getKeys=array_keys($data);
        $values=array_values($data);
        $setClause = implode('=?, ', $getKeys) . '=?';
        $sql="UPDATE " . static::$tableName . " SET " . $setClause . " WHERE id=?";
        array_push($values, $id); // the same as $values[] = $id; (it is a shorthand syntax)
        $statement=self::$pdo->prepare($sql);
        $statement->execute($values);
        return self::find($id);
    }
    
    //delete 
    public static function delete($id){
       $model=new self();
       $sql="DELETE FROM " . static::$tableName . " WHERE id=?";
       $statement=self::$pdo->prepare($sql);
       $statement->execute([$id]);

    }
}

?>