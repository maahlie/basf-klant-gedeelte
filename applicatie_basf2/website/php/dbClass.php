<?php
class SqlCommands {

    private $dbConnAddress;
    private $name;
    private $password;
    public $pdo;

    public function __construct()
    {
        $this->dbConnAddress = 'mysql:host=192.168.0.101;dbname=basfdb';
        $this->name = 'test';
        $this->password = 'test';
        $this->pdo = new PDO($this->dbConnAddress, $this->name, $this->password); //login op db
        
        // $this->dbConnAddress = 'mysql:host=localhost;dbname=basfdb';
        // $this->name = 'root';
        // $this->password = '';
        // $this->pdo = new PDO($this->dbConnAddress, $this->name, $this->password); 
    } 

    //database connectie
    public function connectDB()
    {
        //zet de instellingen voor de pdo.
        $this->pdo->exec('SET CHARACTER SET UTF8');
        $this->pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    }

    //select met een where clause.
    public function selectFromWhere($column, $table, $where, $param) {
        $sql = "SELECT " . $column .  " FROM " . $table . " WHERE " . $where . "= ?";
        $stmt = $this->pdo->prepare($sql);
        $params = [$param];
        // var_dump($column, $table, $where, $param);
        $stmt->execute($params);

        if ($stmt) {
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);   
        }

        return $result;
    }
}

?>