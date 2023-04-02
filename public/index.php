<?php
ini_set('display_errors', 1);
require_once(__DIR__ . '/../autoload.php');

use Library\App;

$app = App::getInstance();

$app->handleRequest();