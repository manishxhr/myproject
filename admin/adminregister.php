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
$admin = new admin($db);

if($_SERVER['REQUEST_METHOD']=='POST'){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    if($admin->register($name, $email, $password)){
        echo "admin registeration successfull <br>";
        // echo "hello ". $name;
    }
    else{
        echo " <br> failed to register admin <br>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> ADMIN registeration </title>
</head>
<body>
<center>
<h1>NEW ADMIN REGISTERATION</h1>

<form action="" method="POST" >
    <label for="name" > name: </label>
    <input type="text" name="name" placeholder="name" required> <br><br>
    <label for="email "> email: </label>
    <input type="email" name="email" placeholder="email" required> <br><br>
    <label for="password"> password: </label>
    <input type="text" name="password" placeholder="password" required><br><br>

    <button type="submit"> add admin</button>
</form>

</center>
    
</body>
</html>


