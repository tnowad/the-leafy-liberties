<?php
use Core\Model;

class Author extends Model{
  protected $table = 'author';
  protected $filltable = [
    'author_id',
    'name',
  ];

}
