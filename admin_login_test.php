<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

require_once "classes/db.php";
require_once "classes/admin.php";

// connect. to database
$database = new database();
$db = $database->getConnection();

// create admin object
$admin = new admin($db);

$email ="testravi@yahoo.com";
$password = "testpass";

$logadmin = $admin->login($email, $password);

if($logadmin){
    echo "login succesfull <br>";
    print_r($logadmin);
    echo "<br>". $password;
}

else{
    echo "login failed";

}

?>