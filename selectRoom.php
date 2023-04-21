<?php
  if(isset($_POST['submit'])){

    /*echo "<pre>";
    print_r($_POST);
    echo "</pre>";
    exit;*/

    $sql = '';
    $size = 6;
    $count = 0;
    $checkSearch = false;
    $text = 'CHOISIR...';

    $categorie = $_POST['categorie'];
    $style = $_POST['style'];
    $lieu = $_POST['lieu'];
    $prix = $_POST['prix'];
    $nb_douches = $_POST['nb_douches'];
    $nb_chambres = $_POST['nb_chambres'];
    $status = 1;

    $search = [$categorie,$style,$lieu,$prix,$nb_chambres,$nb_douches,$status];
    $searchInfo = ['idCategorie','idStyle','lieu','prix','nb_chambres','nb_douches','status'];

    for ($i=0; $i < sizeof($search); $i++) {
      if($search[$i] != $text){
        $checkSearch = true;
        $count++;
      }
    }

    if($checkSearch){
      $sql = 'SELECT * FROM logement WHERE ';
      for ($i=0; $i < sizeof($search); $i++) {
        if($search[$i] != $text){
          if($i == 3){
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
      $sql .= ' AND status = 1';
    }else{
      $sql = 'SELECT * FROM logement WHERE status = 1';
    }

    require_once 'dbConnect.php';

    //select property
    $statement = $pdo -> prepare($sql);
    $statement->execute();
    $logement = $statement->fetchALL(PDO::FETCH_ASSOC);

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

  }

 ?>
