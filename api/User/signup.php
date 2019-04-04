<?php

  // Get database connection
  include_once'../config/database.php';

  // Instantiate user Object
  include_once'../objects/user.php';

  $database = new Database();
  $db = $database->getConnection();

  $user = new User($db);

  // Set user property values
  $user->first_name = $_POST['first_name'];
  $user->last_name = $_POST['last_name'];
  $user->phone_number = $_POST['phone'];
  $user->email = $_POST['email'];
  $user->password = $_POST['password'];
  $user->created = date('Y-m-d H:i:s');

  // Create the user
  if($user->signup()){
    echo 'success';
  }else{
    echo 'Email already exists.';
  }
