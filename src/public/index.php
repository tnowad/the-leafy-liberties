<?php
ini_set('display_errors', 1);
require_once(__DIR__ . '/../autoload.php');

use Modules\DotEnv;

$connection = mysqli_connect(DotEnv::get('DB_HOST'), DotEnv::get('DB_USER'), DotEnv::get('DB_PASSWORD'), DotEnv::get('DB_NAME'));

if ($connection) {
  echo "Connected to MySQL successfully!";
} else {
  echo "Connection failed: " . mysqli_connect_error();
}

$query = 'USE database_name;
SELECT * FROM table_name;';

// show all table in database
$result = mysqli_query($connection, $query);

while ($row = mysqli_fetch_row($result)) {
  echo "Table: {$row[0]}";
}
