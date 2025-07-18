<?php
$serverName = 'localhost';
$dbname = 'exabalance';
$dsn = 'mysql:host='.$serverName.';dbname='.$dbname;
$username = 'root';
$error = '';

try {
    $db = new PDO($dsn, $username);
} catch (PDOException $e) {
    $error = "Database Error";
    $error .= $e->getMessage();
    include('view/error.php');
    exit(); 
}