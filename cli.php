<?php

include __DIR__ . '/src/Framework/Database.php';

use Framework\Database;

$db = new Database("mysql", [
    'host' => 'localhost',
    'port' => 3306,
    'dbname' => 'phpiggy'
], 'root', '');

$search = "Skirt";
$query = "SELECT * FROM  products WHERE name=?";

$stmt = $db->connection->prepare($query);

$stmt->execute([
    $search
]);

var_dump($stmt->fetchAll(PDO::FETCH_OBJ));