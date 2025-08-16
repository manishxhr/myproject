<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

require_once "db.php";
require_once "user.php";

//connect to database
$database =  new database();
$db= $database->getConnection();

// create user object
$user= new user($db);

$name= "manish kataria";
$email = "manish@yahoo.com";
$password = "testpass";

$new = $user->register($name,$email,$password);

if($new){
    echo "user registers successfully";
}
else{
    echo "error user registering";
}


?>