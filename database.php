<?php

class DatabaseConnection
{
    private static $instance = null;
    private $connection;

    private $hostname = "localhost";
    private $dBUser = "root";
    private $dBPassword = "";
    private $dBName = "user_details";

    private function __construct()
    {
        $this->connection = mysqli_connect($this->hostname, $this->dBUser, $this->dBPassword, $this->dBName);
        if (!$this->connection) {
            die("Connection failed: " . mysqli_connect_error());
        }
    }

    public static function getInstance()
    {
        if (!self::$instance) {
            self::$instance = new DatabaseConnection();
        }
        return self::$instance;
    }
    public function getConnection()
    {
        return $this->connection;
    }
}

$dbConnection = DatabaseConnection::getInstance();
$conn = $dbConnection->getConnection();