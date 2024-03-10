<?php

include __DIR__ . "/src/Framework/Database.php";

use Framework\Database;

$db = new Database('mysql', [
    'host' => 'localhost',
    'port' => '3306',
    'dbname' => 'extracker_db'
], 'root', '');


// try {
//     $db->connection->beginTransaction();
//     $db->connection->query("INSERT INTO products VALUES(99, 'Shoes')");

//     $search = "Sweaters";
//     $query = "SELECT * FROM products WHERE name = :name";

//     $stmt = $db->connection->prepare($query);

//     $stmt->bindValue('name', 'Shoes', PDO::PARAM_STR);

//     $stmt->execute();

//     var_dump($stmt->fetchAll(PDO::FETCH_ASSOC));

//     $db->connection->commit();
// } catch (Exception $e) {
//     if ($db->connection->inTransaction()) {
//         $db->connection->rollBack();
//     }
//     echo "Transaction Failed.";
// }


$sqlFile = file_get_contents("./database.sql");

$db->connection->query($sqlFile);
