<?php
class Request{
    public static function uri(){
        // trim the url and parse it into string with php parse format
     return parse_url(trim($_SERVER['REQUEST_URI'],'/'),PHP_URL_PATH);
    }
}

?>