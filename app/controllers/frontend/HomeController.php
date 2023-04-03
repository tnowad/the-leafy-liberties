<?php

namespace App\Controllers\Frontend;

use Core\Controller;
use Core\Database;
use Core\Response;
use Core\View;
use Exception;

class HomeController extends Controller
{
  public function index($request, $response)
  {
    // mysqli
    try {
      $users = Database::getInstance()->getConnection()->query('SELECT * FROM users')->fetch_all(MYSQLI_ASSOC);
    } catch (Exception $e) {
      // Create a table users if it doesn't exist
      $sql = "CREATE TABLE users (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(30) NOT NULL,
        email VARCHAR(50),
        reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
      )";
      Database::getInstance()->getConnection()->query($sql);
      // create a user
      $sql = "INSERT INTO users (name, email)
      VALUES ('John', 'john@example.com')";
      Database::getInstance()->getConnection()->query($sql);
      // get users
      $users = Database::getInstance()->getConnection()->query('SELECT * FROM users')->fetch_all(MYSQLI_ASSOC);
    }

    // echo '<pre>';
    // print_r($users);
    // echo '</pre>';
    // return $this->renderWithLayout(new View('pages/index'), ['users' => $users]);
    $response = new Response();
    // echo json encode
    $response->setBody(json_encode($users));
    $response->setStatusCode(200);
    $response->send();
  }

}