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

  public function getRoutes($method)
  {
    return $this->routes[$method] ?? [];
  }

  public function resolve()
  {
    $method = $this->request->getMethod();
    $path = $this->request->getUrl();
    $callback = $this->routes[$method][$path] ?? false;

    if ($callback === false) {
      $this->response->setStatusCode(404);
      $this->response->setBody('Not found');
      return $this->response;
    }

    if (is_array($callback)) {
      $controller = new $callback[0]();
      $callback[0] = $controller;
    }
    return call_user_func($callback, $this->request);
  }

  public function render($view, $params = [])
  {
    return Application::getInstance()->view->render(new View($view), $params);
  }

  public function renderWithLayout($view, $params = [])
  {
    return Application::getInstance()->view->renderWithLayout(new View($view), $params);
  }
}