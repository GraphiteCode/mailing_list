<?php

class Dbh
{
    private $host = 'localhost';
    private $db   = 'cms';
    private $user = 'root';
    private $pass = 'root';
    private $options = [
        \PDO::ATTR_ERRMODE            => \PDO::ERRMODE_EXCEPTION,
        \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
        \PDO::ATTR_EMULATE_PREPARES   => false,
    ];

    public function __construct()
    {
        $dsn = "mysql:host=$this->host;dbname=$this->db;";
        try {
            $this->pdo = new \PDO($dsn, $this->user, $this->pass, $this->options);
        } catch (\PDOException $e) {
            throw new \PDOException($e->getMessage(), (int)$e->getCode());
        }
    }

    public function alert($alert)
    {
        $this->alert = $alert;
        echo $this->alert;
    }

    function __destruct()
    {
        // try {
        $this->pdo = null; //Closes connection
        // } catch (PDOException $e) {
        //     file_put_contents("log/dberror.log", "Date: " . date('M j Y - G:i:s') . " ---- Error: " . $e->getMessage().PHP_EOL, FILE_APPEND);
        //     die($e->getMessage());
        // }
    }
}
