<?php

class Database{
    private $host;
    private $db_name;
    private $username;
    private $password;
    private $conn;


    public function __construct(){
        $this->host = $_ENV['DB_HOST'] ?? '127.0.0.1';
        $this->db_name = $_ENV['DB_NAME'] ?? 'students_db';
        $this->username = $_ENV['DB_USERNAME'] ?? 'root';
        $this->password = $_ENV['DB_PASSWORD'] ?? '';
    }

    public function connect(){
        $this-> conn = new mysqli(
            $this->host,
            $this->username,
            $this->password,
            $this->db_name);

        //verify the db connection
        if($this->conn->connect_error){
            die("Database connection failed: " . $this->conn->connect_error);
        }
        
        //this below is to define the correct charset - avoids emojis, any type of accento into words that are not English
        $this->conn->set_charset("utf8mb4");

        return $this->conn;
    }
}