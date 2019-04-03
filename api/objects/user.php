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

    }

  }
