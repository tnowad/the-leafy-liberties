<?php
namespace Core;

use Utils\DotEnv;

class Request
{
  private $method;
  private $url;
  private $params;
  private $query;
  private $body;
  private $headers;
  private $files;

  public function __construct()
  {
    $this->method = $_SERVER['REQUEST_METHOD'];
    $this->url = substr($_SERVER['REQUEST_URI'], strlen(DotEnv::get('BASE_URI')), strlen($_SERVER['REQUEST_URI']));
    $this->params = array();
    $this->query = array_merge($_GET, $_POST);
    $this->body = json_decode(file_get_contents('php://input'), true);
    $this->headers = getallheaders();
    $this->files = $_FILES;
  }

  public function getMethod()
  {
    return $this->method;
  }

  public function getUrl()
  {
    return $this->url;
  }

  public function getParam($key)
  {
    if (isset($this->params[$key])) {
      return $this->params[$key];
    } else {
      return null;
    }
  }

  public function getQuery($key)
  {
    if (isset($this->query[$key])) {
      return $this->query[$key];
    } else {
      return null;
    }
  }

  public function getBody()
  {
    return $this->body;
  }

  public function getHeader($key)
  {
    if (isset($this->headers[$key])) {
      return $this->headers[$key];
    } else {
      return null;
    }
  }

  public function getFile($key)
  {
    if (isset($this->files[$key])) {
      return $this->files[$key];
    } else {
      return null;
    }
  }

  public function getParams()
  {
    return $this->params;
  }

  public function getQueries()
  {
    return $this->query;
  }


  public function setParams($params)
  {
    $this->params = $params;
  }

  public function setParam($key, $value)
  {
    $this->params[$key] = $value;
  }

  public function setQuery($key, $value)
  {
    $this->query[$key] = $value;
  }

  public function setBody($body)
  {
    $this->body = $body;
  }
}