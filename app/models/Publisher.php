<?php
use Core\Model;

class Publisher extends Model{
  protected $table = 'author';
  protected $filltable = [
    'publisher_id',
    'name',
  ];

}
