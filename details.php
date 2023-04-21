<!DOCTYPE html>
<?php

  if(isset($_GET['id'])){
    session_start();
    require_once 'dbConnect.php';

    $idLogement = $_GET['id'];

    $statement = $pdo -> prepare('SELECT * FROM logement WHERE idLogement = :idLogement');
    $statement->bindValue(':idLogement', $idLogement);
    $statement->execute();
    $logement = $statement->fetch(PDO::FETCH_ASSOC);

    if(empty($logement)){
      if(isset($_SESSION['username'])){
        header("Location: indexBailleur.php");
      }else{
        header("Location: index.php");
      }
    }
    $idBailleur = $logement['idBailleur'];

    $checkLogement = $logement['status'];

    //get bailleur info
    $statement = $pdo -> prepare('SELECT * FROM bailleur WHERE username = :username');
    $statement->bindValue(':username', $idBailleur);
    $statement->execute();
    $bailleur = $statement->fetch(PDO::FETCH_ASSOC);

    //get images info
    $statement = $pdo -> prepare('SELECT * FROM image WHERE idBailleur = :idBailleur AND idLogement = :idLogement');
    $statement->bindValue(':idBailleur', $idBailleur);
    $statement->bindValue(':idLogement', $logement['idLogement']);
    $statement->execute();
    $image = $statement->fetchALL(PDO::FETCH_ASSOC);

    //get video info
    $statement = $pdo -> prepare('SELECT * FROM video WHERE idBailleur = :idBailleur AND idLogement = :idLogement');
    $statement->bindValue(':idBailleur', $idBailleur);
    $statement->bindValue(':idLogement', $logement['idLogement']);
    $statement->execute();
    $video = $statement->fetch(PDO::FETCH_ASSOC);

    //get plan info
    $statement = $pdo -> prepare('SELECT * FROM plan WHERE idBailleur = :idBailleur AND idLogement = :idLogement');
    $statement->bindValue(':idBailleur', $idBailleur);
    $statement->bindValue(':idLogement', $logement['idLogement']);
    $statement->execute();
    $plan = $statement->fetch(PDO::FETCH_ASSOC);
  }
 ?>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="device-width, initial-scale=1.0" charset="utf-8">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="index.css">
    <link rel="stylesheet" href="bailleur.css">
    <link rel="stylesheet" href="details.css">
    <title>Details</title>
  </head>
  <body>
    <div class="main-block ajouter">
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
        <div class="logement">

          <div class="slideshow-container">
            <?php
            $imageSize = 0;
              foreach ($image as $key => $image) {
                echo "<div class='mySlides fade'>";
                  echo "<img src='imageFile/".$image['image']."' style='width:100%'>";
                echo "</div>";
                $imageSize++;
              }
              echo "<div class='mySlides fade'>";
                echo "<img src='planFile/".$plan['plan']."' style='width:100%'>";
              echo "</div>";
              $imageSize++;
             ?>
          </div>
          <br>

          <div style="text-align:center">
          <?php
            for ($i=1; $i <= $imageSize; $i++) {
              echo "<span class='dot' onclick='currentSlide(".$i.")'></span>";
            }
           ?>
          </div>
          <?php
            echo "<div class='logemet-container'>";
              $price =  number_format($logement['prix'], 0, '.', ',');
              echo "<h2>".$price."F/mois</h2>";

              if($logement['idCategorie'] == 'MAISON' || $logement['idCategorie'] == 'APPARTEMENT' || $logement['idCategorie'] == 'STUDIO'){
                echo "<div class='logement-sub'>";
                echo "<small>NB SALLONS</small>";
                echo "<p>1</p>";
                echo "</div>";
              }
              echo "<div class='logement-sub'>";
              echo "<small>NB CHAMBRES</small>";
              echo "<p>".$logement['nb_chambres']."</p>";
              echo "</div>";

              echo "<div class='logement-sub'>";
                echo "<small>NB DOUCHES</small>";
                echo "<p>".$logement['nb_douches']."</p>";
              echo "</div>";
            echo "</div>";

            echo "<div class='logement-categorie'>";
              echo "<small>CATEGORIE : </small>";
              echo "<p class='roomCategorie'>".$logement['idCategorie'].", ".$logement['idStyle']."</p>";
            echo "</div>";

            echo "<div class='logemet-emplacement'>";
              echo "<p>".$logement['emplacement']."</p>";
            echo "</div>";

            echo "<div class='room-location'>";
              echo "<small>LIEU : </small>";
              echo "<p class='roomLocation'> YAOUNDE, ".$logement['lieu']."</p>";
            echo "</div>";

            echo "<div class='logement-titre'>";
              echo"<h1>VIDEO DU LOGEMENT</h1>";
            echo "</div>";

            echo "<div class='logement-video'>";
              echo "<video controls><source src='videoFile/".$video['video']."' type='video/mp4'></video>";
            echo "</div>";

            if(isset($_SESSION['username'])){
              echo "<div class='masquer-container'>";
              if($checkLogement){
                echo "<div class='masquer-block'>";
                  echo "<form class='' action='masquer.php' method='post'>";
                  echo "<input type='text' name='logement' value='".$logement['idLogement']."' type='hidden'>";
                    echo "<button type='submit' name='submitMasquer'>MASQUER LOGEMENT</button>";
                  echo "</form>";
                echo "</div>";

              }else{
                echo "<div class='demasquer-block'>";
                  echo "<form class='' action='masquer.php' method='post'>";
                  echo "<input type='text' name='logement' value='".$logement['idLogement']."' type='hidden'>";
                    echo "<button type='submit' name='submitDemasquer'>DEMASQUER LOGEMENT</button>";
                  echo "</form>";
                echo "</div>";
              }
              echo "</div>";
            }

            echo "<div class='logement-titreVideo'>";
              echo"<h1>CONTACTER BAILLEUR</h1>";
            echo "</div>";

            echo "<div class='logement-contact'>";
              echo "<div class='logement-categorie'>";
                echo "<small>PROPRIETAIRE : </small>";
                echo "<p class='roomCategorie'>".$bailleur['nom'].", ".$bailleur['prenom']."</p>";
              echo "</div>";


              echo "<div class='logement-categorie'>";
                echo "<small>CONTACT ME : </small>";
                echo "<a target='_blank' href='https://wa.me/".$bailleur['contact']."'>".$bailleur['contact']."</a>";
              echo "</div>";

              echo "<div class='logement-categorie'>";
                echo "<small>EMAIL ME : </small>";
                echo "<a target='_blank' href='mailto:".$bailleur['email']."'>".$bailleur['email']."</a>";
              echo "</div>";
            echo "</div>";
           ?>
        </div>
      </div>
    </div>
    <script>

      let slideIndex = 0;
      showSlides();

      function showSlides() {
        let i;
        let slides = document.getElementsByClassName("mySlides");
        let dots = document.getElementsByClassName("dot");
        for (i = 0; i < slides.length; i++) {
          slides[i].style.display = "none";
        }
        slideIndex++;
        if (slideIndex > slides.length) {slideIndex = 1}
        for (i = 0; i < dots.length; i++) {
          dots[i].className = dots[i].className.replace(" active", "");
        }
        slides[slideIndex-1].style.display = "block";
        dots[slideIndex-1].className += " active";
        setTimeout(showSlides, 5000); // Change image every 2 seconds
      }
  </script>
  </body>
</html>
