<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

require_once "db.php";
require_once "user.php";

//connect to databse
$database = new database();
$db = $database->getConnection();

//create. user. object
$user= new user($db);

// login credentials
$email= "manish@yahoo.com";
$password = "testpass";

$log = $user->login($email,$password);

if($log){
    echo "login successfull  ";
    print_r($log);
    echo "<br>". $password;
}
else{
    echo "login failed";
}



?>