<?php


class Route{
    // define routes 
    protected static $routes=[
        "GET"=>[],
        "POST"=>[],
        "PUT"=>[],
        "DELETE"=>[]
    ];
    // current URI
    protected static $current_uri = '';
    
    // load this file when index is rendered.
    public static function load($fileName){
        require $fileName;
        return new Route();
    }
    public function direct($uri,$method){ // home 
        // if array key does not exist
      if(!array_key_exists($uri,self::$routes[$method])){
          die("404 Not Found");
      }
    //   explode with @ between class name and method
      $explode=self::$routes[$method][$uri]; 
      $this->navigate($explode[0],$explode[1]);
    }
    // get method
    public static function get($uri,$controller){
        // dd($uri);
        // dd($controller);
        self::$current_uri = $uri;
        self::$routes['GET'][$uri]=$controller; // "/" => [[0]=>]
        /* 
            $routes=[
                "GET"=>[
                    "/" => [
                        [0] => "Controllers\IndexController",
                        [1] => "index"
                    ]
                ]
            ]
        */

        return new Route();
    }
    // post method
    public static function post($uri,$controller){
        self::$current_uri = $uri;
        self::$routes['POST'][$uri]=$controller;
        return new Route();
    }
    // navigate for the dynamic object instatiate and call method dynamically.
    public function navigate($class,$method){
        $class=new $class;
        $class->$method();
    }
    // name method to assign a name to a route
    public function name($name, $uri = null)
    {
        if ($uri === null) {
            $uri = self::$current_uri;
        }
        
        // get the HTTP method used for the route
        $method = $_SERVER['REQUEST_METHOD'];
        
        // assign the name to the route
        self::$routes[$method][$uri]['name'] = $name;
         /* 
            $routes=[
                "GET"=>[
                    "/" => [
                        [0] => "Controllers\IndexController",
                        [1] => "index",
                        "name" => $name
                    ]
                ]
            ]
        */  
    }
    
}

?>


