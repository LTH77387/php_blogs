<?php
namespace Models;

use App;
use Models\Model;

class Category extends Model {
    protected static $tableName = 'categories'; // set the table name
    protected static $primaryKey = 'id'; // set the primary key
    protected static $fillable = ['category_name']; // set the fillable columns
}

?>