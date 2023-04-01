<?php
namespace Bootstrap;

use Core\Application;

$app = new Application();

$app->get('/', function () {
  echo 'Hello World';
});

$app->get('/test', function () {
  echo 'Test';
});

$app->run();