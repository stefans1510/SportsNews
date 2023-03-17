<?php
if (!isset($_SESSION)) {
    session_start();
}

class Server
{
    private $host;
    private $username;
    private $password;
    private $database;
    public $conn;

    public function __construct($host = 'localhost', $username = 'root', $password = '', $database = 'sportsnews')
    {
        $this->host = $host;
        $this->username = $username;
        $this->password = $password;
        $this->database = $database;
    }

    public function connect()
    {
        $this->conn = null;
        try {
            $this->conn = new PDO("mysql:host=$this->host;dbname=$this->database", $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $this->conn;
        } catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }

        return $this->conn;
    }
}
