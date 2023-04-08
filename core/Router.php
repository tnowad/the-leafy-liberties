<?php

namespace Core;

use Exception;
use Utils\DotEnv;

class Router
{
  private Request $request;
  private Response $response;
  private array $routes = [];

  public function __construct(Request &$request, Response &$response)
  {
    $this->request = $request;
    $this->response = $response;
  }

  public function get($path, $callback)
  {
    $this->routes['GET'][$path] = $callback;
  }

  public function post($path, $callback)
  {
    $this->routes['POST'][$path] = $callback;
  }

  public function put($path, $callback)
  {
    $this->routes['PUT'][$path] = $callback;
  }

  public function delete($path, $callback)
  {
    $this->routes['DELETE'][$path] = $callback;
  }

  public function patch($path, $callback)
  {
    $this->routes['PATCH'][$path] = $callback;
  }

  public function options($path, $callback)
  {
    $this->routes['OPTIONS'][$path] = $callback;
  }

  public function head($path, $callback)
  {
    $this->routes['HEAD'][$path] = $callback;
  }

  public function getRoutes($method)
  {
    return $this->routes[$method] ?? [];
  }

  public function resolve()
  {
    $method = $this->request->getMethod();
    $path = $this->request->getPath();
    $callback = $this->routes[$method][$path] ?? false;
    if ($callback === false) {
      $this->response->setStatusCode(404);
      throw new Exception('Not found');
    }
    if (is_array($callback)) {
      $controller = new $callback[0]();
      $callback[0] = $controller;
    }
    call_user_func($callback, array(&$this->request)[0], array(&$this->response)[0]);
  }

  public function render($view, $params = [])
  {
    return Application::getInstance()->getView()->render(new View($view), $params);
  }

  public function renderWithLayout($view, $params = [])
  {
    return Application::getInstance()->getView()->renderWithLayout(new View($view), $params);
  }
}