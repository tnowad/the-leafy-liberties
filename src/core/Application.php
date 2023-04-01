<?php
namespace Core;

class Application
{
  private $routes = [];
  private $middleware = [];
  private $viewsPath;

  public function __construct()
  {
    $this->viewsPath = __DIR__ . '/../views';
  }

  public function get($path, $callback, $middleware = [])
  {
    $this->add($path, 'GET', $callback, $middleware);
  }

  public function post($path, $callback, $middleware = [])
  {
    $this->add($path, 'POST', $callback, $middleware);
  }

  public function put($path, $callback, $middleware = [])
  {
    $this->add($path, 'PUT', $callback, $middleware);
  }

  public function delete($path, $callback, $middleware = [])
  {
    $this->add($path, 'DELETE', $callback, $middleware);
  }

  public function add($path, $method, $callback, $middleware = [])
  {
    $this->routes[] = [
      'path' => $path,
      'method' => $method,
      'callback' => $callback,
      'middleware' => $middleware,
    ];
  }

  public function use ($middleware)
  {
    $this->middleware[] = $middleware;
  }

  public function run()
  {
    $path = $_SERVER['REQUEST_URI'];
    $method = $_SERVER['REQUEST_METHOD'];

    foreach ($this->routes as $route) {
      if ($route['path'] == $path && $route['method'] == $method) {
        // execute the middleware functions
        foreach ($this->middleware as $middleware) {
          call_user_func($middleware);
        }

        foreach ($route['middleware'] as $middleware) {
          call_user_func($middleware);
        }

        // execute the route callback function
        $callback = $route['callback'];
        if (is_string($callback)) {
          $parts = explode('@', $callback);
          $controllerName = $parts[0];
          $methodName = $parts[1];
          require_once($controllerName . '.php');
          $controller = new $controllerName();
          call_user_func([$controller, $methodName]);
        } else {
          call_user_func($callback);
        }

        return;
      }
    }

    // handle 404 errors
    http_response_code(404);
    echo "Page not found";
  }

  public function render($viewName, $data = [])
  {
    $viewPath = $this->viewsPath . '/' . $viewName . '.php';
    extract($data);
    ob_start();
    include($viewPath);
    ob_get_clean();
    include($this->viewsPath . '/layout.php');
  }
}