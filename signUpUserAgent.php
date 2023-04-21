<?php
  /*echo "<pre>";
  print_r($_POST);
  echo "</pre>";*/

  require_once 'dbConnect.php';

  $username = $_POST['userName'];
  $password = $_POST['userPassword'];

  $statement = $pdo -> prepare('SELECT username,password FROM agent WHERE username = :username AND password = :password');
  $statement->bindValue(':username', $username);
  $statement->bindValue(':password', $password);
  $statement->execute();
  $checkUser = $statement->fetchALL(PDO::FETCH_ASSOC);

  if(!empty($checkUser)) {
    echo "done!";

    session_start();

    $_SESSION['usernameAgent'] = $username;
    $_SESSION['passwordAgent'] = $password;

    header("Location: indexAgent.php");
  }else{
    header("Location: signUp.php?signUp=error_username");
  }
 ?>
