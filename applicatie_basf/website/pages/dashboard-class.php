<?php

class Dashboard
{

    private $conn;

    public function __construct()
    {
        $this->conn = new mysqli("localhost", "root", "", "basfdb");

        // Check connection
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }

    }

    public function Ongelezen_meldingen()
    {

        //cookies aanmaken
        if (!isset($_COOKIE["aantal_oude_meldingen"])) {
            setcookie("aantal_oude_meldingen", 0);
        }

        // Databases ophalen
        $sql = "SELECT * FROM dailymessage WHERE active = 0";
        $result = $this->conn->query($sql);
        
        setcookie("aantal_nieuwe_meldingen", $result->num_rows);

        $this->conn->close();

        if ($_COOKIE["aantal_nieuwe_meldingen"] > $_COOKIE["aantal_oude_meldingen"]) {
            echo ($_COOKIE["aantal_nieuwe_meldingen"] - $_COOKIE["aantal_oude_meldingen"]);
        } else {
            echo $_COOKIE["aantal_oude_meldingen"];
        }
    }
}
