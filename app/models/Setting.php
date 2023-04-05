<?php
use Core\Database;
use Core\Model;

class Setting extends Model
{

  protected $table = 'settings';
  protected $fillable = ['name', 'value'];

}