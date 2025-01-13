<?php
namespace core;

class Router {
    private $routes = [];
    private $notFoundHandler;

    public function __construct() {
        
        $this->notFoundHandler = function() {
            http_response_code(404);
            echo "404 - Page Not Found";
            exit;
        };
    }

   
    public function addRoute($method, $path, $handler) {
        $this->routes[] = [
            'method' => $method,
            'path' => $path,
            'handler' => $handler
        ];
        return $this;
    }

    
    public function dispatch() {
        $requestMethod = $_SERVER['REQUEST_METHOD'];
        $requestUri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

        
        $requestUri = trim(strtok($requestUri, '?'), '/');


        foreach ($this->routes as $route) {
            if ( $route['path'] === $requestUri) {
                return call_user_func($route['handler']);
            }
        }

        
        call_user_func($this->notFoundHandler);
    }
}


