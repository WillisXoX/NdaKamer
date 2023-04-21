<!DOCTYPE html>
<?php
  session_start();
  if(!isset($_SESSION['username'])){
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
    <title>Ajouter Logement</title>
  </head>
  <body>

    <div class="main-block logement">

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
            <li><a href="#logement" class="link">LOGEMENTS</a></li>
            <li><a href="agent.php#logement" class="link">AGENTS</a></li>
            <li><a href="bailleur.php" class="link">MES LOGEMENTS</a></li>
            <li><a href="ajouterLogement.php" class="link active">AJOUTER LOGEMENT</a></li>
            <li><a href="logOut.php" class="link-btn">LOG-OUT</a></li>
          </ul>
        </nav>
      </header>

      <div class="contain">

        <div class="room-block">
          <div class="room-title">
            <h1>DESCRIPTION DU LOGEMENT</h1>
            <p>Inserer les information de votre logement.</p>
          </div>

          <form class="" action="ajouterLogementPHP.php" method="post" enctype="multipart/form-data">
            <div class="form-user">
              <div class="formDescription">
                <div class="input-group mb-3">
                  <label class="input-group-text" for="inputGroupSelect01">CATEGORIE</label>
                  <select class="form-select" id="inputGroupSelect01" name="categorie">
                    <option value="MAISON" selected>MAISON</option>
                    <option value="APPARTEMENT">APPARTEMENT</option>
                    <option value="STUDIO">STUDIO</option>
                    <option value="CHAMBRE">CHAMBRE</option>
                  </select>
                </div>
                <div class="input-group mb-3">
                  <label class="input-group-text" for="inputGroupSelect01">LIEU</label>
                  <select class="form-select" id="inputGroupSelect01" name="lieu">
                    <option value="MENDONG" selected>MENDONG</option>
                    <option value="MELEN">MELEN</option>
                    <option value="NGOA">NGOA</option>
                  </select>
                </div>

                <div class="input-group mb-3">
                  <label class="input-group-text" id="basic-addon1">CHAMBRES</label>
                  <input type="text" class="form-input" placeholder="NB CHAMBRES" name="nb_chambres">
                </div>
              </div>

              <div class="formDescription">
                <div class="input-group mb-3">
                  <label class="input-group-text" for="inputGroupSelect01">STYLE</label>
                  <select class="form-select" id="inputGroupSelect01" name="style">
                    <option value="SIMPLE" selected>SIMPLE</option>
                    <option value="MODERNE">MODERNE</option>
                    <option value="MEUBLER">MEUBLER</option>
                  </select>
                </div>
                <div class="input-group mb-3">
                  <label class="input-group-text" for="inputGroupSelect01">PRIX</label>
                  <input type="text" class="form-input" placeholder="PRIX" name="prix">
                </div>

                <div class="input-group mb-3">
                  <label class="input-group-text" id="basic-addon1">DOUCHES</label>
                  <input type="text" class="form-input" placeholder="NB DOUCHES" name="nb_douches">
                </div>

              </div>
            </div>
            <div class="input-text">
              <p>Description de détaillé emplacement de votre logement</p>
              <textarea class="form-text" name="emplacement" placeholder="DESCRIPTION DE L'EMPLACEMENT" ></textarea>
            </div>

            <div class="room-title">
              <h1>IMAGES DU LOGEMENT</h1>
              <p>Ajouter des images de votre logement pour plus d'appresiation.</p>
            </div>

            <div class="image-block">
              <div class="image-btn">
                <button type="button" name="button" class="add">add image</button>
                <button type="button" name="button" class="delete">delete image</button>
              </div>

              <div class="center">
                <div class="form-image">
                  <div class="preview">
                    <img id="image1">
                  </div>
                  <label for="file-ip-1">Upload Image</label>
                  <input type="file" id="file-ip-1" name="file-image[]" class="file-ip" accept="image/*" onchange="showPreview(event)">
                </div>
               <div class="form-image">
                 <div class="preview">
                   <img id="image2">
                 </div>
                 <label for="file-ip-2">Upload Image</label>
                 <input type="file" id="file-ip-2" name="file-image[]" class="file-ip" accept="image/*" onchange="showPreview(event)">
               </div>
              </div>
            </div>
            <!--  Plan de logement -->
            <div class="room-title">
              <h1>PLAN DU LOGEMENT</h1>
              <p>Ajouter un plan de votre logement <i>(optionnelle)</i>.</p>
            </div>
            <div class="center plan">
              <div class="form-image form-plan">
                <div class="preview">
                  <img id="imagePlan">
                </div>
                <label for="planUpload">Upload Plan</label>
                <input type="file" id="planUpload" name="file-plan" class="file-ip" accept="image/*" onchange="showPreviewPlan(event)">
              </div>
            </div>
            <!--  Video de logement -->
            <div class="room-title">
              <h1>VIDEO DU LOGEMENT</h1>
              <p>Ajouter un video de votre logement pour plus d'appresiation.</p>
            </div>

            <div class="video-block">
              <div class="form-image video">
                <div class="preview video">
                  <video controls>
                    Your browser does not support the video tag.
                  </video>
                </div>
                <label for="videoUpload">Upload Video</label>
                <input type="file" id="videoUpload" name="file-video" class="file-ip" accept="video/*" onchange="showPreviewVideo(event)">
              </div>
            </div>
            <button type="submit" class="link-btn room-btn" name="submit">AJOUTER LOGEMENT</button>

          </form>


        </div>

      </div>

    </div>
    <script src="image.js" charset="utf-8"></script>
    <script>
        //Video
        function showPreviewVideo(event){
          if(event.target.files.length > 0){
            let file = event.target.files[0];
            let blobURL = URL.createObjectURL(file);
            document.querySelector("video").src = blobURL;
          }
        }
        //Plan
        function showPreviewPlan(event){
          if(event.target.files.length > 0){
            var src = URL.createObjectURL(event.target.files[0]);
            var preview = document.getElementById('imagePlan');
            preview.src = src;
            preview.style.display = "block";
          }
        }

       const wrapper = document.querySelector(".wrapper");
       const wrapper1 = document.querySelector(".wrapper1");

       const fileName = document.querySelector(".file-name");
       const fileName1 = document.querySelector(".file-name1");

       const defaultBtn = document.querySelector("#default-btn");
       const defaultBtn1 = document.querySelector("#default-btn1");

       const customBtn = document.querySelector("#custom-btn");
       const customBtn1 = document.querySelector("#custom-btn1");

       const cancelBtn = document.querySelector("#cancel-btn i");
       const cancelBtn1 = document.querySelector("#cancel-btn1 i");

       //const img = document.querySelector("img");
       const img = document.getElementsByTagName("img")[0];
       const img1 = document.getElementsByTagName("img")[1];

       let regExp = /[0-9a-zA-Z\^\&\'\@\{\}\[\]\,\$\=\!\-\#\(\)\.\%\+\~\_ ]+$/;

       function defaultBtnActive(){
         defaultBtn.click();
       }
       defaultBtn.addEventListener("change", function(){
         const file = this.files[0];
         if(file){
           const reader = new FileReader();
           reader.onload = function(){
             const result = reader.result;
             img.src = result;
             wrapper.classList.add("active");
           }
           cancelBtn.addEventListener("click", function(){
             img.src = "";
             wrapper.classList.remove("active");
           })
           reader.readAsDataURL(file);
         }
         if(this.value){
           let valueStore = this.value.match(regExp);
           fileName.textContent = valueStore;
         }
       });

       function defaultBtnActive1(){
         defaultBtn1.click();
       }
       defaultBtn1.addEventListener("change", function(){
         const file = this.files[0];
         if(file){
           const reader = new FileReader();
           reader.onload = function(){
             const result = reader.result;
             img1.src = result;
             wrapper1.classList.add("active");
           }
           cancelBtn1.addEventListener("click", function(){
             img1.src = "";
             wrapper1.classList.remove("active");
           })
           reader.readAsDataURL(file);
         }
         if(this.value){
           let valueStore = this.value.match(regExp);
           fileName1.textContent = valueStore;
         }
       });
    </script>

  </body>
</html>
