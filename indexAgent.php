<!DOCTYPE html>
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
            <li><a href="indexAgent.php" class="link active">ACCUIEL</a></li>
            <li><a href="#logement" class="link">LOGEMENTS</a></li>
            <li><a href="agent.php#logement" class="link">AGENTS</a></li>
            <li><a href="profilAgent.php" class="link">PROFIL</a></li>
            <li><a href="logOutAgent.php" class="link-btn">LOG-OUT</a></li>
          </ul>
        </nav>
      </header>

      <div class="search-container">
        <div class="wrapper">

          <div class="form__title">
            <h1>FAITES VOS RECHERCHES</h1>
            <p>Recherchez vos logements de maniere facile et precise ci-dessous.</p>
          </div>

          <div class="search-input">
            <div class="search">
              <form class="" action="indexBailleur.php#logement" method="post">
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
                    <label class="input-group-text" for="inputGroupSelect01">LIEU</label>
                    <select class="form-select" id="inputGroupSelect01" name="lieu">
                      <option selected>CHOISIR...</option>
                      <option value="MENDONG">MENDONG</option>
                      <option value="BIYEMASSI">BIYEMASSI</option>
                      <option value="MELEN">MELEN</option>
                      <option value="NGOA">NGOA</option>
                      <option value="NGOA">SIMBOCK</option>
                      <option value="NGOA">OGA</option>
                    </select>
                  </div>
                </div>

                <div class="search-block">
                  <div class="input-group mb-3">
                    <label class="input-group-text" for="inputGroupSelect01">CHAMBRES</label>
                    <select class="form-select" id="inputGroupSelect01" name="nb_chambres">
                      <option selected>CHOISIR...</option>
                      <option value="1">1</option>
                      <option value="2">2</option>
                      <option value="3">3</option>
                    </select>
                  </div>
                  <div class="input-group mb-3">
                    <label class="input-group-text" for="inputGroupSelect01">DOUCHES</label>
                    <select class="form-select" id="inputGroupSelect01" name="nb_douches">
                      <option selected>CHOISIR...</option>
                      <option value="1">1</option>
                      <option value="2">2</option>
                      <option value="3">3</option>
                    </select>
                  </div>
                  <div class="input-group mb-3">
                    <label class="input-group-text" for="inputGroupSelect01">PRIX</label>
                    <select class="form-select" id="inputGroupSelect01" name="prix">
                      <option selected>CHOISIR...</option>
                      <option value="20000">20000</option>
                      <option value="50000">50000</option>
                      <option value="100000">100000</option>
                      <option value="150000">150000</option>
                    </select>
                  </div>
                </div>

            </div>
            <button type="submit" name="submit" class="link-btn search-btn"><i class="fa fa-search" aria-hidden="true"></i></button>
          </div>

      </div>
      <div class="chamber-block" id="logement">
        <?php
          if(isset($_POST['submit'])){
            require_once 'selectRoom.php';
          }else{
            require_once 'allChamber.php';
          }
          ?>

      </div>
    </div>
    <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d31847.5786449507!2d11.468891222229004!3d3.821444959906493!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x108bcf7a309a7977%3A0x7f54bad35e693c51!2zWWFvdW5kw6k!5e0!3m2!1sen!2scm!4v1655911683818!5m2!1sen!2scm" width="100%" height="800px" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
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
