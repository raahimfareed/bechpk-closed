<?php

Class Dbh {
    private $host;
    private $dbname;
    private $port;
    private $charset;
    private $username;
    private $password;
    private $conn;

    public function __construct() {
        $this -> host = "localhost";
        $this -> dbname = "bechpk";
        $this -> port = "3309";
        $this -> charset = "utf8mb4";
        $this -> username = "root";
        $this -> password = "";
        try {
            $dsn = "mysql:host={$this -> host};dbname={$this -> dbname};charset={$this -> charset}";
            $options = [
                PDO::ATTR_ERRMODE,
                PDO::ERRMODE_EXCEPTION
            ];
            $this -> conn = new PDO(
                $dsn,
                $this -> username,
                $this -> password,
                $options
            );

            return $this -> conn;
        } catch (PDOException $e) {
            
        }
    }

    public function GetDB() {
        if ($this -> conn instanceof PDO) {
            return $this -> conn;
        }
    }
}
    