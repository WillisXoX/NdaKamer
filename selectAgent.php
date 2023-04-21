<?php
  if(isset($_POST['submit'])){

    require_once 'dbConnect.php';

    $sql = '';
    $size = 3;
    $count = 0;
    $checkSearch = false;
    $text = 'CHOISIR...';

    $categorie = $_POST['categorie'];
    $style = $_POST['style'];
    $residence = $_POST['residence'];
    $prix = $_POST['prix'];
    $experience = $_POST['experience'];

    $search = [$residence,$prix,$experience];
    $searchInfo = ['residence','prix','experience'];

    for ($i=0; $i < sizeof($search); $i++) {
      if($search[$i] != $text){
        $checkSearch = true;
        $count++;
      }
    }
    /*if($categorie != $text || $style != $text){
      $checkSearch = true;
    }*/

    if($checkSearch){
      $sql = 'SELECT idAgent FROM agentinfo WHERE ';
      for ($i=0; $i < sizeof($search); $i++) {
        if($search[$i] != $text){
          if($i == 1){
            $parameter = $searchInfo[$i]." <= '".$search[$i]."'";
          }else{
            $parameter = $searchInfo[$i]." = '".$search[$i]."'";
          }
          $sql .= $parameter;
          $count --;

          if($count != 0){
            $sql .= ' AND ';
          }
        }
      }

      if($categorie != $text && $style != $text){
        $statement = $pdo -> prepare($sql);
        $statement->execute();
        $agentCheck = $statement->fetchALL(PDO::FETCH_ASSOC);

        foreach ($agentCheck as $key => $agentCheck) {
          $statement = $pdo -> prepare('SELECT DISTINCT categorieagent.idAgent FROM categorieagent INNER JOIN styleagent WHERE categorieagent.idAgent = :idAgent AND styleagent.idAgent = :idAgent');
          $statement->bindValue(':idAgent',$agentCheck['idAgent']);
          $statement->execute();
          $agentData[] = $statement->fetch(PDO::FETCH_ASSOC);
        }

        }else if($categorie != $text){
          $statement = $pdo -> prepare($sql);
          $statement->execute();
          $agentCheck = $statement->fetchALL(PDO::FETCH_ASSOC);

          foreach ($agentCheck as $key => $agentCheck) {
            $statement = $pdo -> prepare('SELECT DISTINCT idAgent FROM categorieagent WHERE idAgent = :idAgent');
            $statement->bindValue(':idAgent',$agentCheck['idAgent']);
            $statement->execute();
            $agentData[] = $statement->fetch(PDO::FETCH_ASSOC);
          }
        }else{
          $statement = $pdo -> prepare($sql);
          $statement->execute();
          $agentCheck = $statement->fetchALL(PDO::FETCH_ASSOC);

          foreach ($agentCheck as $key => $agentCheck) {
            $statement = $pdo -> prepare('SELECT DISTINCT idAgent FROM styleagent WHERE idAgent = :idAgent');
            $statement->bindValue(':idAgent',$agentCheck['idAgent']);
            $statement->execute();
            $agentData[] = $statement->fetch(PDO::FETCH_ASSOC);
          }
        }

      }

    if(isset($agentData)){
      foreach ($agentData as $key => $agentData) {
        $statement = $pdo -> prepare('SELECT * FROM agent WHERE username = :username');
        $statement->bindValue(':username',$agentData['idAgent']);
        $statement->execute();
        $agent[] = $statement->fetch(PDO::FETCH_ASSOC);
      }

    }else if($checkSearch){
        $statement = $pdo -> prepare($sql);
        $statement->execute();
        $agentCheck = $statement->fetchALL(PDO::FETCH_ASSOC);

      foreach ($agentCheck as $key => $agentCheck) {
        $statement = $pdo -> prepare('SELECT * FROM agent WHERE username = :username');
        $statement->bindValue(':username',$agentCheck['idAgent']);
        $statement->execute();
        $agent[] = $statement->fetch(PDO::FETCH_ASSOC);
      }
    }else{
      $statement = $pdo -> prepare('SELECT * FROM agent');
      $statement->execute();
      $agent = $statement->fetchALL(PDO::FETCH_ASSOC);

    }
    //select agent

    if(!empty($agent)){

      foreach ($agent as $key => $agent) {
        //select image property
        $idAgent = $agent['username'];
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

        echo "<div class='chamber'>";
          echo "<div class='chamber-image'>";
            echo "<img src='profileFile/".$agentInfo['image']."' alt=''>";
          echo "</div>";

          echo "<div class='chamber-container'>";
            $price =  number_format($agentInfo['prix'], 0, '.', ',');
            echo "<h2>".$price."F/mois</h2>";

            echo "<div class='chamber-sub'>";
            echo "<small>EXP</small>";
            if($agentInfo['experience'] == 1){
              echo "<p>1 ANS</p>";
            }else if($agentInfo['experience'] == 2){
              echo "<p>2 - 4 ANS</p>";
            }else{
              echo "<p>5+ ANS</p>";
            }
            echo "</div>";

            echo "<div class='chamber-sub'>";
              echo "<small>AGE</small>";
              echo "<p>".$agentInfo['age']." ANS</p>";
            echo "</div>";
          echo "</div>";


          echo "<div class='room-location'>";
            echo "<small>CAT : </small>";
            echo "<p class='roomCategorie'>";
            foreach ($categorieAgent as $key => $categorieAgent) {
              echo $categorieAgent['idCategorie'].".";
            }
            echo "</p>";
          echo "</div>";

          echo "<div class='room-location'>";
          echo "<small>STYL : </small>";
            echo "<p class='roomCategorie'>";
            foreach ($styleAgent as $key => $styleAgent) {
              echo $styleAgent['idStyle'].".";
            }
            echo "</p>";
          echo "</div>";

            echo "<div class='room-description'>";
              echo "<p>".$agentInfo['description']."</p>";
            echo "</div>";

            echo "<div class='room-location'>";
              echo "<small>LIEU : </small>";
              echo "<p class='roomLocation'> YAOUNDE, ".$agentInfo['residence']."</p>";
            echo "</div>";

            echo "<div class='room-btn-block'>";
                echo "<a href='profilAgent.php?idAgent=".$agent['username']."'class='room-button'>VOIR PLUS</a>";
            echo "</div>";
        echo "</div>";
      }
    }
  }
 ?>
