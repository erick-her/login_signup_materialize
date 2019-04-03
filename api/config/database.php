<?php

  class Database {
    // Database credentials
    private $host = '';
    private $dbname = '';
    private $username = '';
    private $password = '';
    public $conn;

    /**
    * Get database connection.
    **/
    public function getConnection(){
      $this->conn = null;

      try{
        $this->conn = new PDO('mysql:host=' . $this->host . ';dbname='
        . $this->dbname, $this->username, $this->password);
        $this->conn->exec('set names utf8');
      }catch(PDOException $exception){
        echo 'Connection error: ' . $exception->getMessage();
      }
      return $this->conn;
    }

  }
