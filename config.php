<?php

// App name
define('APP_NAME', 'VSGA Final Project!');

// base folder project
define('BASE', 'http://localhost/phpproject/vsga-finalproject');


// Connection to databse mysql
$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = '';
$db = 'vsga_finalproject';


$conn = new mysqli($dbhost, $dbuser, $dbpass, $db) or die("Connect failed: %s\n" . $conn->error);
