<?php

// Database connection class

class Dhb
{
    private $servername;
    private $username;
    private $password;
    private $dbname;

    public function connect()
    {
        $this->servername = "localhost";
        $this->username = "root";
        $this->password = "";
        $this->dbname = "basfdb";

        $conn = new PDO('mysql:host='.$this->servername.';dbname='.$this->dbname.'', $this->username , $this->password);
        return $conn;
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
    }
}
