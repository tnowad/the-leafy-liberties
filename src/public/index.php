<?php
ini_set('display_errors', 1);
require_once(__DIR__ . '/../autoload.php');

use Library\Database;

$db = Database::getInstance()->getConnection();

// create users table if not exists

$sql = "CREATE TABLE IF NOT EXISTS users (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(30) NOT NULL,
  email VARCHAR(50),
  reg_date TIMESTAMP
)";

$db->execute_query($sql);

// insert data

$sql = "INSERT INTO users (name, email) VALUES ('John', 'john@example.com')";
$db->execute_query($sql);

// show data

$sql = "SELECT * FROM users";

$result = $db->execute_query($sql);

if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    echo "id: " . $row["id"] . " - Name: " . $row["name"] . " " . $row["email"] . "<br>";
  }
} else {
  echo "0 results";
}