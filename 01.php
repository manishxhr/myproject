<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

// echo password_hash("admin123",PASSWORD_DEFAULT);

require_once "db.php";

$database = new database();
$conn= $database->getConnection();

?>