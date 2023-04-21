<!DOCTYPE html>
<?php
  session_start();

  require_once 'dbConnect.php';

  if(!isset($_SESSION['usernameAgent'])){
    header("Location: index.php");
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
    <link rel="stylesheet" href="creeProfil.css">
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
            <li><a href="indexAgent.php" class="link">ACCUIEL</a></li>
            <li><a href="indexAgent.php#logement" class="link">LOGEMENTS</a></li>
            <li><a href="#" class="link active">PROFIL</a></li>
            <li><a href="logOutAgent.php" class="link-btn">LOG-OUT</a></li>
          </ul>
        </nav>
      </header>
      <div class="contain">
        <form class="" action="creeProfilPHP.php" method="post" enctype="multipart/form-data">
          <div class="profil-container">
            <!-- Image Profil -->
            <div class="profil-header">
              <h1>CREE PROFIL D'AGENT</h1>
            </div>
            <div class="profil-info">
              <h2>PROFIL D'AGENT IMMOBILIER</h2>
              <p>Ajouter une photo de profil</p>
            </div>

            <div class="profil-image">
              <div class="center plan">
                <div class="form-image form-plan">
                  <div class="preview">
                    <img id="image">
                  </div>
                  <label for="imageUpload">Upload Image</label>
                  <input type="file" id="imageUpload" name="file-image" class="file-ip" accept="image/*" onchange="showPreview(event)">
                </div>
              </div>
            </div>
            <!-- Form info -->
            <div class="form-user">
              <div class="formDescription">
                <div class="input-group mb-3">
                  <label class="input-group-text" for="inputGroupSelect01">EXPERIENCE</label>
                  <select class="form-select" id="inputGroupSelect01" name="experience">
                    <option value="1" selected>1 ANS</option>
                    <option value="2">2 - 4 ANS</option>
                    <option value="3">5+ ANS</option>
                  </select>
                </div>
                <div class="input-group mb-3">
                  <label class="input-group-text" for="inputGroupSelect01">RESIDENCE</label>
                  <select class="form-select" id="inputGroupSelect01" name="lieu">
                    <option value="MENDONG" selected>MENDONG</option>
                    <option value="MELEN">MELEN</option>
                    <option value="NGOA">NGOA</option>
                  </select>
                </div>

              </div>

              <div class="formDescription">
                <div class="input-group mb-3">
                  <label class="input-group-text" id="basic-addon1">AGE</label>
                  <input type="text" class="form-input" placeholder="AGE" name="age">
                </div>
                <div class="input-group mb-3">
                  <label class="input-group-text" for="inputGroupSelect01">PRIX/HRS</label>
                  <input type="text" class="form-input" placeholder="PRIX" name="prix">
                </div>
              </div>
            </div>

            <div class="form-user group">
              <div class="formDescription">
                <div class="profil-info">
                  <h2>CATEGORIE D'IMMOBILIER</h2>
                  <p>Choissez vos categories</p>
                </div>
                <div class="group">
                  <div class="choice-group">
                    <input type="checkbox" id="studio" name="studio" checked><label for="studio" >STUDIO</label>
                  </div>
                  <div class="choice-group">
                    <input type="checkbox" id="chambre" name="chambre" checked><label for="chambre" >CHAMBRE</label>
                  </div>
                  <div class="choice-group">
                    <input type="checkbox" id="appartement" name="appartement"><label for="appartement" >APPARTEMENT</label>
                  </div>
                  <div class="choice-group">
                    <input type="checkbox" id="maison" name="maison"><label for="maison" >MAISON</label>
                  </div>
                </div>
              </div>

              <div class="formDescription">
                <div class="profil-info">
                  <h2>STYLE D'IMMOBILIER</h2>
                  <p>Choissez vos styles</p>
                </div>
                <div class="group">
                  <div class="choice-group">
                    <input type="checkbox" id="simple" name="simple" checked><label for="simple">SIMPLE</label>
                  </div>
                  <div class="choice-group">
                    <input type="checkbox" id="moderne" name="moderne" checked><label for="moderne" >MODERNE</label>
                  </div>
                  <div class="choice-group">
                    <input type="checkbox" id="meubler" name="meubler"><label for="meubler" >MEUBLER</label>
                  </div>
                </div>
              </div>
            </div>

            <div class="profil-info">
              <h2>VOTRE EXPERIENCE PERSONNEL</h2>
              <p>Description de votre experience en tant qu'agent</p>
            </div>
            <div class="input-text">
              <textarea class="form-text" name="description" placeholder="EXPERIENCE"></textarea>
            </div>

            <button type="submit" class="link-btn room-btn" name="submit">CREE PROFIL</button>
          </div>
        </form>

      </div>
    </div>

  <script type="text/javascript">
    var checkboxes = $(".group input[type='checkbox']");

    $(checkboxes).click(function() {
    var checkedcheckboxcount = $(".group input[type='checkbox']:checked").size();
    if (checkedcheckboxcount < 1) {
      $(this).prop('checked', true);
    }
    });
    //Plan
    function showPreview(event){
      if(event.target.files.length > 0){
        var src = URL.createObjectURL(event.target.files[0]);
        var preview = document.getElementById('image');
        preview.src = src;
        preview.style.display = "block";
      }
    }
  </script>
  </body>
</html>
