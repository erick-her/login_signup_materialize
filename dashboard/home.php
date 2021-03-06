<?php

  // Initiate session to be able to use session variables
  session_start();

  // If user session variable is not set, redirect to login page
  if(!isset($_SESSION['user'])){
    header('location: access_denied.html');
  }

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <!-- Compiled and minified CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
  <!--Import Google Icon Font-->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <!--Custom CSS-->
  <link rel="stylesheet" href="../assets/css/custom.css">
  <title>Dashboard</title>
</head>
<body>
  <!--Navbar-->
  <header>
    <nav>
      <div class="nav-wrapper purple accent-4">
        <div class="container">
          <a href="#!" class="brand-logo">Dashboard</a>
          <ul class="right">
            <li><a href="../api/User/signout.php">Signout<i class="material-icons right">logout</i></a></li>
          </ul>
        </div>
      </div>
    </nav>
  </header>
  <!--Main content-->
  <main>
    <section class="section">
      <div class="container">
        <h4 class="purple-text text-lighten-1">Welcome <?= $_SESSION['user'] ?></h4>
        <p class="flow-text grey-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
      </div>
    </section>
  </main>
  <!--Footer-->
  <footer>

  </footer>


  <!--Jquery-->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <!-- Compiled and minified JavaScript -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</body>
</html>
