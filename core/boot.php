<?php 

use Models\Model;
require "functions.php";
// config saved as a key
App::save("config",require "./config.php");
$config=App::get("config");
App::save("database",Connection::make($config["database"]));



?>