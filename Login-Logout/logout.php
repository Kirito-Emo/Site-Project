<?php
  session_start();
  // remove all session variables
  session_unset();
  // destroy the session
  session_destroy();

  // redirect verso pagina interna
  header("location: ../Homepage/homepage.php");
<<<<<<< HEAD
?>


=======
?>
>>>>>>> parent of ec2bffd (deleted:    Login-Logout/logout.php)
