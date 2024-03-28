<?php

$driver = "mysql";
$config = http_build_query(data: [
    'host' => 'localhost',
    'port' => 3306,
    'dbname' => 'phpiggy'
], arg_separator: ';');

$dsn = "{$driver}:{$config}";
$username = 'root';
$password = '';

try {
    $db = new PDO($dsn, $username, $password);
} catch (PDOException) {
    die("Unable to connect to database");
}


echo "Connected to database";