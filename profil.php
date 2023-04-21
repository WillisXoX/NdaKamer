<?php

  require_once 'dbConnect.php';

  $idAgent = $_SESSION['usernameAgent'];
  $statement = $pdo -> prepare('SELECT * FROM agent WHERE username = :username');
  $statement->bindValue(':username', $idAgent);
  $statement->execute();
  $agent = $statement->fetch(PDO::FETCH_ASSOC);

  $statement = $pdo -> prepare('SELECT * FROM agentinfo WHERE idAgent = :idAgent');
  $statement->bindValue(':idAgent', $idAgent);
  $statement->execute();
  $agentInfo = $statement->fetch(PDO::FETCH_ASSOC);

  $statement = $pdo -> prepare('SELECT idCategorie FROM categorieagent WHERE idAgent = :idAgent');
  $statement->bindValue(':idAgent', $idAgent);
  $statement->execute();
  $categorieAgent = $statement->fetchALL(PDO::FETCH_ASSOC);

  $statement = $pdo -> prepare('SELECT idStyle FROM styleagent WHERE idAgent = :idAgent');
  $statement->bindValue(':idAgent', $idAgent);
  $statement->execute();
  $styleAgent = $statement->fetchALL(PDO::FETCH_ASSOC);

  /*echo "<pre>";
  print_r($agent);
  print_r($agentInfo);
  print_r($categorieAgent);
  print_r($styleAgent);
  echo "</pre>";*/
 ?>
 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">
     <title></title>
   </head>
   <body>
      <div class="profil-block">
        <h1>PROFIL D'AGENT</h1>
        <div class="profil-image">
          <?php
            echo "<img src='profileFile/".$agentInfo['image']."' alt=''>";
          ?>
        </div>
        <div class="profil-header">
          <strong>CODE AGENT :</strong><p><?php echo $agent['username']; ?><p>
        </div>
        <div class="profil-info">
          <div class="profil-header">
            <strong>NOM :</strong><p><?php echo $agent['nom']." ".$agent['prenom']; ?><p>
          </div>
          <div class="profil-header">
            <strong>EXPERIENCE :</strong><p>
            <?php
              if($agentInfo['experience'] == 1){
                echo "1 ANS";
              }else if($agentInfo['experience'] == 2){
                echo "2 - 4 ANS";
              }else{
                echo "5+ ANS";
              }
             ?><p>
          </div>
          <div class="profil-header">
            <strong>RESIDENCE :</strong><p><?php echo $agentInfo['residence']; ?><p>
          </div>
          <div class="profil-header">
            <strong>AGE :</strong><p><?php echo $agentInfo['age']; ?><p>
          </div>
        </div>
        <div class="profil-body">
          <div class="profil-price">
            <?php
              $price =  number_format($agentInfo['prix'], 0, '.', ',');
              echo "<h2>PRIX : </h2><h2 class='price'>".$price."F/HOURS</h2>";
             ?>
          </div>
          <div class="profil-info">
            <div class="profil-header">
              <strong>CATEGORIES :</strong><p>
                <?php
                foreach ($categorieAgent as $key => $categorieAgent) {
                  echo $categorieAgent['idCategorie'].".. ";
                }
                ?><p>
            </div>
            <div class="profil-header">
              <strong>STYLES :</strong><p>
                <?php
                foreach ($styleAgent as $key => $styleAgent) {
                  echo $styleAgent['idStyle'].".. ";
                }
                ?><p>
            </div>
          </div>
          <div class="profil-descrip">
            <p><?php echo $agentInfo['description'] ?></p>
          </div>
        </div>
        <div class="profil-info">
          <div class="profil-header">
            <strong>CONTACT :</strong>
            <?php
              echo "<a target='_blank' href='https://wa.me/".$agent['contact']."'>".$agent['contact']."</a>";
            ?>
          </div>
          <div class="profil-header">
            <strong>EMAIL :</strong><a href="">
            <?php
              echo "<a target='_blank' href='mailto:".$agent['email']."'>".$agent['email']."</a>";
             ?>
          </div>
        </div>
        <div class="profil-modify">
          <button type="button" name="button"><a href="creeProfil.php">MODIFIER PROFIL</a> </button>
        </div>
      </div>
   </body>
 </html>
