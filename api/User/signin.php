<?php

  // Initiate a session
  session_start();

  // Include database and object files
  include_once'../config/database.php';
  include_once'../objects/user.php';

  // Get database connection
  $database = new Database();
  $db = $database->getConnection();

  // Prepare user object
  $user = new User($db);

  // Set ID property of user to be edited
  $user->email = isset($_GET['email']) ? $_GET['email'] : die();
  $user->password = isset($_GET['password']) ? $_GET['password'] : die();

  // Retrieve statement from login function
  $stmt = $user->signin();

  // Get retrieved row
  $row = $stmt->fetch(PDO::FETCH_ASSOC);

  // If log exists verify password with hashed password
  if($stmt->rowCount() > 0 && password_verify($user->password, $row['password'])){

    // Store user name in session variable to be accessed when logged in
    $_SESSION['user'] = $row['first_name'];

    echo 'success';
  }else{
    echo 'Incorrect email or password, try again.';
  }
