<?php

namespace Core;

use Core\Database;
use Core\Request;
use Core\Response;
use Core\Session;
use Core\Controller;
use Core\View;

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
    $this->session = new Session();
    $this->database = new Database();
    $this->controller = new Controller();
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

  public function run()
  {
    $this->router = new Router($this->request, $this->response);
    echo $this->router->resolve();
  }

}