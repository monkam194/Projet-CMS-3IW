<?php

namespace Core;

class Router {
  private static ?Router $instance = null;
  private array $routes = [];
  private function __construct() {}
  private function __clone() {}

  public static function getInstance(): Router {
    if(!self::$instance) {
      self::$instance = new self();
    }
    return self::$instance;
  }

  public function get(string $path, string $controllerAction) {
    $this->routes['GET'][$path] = $controllerAction;
  }

  public function post(string $path, string $controllerAction) {
    $this->routes['POST'][$path] = $controllerAction;
  }

  public function dispatch() {
    $method = $_SERVER['REQUEST_METHOD'];
    $uri = trim(strtok($_SERVER['REQUEST_URI'], '?'), '/');
    // Static
    if(isset($this->routes[$method]['/' . $uri])) {
      [$controllerName, $actionName] = explode('@', $this->routes[$method]['/' . $uri]);
      $controllerName = "Controllers\\" . $controllerName;
      return (new $controllerName())->$actionName();
    }
    // Dynamic
    // It works well, but if we want to make the site scalable with other slugs the logic would need to be more complex!
    foreach($this->routes[$method] as $path => $controllerAction) {
      if(strpos($path, '{') !== false && strpos($path, '}') !== false) {
        $paramValue = explode('/', trim($_SERVER['REQUEST_URI'], '/'));
        $paramValue = end($paramValue);
        [$controllerName, $actionName] = explode('@', $controllerAction);
        $controllerName = "Controllers\\" . $controllerName;
        $controller = new $controllerName();
        return $controller->$actionName($paramValue);
      }
    }
    http_response_code(404);
    echo "404 not found";
  }
}