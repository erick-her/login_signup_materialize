<?php

  // Initiate session
  session_start();

  // Destroy any session variables
  session_destroy();
  session_unset();

  // Redirect to initial page
  header('location: ../../index.html');
