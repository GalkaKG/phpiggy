<?php

include __DIR__ . '/src/Framework/Database.php';

use Framework\Database;

$db = new Database("mysql", [
    'host' => 'localhost',
    'port' => 3306,
    'dbname' => 'phpiggy'
], 'root', '');

try {
    $db->connection->beginTransaction();

    $db->connection->query("INSERT INTO products VALUES(99, 'Gloves')");

    $search = "Gloves";
    $query = "SELECT * FROM  products WHERE name=?";

    $stmt = $db->connection->prepare($query);

    $stmt->execute([
        $search
    ]);

    $db->connection->commit();

    var_dump($stmt->fetchAll(PDO::FETCH_OBJ));

} catch (Exception $error) {
    if ($db->connection->inTransaction()) {
        $db->connection->rollBack();
    }

    echo "Transaction failed!";
}
