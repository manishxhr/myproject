<?php
 class admin{
    Private $conn;
    private $table="admins";

    public function __construct($db){
      $this->conn = $db;

    }

     // login admin
     public function login($email, $password){
       
      $sql = "SELECT * FROM {$this->table} WHERE email =:email";
      $stmt = $this->conn->prepare($sql);
       
      $stmt->bindParam(':email', $email);
      $stmt->execute();

      $admin = $stmt->fetch(PDO::FETCH_ASSOC);

      //check user password and hashed password
      
      if($admin && password_verify($password, $admin['password'])){
            return[
                "id"    => $admin['id'],
                "name"  => $admin['name'],
                "email" => $admin['email'] ];
              
      }
        
      else{
        return false;
      }
     }

     //register admin
     public function register($name, $email, $password){

      $password= password_hash($password, PASSWORD_DEFAULT);
      $sql= "INSERT INTO {$this->table} (name, email, password) VALUES (:name, :email, :password)";

      $stmt = $this->conn->prepare($sql);

      //bind parameters
      $stmt->bindParam(':name',$name);
      $stmt->bindParam(':email',$email);
      $stmt->bindParam(':password',$password);

      if($stmt->execute()){
        return true;
      }
      else{
        return false;
      }

        
     }

 }



?>