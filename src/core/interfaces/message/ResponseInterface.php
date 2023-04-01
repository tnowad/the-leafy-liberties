<?php

namespace Core\Interfaces\Message;

use Core\Interfaces\Message\MessageInterface;

interface ResponseInterface extends MessageInterface
{
  public function getStatusCode();

  public function withStatus($code, $reasonPhrase = '');

  public function getReasonPhrase();
}