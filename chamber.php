<?php
  if(!empty($logement)){
    foreach ($logement as $key => $logement) {
      //select image property
      $idBailleur = $logement['idBailleur'];
      $statement = $pdo -> prepare('SELECT * FROM image WHERE idBailleur = :idBailleur AND idLogement = :idLogement');
      $statement->bindValue(':idBailleur', $idBailleur);
      $statement->bindValue(':idLogement', $logement['idLogement']);
      $statement->execute();
      $image = $statement->fetch(PDO::FETCH_ASSOC);

      echo "<div class='chamber'>";
        echo "<div class='chamber-image'>";
          echo "<img src='imageFile/".$image['image']."' alt=''>";
        echo "</div>";

        echo "<div class='chamber-container'>";
          $price =  number_format($logement['prix'], 0, '.', ',');
          echo "<h2>".$price."F/mois</h2>";

          echo "<div class='chamber-sub'>";
          echo "<small>CHBRS</small>";
          echo "<p>".$logement['nb_chambres']."</p>";
          echo "</div>";

          echo "<div class='chamber-sub'>";
            echo "<small>DOUCHS</small>";
            echo "<p>".$logement['nb_douches']."</p>";
          echo "</div>";
        echo "</div>";

        echo "<div class='room-location'>";
          echo "<small>CATEGORIE : </small>";
          echo "<p class='roomCategorie'>".$logement['idCategorie'].", ".$logement['idStyle']."</p>";
        echo "</div>";

          echo "<div class='room-description'>";
            echo "<p>".$logement['emplacement']."</p>";
          echo "</div>";

          echo "<div class='room-location'>";
            echo "<small>LIEU : </small>";
            echo "<p class='roomLocation'> YAOUNDE, ".$logement['lieu']."</p>";
          echo "</div>";

          echo "<div class='room-btn-block'>";
              echo "<a href='details.php?id=".$logement['idLogement']."'class='room-button'>VOIR PLUS</a>";
          echo "</div>";
      echo "</div>";
    }

  }
 ?>
