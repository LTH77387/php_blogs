<?php
require "vendor/autoload.php";
require "core/boot.php";

// load the routes.php first.Then, direct.
Route::load("routes.php")->direct(Request::uri(),$_SERVER['REQUEST_METHOD']);
?>