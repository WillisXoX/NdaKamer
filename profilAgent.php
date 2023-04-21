<!DOCTYPE html>
<?php
  session_start();

  require_once 'dbConnect.php';

  /*//select property
  $idAgent = $_SESSION['usernameAgent'];
  $statement = $pdo -> prepare('SELECT * FROM agent INNER JOIN categorieagent ON agent.username = categorieagent.idAgent ');
  $statement->execute();
  $agent = $statement->fetchALL(PDO::FETCH_ASSOC);*/
 ?>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="device-width, initial-scale=1.0" charset="utf-8">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="index.css">
    <link rel="stylesheet" href="bailleur.css">
    <link rel="stylesheet" href="profil.css">
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
            <?php if(isset($_SESSION['username'])){
              echo "<li><a href='indexBailleur.php' class='link'>ACCUIEL</a></li>";
              echo "<li><a href='indexBailleur.php#logement' class='link'>LOGEMENTS</a></li>";
              echo "<li><a href='bailleur.php' class='link'>MES LOGEMENTS</a></li>";
              echo "<li><a href='ajouterLogement.php' class='link'>AJOUTER LOGEMENT</a></li>";
              echo "<li><a href='logOut.php' class='link-btn'>LOG-OUT</a></li>";
            }else if(isset($_SESSION['usernameAgent'])){
              echo "<li><a href='indexAgent.php' class='link'>ACCUIEL</a></li>";
              echo "<li><a href='indexAgent.php#logement' class='link'>LOGEMENTS</a></li>";
              echo "<li><a href='agent.php#logement' class='link'>AGENTS</a></li>";
              echo "<li><a href='profilAgent.php' class='link'>PROFIL</a></li>";
              echo "<li><a href='logOutAgent.php' class='link-btn'>LOG-OUT</a></li>";
            }else{
              echo "<li><a href='index.php' class='link'>ACCUIEL</a></li>";
              echo "<li><a href='index.php#logement' class='link'>LOGEMENTS</a></li>";
              echo "<li><a href='agent.php#logement' class='link'>AGENTS</a></li>";
              echo "<li><a href='signUp.php' class='link-btn'>BAILLEUR</a></li>";
              echo "<li><a href='signUpPage.php' class='link-btn'>AGENT</a></li>";
            } ?>
          </ul>
        </nav>
      </header>
      <div class="contain">
        <div class="chamber-block">
          <?php
            if(isset($_GET['idAgent'])){
              require_once 'detailAgent.php';
            }else{
              require_once 'profil.php';
            }
          ?>
        </div>
      </div>
    </div>


  </body>
</html>
