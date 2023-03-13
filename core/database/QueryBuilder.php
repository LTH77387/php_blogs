<?php 
class QueryBuilder{
    public static function find($id){
        // Use prepared statements to prevent SQL injection attacks
        $statement = self::$pdo->pdo->prepare("SELECT * FROM posts WHERE id = ?");
        $statement->execute([$id]);
        return $statement->fetch(PDO::FETCH_OBJ);
    }
}


?>