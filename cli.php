<?php

include __DIR__ . '/src/Framework/Database.php';

use Framework\Database;

$db = new Database($_ENV['DB_DRIVER'], [
    'host' => $_ENV['DB_HOST'],
    'port' => $_ENV['DB_PORT'],
    'dbname' => $_ENV['DB_NAME']
], $_ENV['DB_USER'], $_ENV['DB_PASS']);

// try {
//     $db->connection->beginTransaction();

//     $db->connection->query("INSERT INTO products VALUES(99, 'Gloves')");

//     $search = "Gloves";
//     $query = "SELECT * FROM  products WHERE name=?";

//     $stmt = $db->connection->prepare($query);

//     $stmt->execute([
//         $search
//     ]);

//     $db->connection->commit();

//     var_dump($stmt->fetchAll(PDO::FETCH_OBJ));

// } catch (Exception $error) {
//     if ($db->connection->inTransaction()) {
//         $db->connection->rollBack();
//     }

//     echo "Transaction failed!";
// }
echo $_ENV['DB_HOST'];
$sqlFile = file_get_contents("./database.sql");

$db->query($sqlFile);
