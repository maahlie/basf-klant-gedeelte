<?php 

class DataBase{
    // --- Fields ---
    // private $_server = "10.35.2.150";
    // private $_user = "test";
    // private $_pass = "test";
    // private $_database = "basfdb";
    private $_server = "localhost";
    private $_user = "root";
    private $_pass = "";
    private $_database = "basfdb";
    private $_conn;

    // --- Constructor ---
    public function __construct()
    {

    }

    // Open de connectie
    private function openConn()
    {
        // Maak een connectie met de database
        $this->_conn = mysqli_connect($this->_server, $this->_user, $this->_pass, $this->_database);

        if (!$this->_conn) 
        {
            die("<script>alert('Connection Failed.')</script>");
        }
    }

    // Sluit de connectie
    private function closeConn()
    {
        mysqli_close($this->conn);
    }

    //Haal gegevens op uit de database en geef deze  
    public function getData($_select, $_table)
    {
        // Open de connectie
        $this->openConn();

        $_sql = "SELECT $_select FROM $_table";
        $_result = mysqli_query($this->_conn, $_sql);
        return $_result;

        // Sluit de connectie
        $this->closeConn();
    }

    //Haal gegevens op uit een database op basis van 1 waarde en geef deze
    public function getDataWhere($_select, $_table, $_where, $_value)
    {
        // Open de connectie
        $this->openConn();

        $_sql = "SELECT $_select FROM $_table WHERE $_where='$_value'";
        $_result = mysqli_query($this->_conn, $_sql);
        return $_result;

        // Sluit de connectie
        $this->closeConn();
    }

    //Haal gegevens op uit een database op basis van 2 waarden en geef deze
    public function getDataAnd($_select, $_table, $_where1, $_value1, $_where2, $_value2)
    {
        // Open de connectie
        $this->openConn();

        $_sql = "SELECT ". $_select ." FROM ". $_table. " WHERE ". $_where1."="."'$_value1'". " AND ". $_where2."=". "'$_value2';";
        $_result = mysqli_query($this->_conn, $_sql);
        return $_result;

        // Sluit de connectie
        $this->closeConn();
    }

    /*
        Wijzig de gegevens in de database met behulp van een twee-dimensionele array 
        voorbeeld array
            $cars = array (
                array("Volvo",22,18),       --> $cars[0][?]
                array("BMW",15,13),         --> $cars[1][?]
                array("Saab",5,2),          --> $cars[2][?]
                array("Land Rover",17,15)   --> $cars[3][?]
        !-- Moet nog getest worden --!
        );
    */
    public function updateData($_table, $_array, $_where, $_value)
    {
        // Open de connectie
        $this->openConn();

        // Maak een lege string aan voor de sql
        $_set = "";
        
        // Voor iedere array in de array
        for ($i=0; $i < count($_array); $i++) 
        { 
            // Voeg de array toe in de string
            /*
                Vanuit bovenstaand voorbeeld:
                "Volvo='22', BMW='15', Saab='5', Land Rover='17'"
            */
            $_set .= "$_array[$i][0]='$_array[$i][1]'";
            if ($i != (count($_array) - 1)) 
            {
                $_set .= ", ";
            }
        }

        $_sql = "UPDATE ". $_table ." SET ". $_set. " WHERE ". $_where. "= ". $_value;
        $_result = mysqli_query($this->_conn, $_sql);
        return $_result;

        // Sluit de connectie
        $this->closeConn();
    }

    /*
        Sla gegevens op in de database met behulp van een twee-dimensionele array 
        voorbeeld array
            $cars = array (
                array("Volvo",22,18),       --> $cars[0][?]
                array("BMW",15,13),         --> $cars[1][?]
                array("Saab",5,2),          --> $cars[2][?]
                array("Land Rover",17,15)   --> $cars[3][?]
        );
    */
    public function insertData($_table, $_array)
    {
        // Open de connectie
        $this->openConn();

        // Maak 2 lege strings aan
        $_rows = "";
        $_values = "'";
        
        // Voor iedere array in de array
        for ($i=0; $i < count($_array); $i++) 
        { 
            // Voeg de array toe in de string
            /*
                Vanuit bovenstaand voorbeeld:
                $_rows -->    "Volvo,BMW,Saab,Land Rover"
                $_values -->  "'22','15''5','17'"
            */
            $_rows .= $_array[$i][0];
            $_values .= $_array[$i][1];

            if (($i + 1) < count($_array)) 
            {
                $_rows.= ",";
                $_values .= "','";
            }
            elseif (($i + 1) == count($_array)) 
            {
                $_values .= "'";
            }
        }


        $_sql = "INSERT INTO ". $_table. " (". $_rows. ") VALUES (". $_values.")";
        $_result = mysqli_query($this->_conn, $_sql);
        return $_result;

        // Sluit de connectie
        $this->closeConn();
    }

    // Verwijder data uit de database op basis van 1 waarde
    public function deleteData($_table, $_where, $_value)
    {
        // Open de connectie
        $this->openConn();

        $_sql = "DELETE FROM ". $_table. " WHERE ". $_where."="."$_value";
        $_result = mysqli_query($this->_conn, $_sql);
        return $_result;

        // Sluit de connectie
        $this->closeConn();
    }

    // Verwijder data uit de database op basis van 2 waarden
    public function deleteDataAnd($_table, $_where1, $_value1, $_where2, $_value2)
    {
        // Open de connectie
        $this->openConn();

        $_sql = "DELETE FROM ". $_table. " WHERE ". $_where1."="."$_value1". " AND ". $_where2."=". "$_value2;";
        $_result = mysqli_query($this->_conn, $_sql);
        return $_result;

        // Sluit de connectie
        $this->closeConn();
    }
}


?>