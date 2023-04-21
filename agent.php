<!DOCTYPE html>
<?php
  session_start();
 ?>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="device-width, initial-scale=1.0" charset="utf-8">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="index.css"/>
    <link rel="stylesheet" href="bailleur.css"/>
    <title>NDA Kamer</title>
  </head>
  <body>
    <div class="main-block">

      <div class="slider-block">

        <div class="slideshow-container">
          <div class="mySlides fade">
            <div class="numbertext">1 / 3</div>
            <img src="img/001.jpg">
            <div class="text">
              <h1 class="slide-header">MEILLEUR COUT</h1>
              <p>It is a long established fact that a reader will be distracted by the
                  readable content of a page when looking at its layout.</p>
            </div>
          </div>

          <div class="mySlides fade">
            <div class="numbertext">2 / 3</div>
            <img src="img/003.jpg">
            <div class="text">
              <h1 class="slide-header">MEILLEUR COUT</h1>
            <p>It is a long established fact that a reader will be distracted by the
                readable content of a page when looking at its layout.</p>
              </div>
          </div>

          <div class="mySlides fade">
            <div class="numbertext">3 / 3</div>
            <img src="img/002.jpg">
            <div class="text">
              <h1 class="slide-header">MEILLEUR COUT</h1>
            <p>It is a long established fact that a reader will be distracted by the
                readable content of a page when looking at its layout.</p>
              </div>
          </div>

        </div>
      </div>
      <div>
        <span class="dot"></span>
        <span class="dot"></span>
        <span class="dot"></span>
      </div>

      <header class="nav-block">
        <div class="side-block">
          <div class="logo-block">
            <a href="#">
              <h1>NDA</h1>
              <p>KAMER</p>
            </a>
          </div>
        </div>
        <nav class="link-block">
          <ul>
            <?php
              if(isset($_SESSION['usernameAgent'])){
                echo "<li><a href='indexAgent.php' class='link'>ACCUIEL</a></li>";
                echo "<li><a href='indexAgent.php#logement' class='link'>LOGEMENTS</a></li>";
                echo "<li><a href='agent.php#logement' class='link active'>AGENTS</a></li>";
                echo "<li><a href='profilAgent.php' class='link'>PROFIL</a></li>";
                echo "<li><a href='logOutAgent.php' class='link-btn'>LOG-OUT</a></li>";
              }else if(isset($_SESSION['username'])){
                echo "<li><a href='indexBailleur.php' class='link'>ACCUIEL</a></li>";
                echo "<li><a href='indexBailleur.php#logement' class='link'>LOGEMENTS</a></li>";
                echo "<li><a href='agent.php#logement' class='link active'>AGENTS</a></li>";
                echo "<li><a href='bailleur.php' class='link'>MES LOGEMENTS</a></li>";
                echo "<li><a href='ajouterLogement.php' class='link'>AJOUTER LOGEMENT</a></li>";
                echo "<li><a href='logOut.php' class='link-btn'>LOG-OUT</a></li>";
              }else{
                echo "<li><a href='index.php' class='link'>ACCUIEL</a></li>";
                echo "<li><a href='index.php#logement' class='link'>LOGEMENTS</a></li>";
                echo "<li><a href='agent.php#logement' class='link active'>AGENTS</a></li>";
                echo "<li><a href='signUp.php' class='link-btn'>BAILLEUR</a></li>";
                echo "<li><a href='signUpPage.php' class='link-btn'>AGENT</a></li>";
              }
             ?>

          </ul>
        </nav>
      </header>

      <div class="search-container">
        <div class="wrapper">

          <div class="form__title">
            <h1>FAITES VOS RECHERCHES</h1>
            <p>Recherchez vos agents de maniere facile et precise ci-dessous.</p>
          </div>

          <div class="search-input">
            <div class="search">
              <form class="" action="agent.php#logement" method="post">
                <div class="search-block">
                  <div class="input-group mb-3">
                    <label class="input-group-text" for="inputGroupSelect01">CATEGORIE</label>
                    <select class="form-select" id="inputGroupSelect01" name="categorie">
                      <option selected>CHOISIR...</option>
                      <option value="MAISON">MAISON</option>
                      <option value="APPARTEMENT">APPARTEMENT</option>
                      <option value="STUDIO">STUDIO</option>
                      <option value="CHAMBRE">CHAMBRE</option>
                    </select>
                  </div>
                  <div class="input-group mb-3">
                    <label class="input-group-text" for="inputGroupSelect01">STYLE</label>
                    <select class="form-select" id="inputGroupSelect01" name="style">
                      <option selected>CHOISIR...</option>
                      <option value="SIMPLE">SIMPLE</option>
                      <option value="MODERNE">MODERNE</option>
                      <option value="MEUBLER">MEUBLER</option>
                    </select>
                  </div>
                  <div class="input-group mb-3">
                    <label class="input-group-text" for="inputGroupSelect01">RESIDENCE</label>
                    <select class="form-select" id="inputGroupSelect01" name="residence">
                      <option selected>CHOISIR...</option>
                      <option value="MENDONG">MENDONG</option>
                      <option value="MELEN">MELEN</option>
                      <option value="NGOA">NGOA</option>
                    </select>
                  </div>
                </div>

                <div class="search-block">
                  <div class="input-group mb-3">
                    <label class="input-group-text" for="inputGroupSelect01">EXPERIENCE</label>
                    <select class="form-select" id="inputGroupSelect01" name="experience">
                      <option selected>CHOISIR...</option>
                      <option value="1">1 ANS</option>
                      <option value="2">2 - 4 ANS</option>
                      <option value="3">5+ ANS</option>
                    </select>
                  </div>
                  <div class="input-group mb-3">
                    <label class="input-group-text" for="inputGroupSelect01">PRIX/HRS</label>
                    <select class="form-select" id="inputGroupSelect01" name="prix">
                      <option selected>CHOISIR...</option>
                      <option value="50">50</option>
                      <option value="100">100</option>
                      <option value="150">150</option>
                      <option value="300">300</option>
                    </select>
                  </div>
                </div>

            </div>
            <button type="submit" name="submit" class="link-btn search-btn"><i class="fa fa-search" aria-hidden="true"></i></button>
          </div>
        </form>
      </div>
      <div class="chamber-block" id="logement">
        <?php
          if(isset($_POST['submit'])){
            require_once 'selectAgent.php';
          }else{
            require_once 'allAgents.php';
          }
          ?>

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
