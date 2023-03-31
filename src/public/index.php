<?php
ini_set('display_errors', 1);
require_once(__DIR__ . '/../config/config.php');

use App\Config;

print_r(Config::all());