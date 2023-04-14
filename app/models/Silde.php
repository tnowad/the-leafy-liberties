<?php
use Core\Model;

class Slide extends Model
{
  protected $table = 'slides';

  protected $fillable = [
    'name',
    'image',
    'status',
    'deleted_at'
  ];
}