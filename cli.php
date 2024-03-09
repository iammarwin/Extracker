<?php

include __DIR__ . "/src/Framework/Database.php";

use Framework\Database;

$db = new Database('mysql', [
    'host' => 'localhost',
    'port' => '3306',
    'dbname' => 'extracker_db'
], 'root', '');

echo "Connected to database.";
