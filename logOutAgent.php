<?php
  session_start();

  unset($_SESSION['usernameAgent']);
  unset($_SESSION['passwordAgent']);

  header("Location: index.php?logOut=1");

 ?>
