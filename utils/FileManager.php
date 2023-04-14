<?php
class FileManager
{
  protected $path;
  public function __construct(string $path)
  {
    $this->path = $path;
  }

}