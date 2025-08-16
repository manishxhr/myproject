<?php

class user{
    private $conn;
    private $table = "users";

    public function __construct($db){
        $this->conn= $db;
    }

    // Register new user
    public function register($name, $email, $password){
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
         $sql = "INSERT INTO {$this->table} (name, email, password) VALUES (:name , :email, :password )";

         $stmt = $this->conn->prepare($sql);

         $stmt->bindParam(':name',$name);
         $stmt->bindParam(':email',$email);
         $stmt->bindParam(':password',$hashedPassword);

         if($stmt->execute()){
            return true;
         }
         else{
            return false;
         }
    }

    //Login user
    public function login($email,$password){
        $sql = "SELECT *  FROM {$this->table} WHERE email = :email ";
        $stmt = $this->conn->prepare($sql);

        //bind param
        $stmt->bindParam(':email',$email);
        // $stmt->bindParam(':password',$password);

        $stmt->execute();

        $user= $stmt->fetch(PDO::FETCH_ASSOC);

        //user paasword checked with hashed password
        if($user && password_verify($password, $user['password']))
        {
            return $user;
        }

             else{
                 return false;
             }

    }
}

?>