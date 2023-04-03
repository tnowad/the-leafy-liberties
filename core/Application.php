<?php

namespace Core;

use Core\Database;
use Core\Request;
use Core\Response;
use Core\Session;
use Core\Controller;
use Core\View;
use Exception;

class Application
{
  private static Application $instance;
  private Router $router;
  private Request $request;
  private Response $response;
  private Session $session;
  private Database $database;
  private Controller $controller;
  private View $view;

  public function __construct()
  {
    $this->request = new Request();
    $this->response = new Response();
    $this->router = new Router($this->request, $this->response);
    $this->session = new Session();
    $this->database = Database::getInstance();
    $this->controller = new Controller();
    $this->view = new View('pages/index');
  }

  public static function getInstance()
  {
    if (!isset(self::$instance)) {
      self::$instance = new self();
    }
    return self::$instance;
  }

  public function getRouter()
  {
    return $this->router;
  }

  public function getRequest()
  {
    return $this->request;
  }

  public function getResponse()
  {
    return $this->response;
  }

  public function getSession()
  {
    return $this->session;
  }

  public function getDatabase()
  {
    return $this->database;
  }

  public function getController()
  {
    return $this->controller;
  }

  public function getView()
  {
    return $this->view;
  }

  public function handleRequest()
  {
    try {
      $this->response->setBody($this->router->resolve());
    } catch (Exception $e) {
      $params = [
        'message' => $e->getMessage(),
        'code' => 404,
      ];
      $this->response->setBody(View::renderWithLayout(new View('pages/404'), $params));
    }
    $this->response->send();
  }

}