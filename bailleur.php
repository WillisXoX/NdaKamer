<!DOCTYPE html>
<?php
  session_start();

  require_once 'dbConnect.php';

  if(!isset($_SESSION['username'])){
    header("Location: index.php");
  }

  //select property
  $idBailleur = $_SESSION['username'];
  $statement = $pdo -> prepare('SELECT * FROM logement WHERE idBailleur = :idBailleur');
  $statement->bindValue(':idBailleur', $idBailleur);
  $statement->execute();
  $logement = $statement->fetchALL(PDO::FETCH_ASSOC);
 ?>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="device-width, initial-scale=1.0" charset="utf-8">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="index.css">
    <link rel="stylesheet" href="bailleur.css">
    <title>Bailleur</title>
  </head>

  <body>
    <div class="main-block bailleurVide">

      <header class="nav-block">
        <div class="side-block">
          <div class="logo-block">
            <a href="indexBailleur.php">
              <h1>NDA</h1>
              <p>KAMER</p>
            </a>
          </div>
        </div>
        <nav class="link-block">
          <ul>
            <li><a href="indexBailleur.php" class="link">ACCUIEL</a></li>
            <li><a href="indexBailleur.php#logement" class="link">LOGEMENTS</a></li>
            <li><a href="agent.php#logement" class="link">AGENTS</a></li>
            <li><a href="#" class="link active">MES LOGEMENTS</a></li>
            <li><a href="ajouterLogement.php" class="link">AJOUTER LOGEMENT</a></li>
            <li><a href="logOut.php" class="link-btn">LOG-OUT</a></li>
          </ul>
        </nav>
      </header>
      <div class="contain">
        <div class="chamber-block">
          <?php require_once 'chamber.php'; ?>
        </div>
      </div>
    </div>


  </body>
</html>
