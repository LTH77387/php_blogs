<?php
namespace Models;

use App;
use Models\Model;

class User extends Model {
    protected static $tableName = 'users'; // set the table name
    protected static $primaryKey = 'id'; // set the primary key
    protected static $fillable = ['name', 'email', 'password','image']; // set the fillable columns
}

?>