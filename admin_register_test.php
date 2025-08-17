<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

require_once "classes/db.php";
require_once "classes/admin.php";

//connect to database
$database = new database();
$db = $database->getConnection();

//create admin object
$admin = new admin($db);

$name = "ravi";
$email= "testravi@yahoo.com";
$password = "testpass";

$newadmin = $admin->register($name, $email, $password);

if($newadmin){
    echo "admin registered successfully";
    // print_r($newadmin);
}

else{
    echo " <br>failed to enter admin";
}


?>