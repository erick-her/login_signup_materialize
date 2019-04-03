<?php

  class User {
    // Database connection and table name
    private $conn;
    private $table_name = 'user';

    // Object properties
    public $id;
    public $first_name;
    public $last_name;
    public $gender;
    public $birthdate;
    public $phone_number;
    public $email;
    public $password;
    public $created;

    /**
    * Class constructor with database connection as parameter.
    **/
    public function __construct($db){
      $this->conn = $db;
    }

    /**
    * Sign up function.
    **/
    public function signup(){

    }

    /**
    * Sign in function.
    **/
    public function signin(){

    }

    /**
    * Does user exist function.
    **/
    public function alreadyExists(){
      // Select query
      $query = 'SELECT * FROM '
      . $this->table_name .
      ' WHERE email="' . $this->email . '"';

      // Prepare query statement
      $stmt = $this->conn->prepare($query);

      // Exeute query
      $stmt->execute();

      // Verifiy if user exists
      if($stmt->rowCount() > 0){
        return true;
      }else{
        return false;
      }
    }
  }
