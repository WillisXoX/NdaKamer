<?php
  echo "<pre>";
  print_r($_POST);
  echo "</pre>";

  require_once 'dbConnect.php';

  $logement = $_POST['logement'];
  if(isset($_POST['submitMasquer'])){
    $statement = $pdo -> prepare('UPDATE logement SET status = :status WHERE idLogement = :idLogement');
    $statement->bindValue(':idLogement', $logement);
    $statement->bindValue(':status', '0');
    $statement->execute();
  }else{
    $statement = $pdo -> prepare('UPDATE logement SET status = :status WHERE idLogement = :idLogement');
    $statement->bindValue(':idLogement', $logement);
    $statement->bindValue(':status', '1');
    $statement->execute();
  }
  header('Location: bailleur.php');
 ?>
