<?php
namespace Core;

class Response
{
  private $statusCode;
  private $headers;
  private $body;

  public function __construct($statusCode = 200, $body = '', array $headers = [])
  {
    $this->statusCode = $statusCode;
    $this->headers = $headers;
    $this->body = $body;
  }

  public function send()
  {
    http_response_code($this->statusCode);

    foreach ($this->headers as $key => $value) {
      header("$key: $value");
    }

    echo $this->body;
  }

  public function getStatusCode()
  {
    return $this->statusCode;
  }

  public function setStatusCode($statusCode)
  {
    $this->statusCode = $statusCode;
  }

  public function getHeaders()
  {
    return $this->headers;
  }

  public function setHeaders($headers)
  {
    $this->headers = $headers;
  }

  public function getBody()
  {
    return $this->body;
  }

  public function setBody($body)
  {
    $this->body = $body;
  }

  public function __get($name)
  {
    return $this->$name;
  }

  public function __set($name, $value)
  {
    $this->$name = $value;
  }

}