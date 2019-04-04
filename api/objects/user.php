<?php

  class User {
    // Database connection and table name
    private $conn;
    private $table_name = 'user';

    // Object properties
    public $id;
    public $first_name;
    public $last_name;
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
      if($this->alreadyExists()){
        return false;
      }

      // Query to insert record
      $query = 'INSERT INTO '
      . $this->table_name .
      ' SET first_name=:first_name,last_name=:last_name,phone_number=:phone_number,email=:email,password=:password,created=:created';

      // Prepare query
      $stmt = $this->conn->prepare($query);

      // Hash password
      $hashed = password_hash($this->password, PASSWORD_DEFAULT);

      // Sanitize
      $this->first_name = htmlspecialchars(strip_tags($this->first_name));
      $this->last_name = htmlspecialchars(strip_tags($this->last_name));
      $this->phone_number = htmlspecialchars(strip_tags($this->phone_number));
      $this->email = htmlspecialchars(strip_tags($this->email));
      $hashed = htmlspecialchars(strip_tags($hashed));
      $this->created = htmlspecialchars(strip_tags($this->created));

      // Bind values
      $stmt->bindParam(':first_name', $this->first_name);
      $stmt->bindParam(':last_name', $this->last_name);
      $stmt->bindParam(':phone_number', $this->phone_number);
      $stmt->bindParam(':email', $this->email);
      $stmt->bindParam(':password', $hashed);
      $stmt->bindParam(':created', $this->created);

      // Execute query
      if($stmt->execute()){
        $this->id = $this->conn->lastInsertId();
        return true;
      }
      return false;
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
