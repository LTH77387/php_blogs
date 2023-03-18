<?php

class Route{
    // define routes 
    protected static $routes=[
        "GET"=>[],
        "POST"=>[],
        "PUT"=>[],
    ];

    // current URI and ID
    protected static $current_uri = '';
    protected static $id;
    // load routes from a file
    public static function load($fileName){
        require $fileName;
        return new Route();
    }

    // handle routing for the given URI and HTTP method
    public function direct($uri, $method){
    // dd($uri . $method);
        // dd(self::$routes);
        // if array key does not exist
        if(!array_key_exists($uri, self::$routes[$method])){
            die("404 Not Found");
        }
        if(isset($_POST['method'])){
           $method=$_POST['method']; //put method assigned 
        }

        //test hidden id
       if(isset($_POST['id'])){
           self::$id=$_POST['id'];
       }
      
        $controllerMethod = self::$routes[$method][$uri];
        // dd($controllerMethod);
        // if(isset(self::$id)!==null){
        //     $id=self::$id;
        //     $this->navigate($controllerMethod[0], $controllerMethod[1],$id);
        // }
        $this->navigate($controllerMethod[0], $controllerMethod[1]);
    }

    
    // register a GET route
    public static function get($uri, $controller){
       
        if(isset($_GET['id'])){
            $parts = explode('/', $uri);
           array_pop($parts); //remove the last element which is id index and returns the array without the last element
            $uri=implode("/", $parts);
            self::$id=$_GET['id'];
            // self::$routes['GET'][$uri]['id']=self::$id;
        }
        // Set the current URI to the specified URI
        self::$current_uri = $uri;
        
        // Add the route to the routes array with the specified URI and controller
        self::$routes['GET'][$uri] = $controller;
        // Return a new Route object to allow for method chaining
        return new Route();
    }
    

    // register a POST route
    public static function post($uri, $controller){
        self::$current_uri = $uri;
        self::$routes['POST'][$uri] = $controller;
        return new Route();
    }
    // PUT 
    public static function put($uri,$controller){
            self::$current_uri=$uri;
        self::$routes['PUT'][$uri]=$controller;
        return new Route();
    }
    // instantiate the controller object and call the specified method
    public function navigate($controllerClass, $methodName){
        $controllerObject = new $controllerClass;
        if(isset(self::$id)!==null){
            $controllerObject->$methodName(self::$id);
        }else {
            $controllerObject->$methodName();
        }
        
    }

    // assign a name to a route
    public function name($name, $uri = null){
        if ($uri === null) {
            $uri = self::$current_uri;
        }

        // get the HTTP method used for the route
        $method = $_SERVER['REQUEST_METHOD'];

        // assign the name to the route
        self::$routes[$method][$uri]['name'] = $name;
    }

}

?>
