<?php

 class database{
    private $host = "localhost";
    private $dbname = "myproject";
    private $username = "root";
    private $password = "";
    private $conn;

    //constructor
    public function __construct(){
        try{

            $dsn = "mysql:host=" . $this->host. ";dbname=" . $this->dbname . ";charset=utf8";

            $this->conn = new PDO($dsn, $this->username, $this->password);

            // set error mode
            $this->conn->setAttribute(PDO::ATTR_ERRMODE,  PDO::ERRMODE_EXCEPTION);
            echo " database connected successfully <br>";

        }
        catch (PDOException $e){
            echo "connection failed: " . $e->getMessage();   
             }
    }

 

 public function getConnection(){
    return $this->conn;
 }

 }
?>