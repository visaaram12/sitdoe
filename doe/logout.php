

<?php

  // Inialize session
   session_start();

// Delete certain session
  unset($_SESSION['uname']);
    unset($_SESSION['psw']);
  // Delete all session variables
  // session_destroy();

 // Jump to login page
 header('Location: index.php');

  ?>