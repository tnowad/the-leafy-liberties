<?php
use Core\Model;

class Author extends Model
{
  protected $table = 'authors';
  protected $fillable = [
    'author_id',
    'name',
  ];
}