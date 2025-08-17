<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

require_once "../classes/db.php";
require_once "../classes/admin.php";

//connect to database
$database = new database();
$db = $database->getConnection();

//create admin object
$admin = new admin ($db);

if($_SERVER["REQUEST_METHOD"] =="POST"){
    $email = $_POST['email'];
    $password = $_POST['password'];

    if ($admin->login($email,$password)){
        echo "login succesfull &nbsp". $email;
    }
    else {
        echo "login failed";
    }

}





?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Admin Login</title>
</head>
<body>
    <center>

<h1>welcome admin <?php $email ?>
</h1>

<form action="" method="POST">
    <label for="email"> EMAIL: </label>
    <input type="email" name="email" placeholder="email" required> <br><br>
    <label for="password"  > PASSWORD:  </label>
    <input type="text" name="password" placeholder="password" required> <br><br>

    <button type="submit"> LOG-IN</button>

</form>

</center>
    
</body>
</html>