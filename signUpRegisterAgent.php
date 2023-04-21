<?php
  /*echo "<pre>";
  print_r($_POST);
  echo "</pre>";*/
  require_once 'dbConnect.php';

  $nom = $_POST['nameRegister'];
  $prenom = $_POST['surnameRegister'];
  $contact = $_POST['contactRegister'];
  $email = $_POST['emailRegister'];
  $username = $_POST['userNameRegister'];
  $password = $_POST['passwordRegister'];

  $statement = $pdo -> prepare('SELECT username FROM agent WHERE username = :username');
  $statement->bindValue(':username', $username);
  $statement->execute();
  $checkUserRegister = $statement->fetch(PDO::FETCH_ASSOC);

  if(empty($checkUserRegister)){
    $statement = $pdo -> prepare("INSERT INTO agent (nom, prenom, contact, email, username, password) VALUES (:nom, :prenom, :contact, :email, :username, :password)");

    $statement->bindValue(':nom', $nom);
    $statement->bindValue(':prenom', $prenom);
    $statement->bindValue(':contact', $contact);
    $statement->bindValue(':email', $email);
    $statement->bindValue(':username', $username);
    $statement->bindValue(':password', $password);
    $statement->execute();

    session_start();

    $_SESSION['usernameAgent'] = $username;
    $_SESSION['passwordAgent'] = $password;

    header("Location: creeProfil.php");
  }else{
    header("Location: signUp.php?signUp=error_usernameRegister");
  }
 ?>
