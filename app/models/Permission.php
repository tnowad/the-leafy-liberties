<?php
use Core\Model;

class Permission extends Model
{
  protected $table = 'permissions';
  protected $fillable = ['name'];

}