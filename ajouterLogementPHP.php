<?php
  session_start();
  require_once 'dbConnect.php';

  echo "<pre>";
  print_r($_POST);
  print_r($_FILES);
  echo "</pre>";

  $error = false;
  $valid = 0;
  /*$username = $_SESSION['username'];
  $chamber = rand(10000000,99999999);
  $price = $_POST['price'];
  $rooms = $_POST['rooms'];
  $toilets = $_POST['toilets'];
  $location = $_POST['location'];
  $description = $_POST['description'];
*/
if(isset($_POST['submit'])){

  $idBailleur = $_SESSION['username'];
  $idLogement = rand(10000000,99999999);
  $idCategorie = $_POST['categorie'];
  $idStyle = $_POST['style'];
  $lieu = $_POST['lieu'];
  $prix = $_POST['prix'];
  $nb_chambres = $_POST['nb_chambres'];
  $nb_douches = $_POST['nb_douches'];
  $status = 1;
  $emplacement = $_POST['emplacement'];

  if(empty($prix)){
    $error = true;
  }
  if(empty($nb_chambres)){
    $error = true;
  }
  if(empty($nb_douches)){
    $error = true;
  }
  $errorVideo = $_FILES['file-image']['error'][0];
  if($errorVideo != 0){
    $error = true;
  }
  if(empty($emplacement)){
    $error = true;
  }

  $imageSize = sizeof($_FILES['file-image']['name']);

  for ($i=0; $i < $imageSize ; $i++) {
    $errorImage = $_FILES['file-image']['error'][$i];
    if($error != 0){
      $error = true;
    }
  }
  if(!$error){
    for ($i=0; $i < $imageSize; $i++) {

      //Importing all image files
      $fileName = $_FILES['file-image']['name'][$i];
      $fileTmpName = $_FILES['file-image']['tmp_name'][$i];
      $fileSize = $_FILES['file-image']['size'][$i];
      $fileError = $_FILES['file-image']['error'][$i];
      $fileType = $_FILES['file-image']['type'][$i];

      $fileExt = explode('.',$fileName);
      $fileActualExt = strtolower(end($fileExt));

      $allow = array('jpg','jpeg','png');

      if(in_array($fileActualExt, $allow)){
        if($fileError === 0){
          $fileNameNew = uniqid('',true).".".$fileActualExt;
          $fileDestination = 'imageFile/'.$fileNameNew;

          $image = $fileNameNew;

          $statement = $pdo -> prepare("INSERT INTO image(idBailleur, idLogement, image)
          VALUES (:idBailleur, :idLogement, :image)");
          $statement->bindValue(':idBailleur', $idBailleur);
          $statement->bindValue(':idLogement', $idLogement);
          $statement->bindValue(':image', $image);
          $statement->execute();
          move_uploaded_file($fileTmpName,$fileDestination);
        }
      }
    }

    //Importing video file
    $fileName = $_FILES['file-video']['name'];
    $fileTmpName = $_FILES['file-video']['tmp_name'];
    $fileSize = $_FILES['file-video']['size'];
    $fileError = $_FILES['file-video']['error'];
    $fileType = $_FILES['file-video']['type'];

    $fileExt = explode('.',$fileName);
    $fileActualExt = strtolower(end($fileExt));

    $allow = array('mp4','avi','ts');

    if(in_array($fileActualExt, $allow)){
      if($fileError === 0){
        $fileNameNew = uniqid('',true).".".$fileActualExt;
        $fileDestination = 'videoFile/'.$fileNameNew;

        $video = $fileNameNew;

        $statement = $pdo -> prepare("INSERT INTO video(idBailleur, idLogement, video)
        VALUES (:idBailleur, :idLogement, :video)");
        $statement->bindValue(':idBailleur', $idBailleur);
        $statement->bindValue(':idLogement', $idLogement);
        $statement->bindValue(':video', $video);
        $statement->execute();
        move_uploaded_file($fileTmpName,$fileDestination);
      }
    }

    //Importing plan file
    $file = $_FILES['file-plan'];

    if($file['error'] == 0){
      $fileName = $_FILES['file-plan']['name'];
      $fileTmpName = $_FILES['file-plan']['tmp_name'];
      $fileSize = $_FILES['file-plan']['size'];
      $fileError = $_FILES['file-plan']['error'];
      $fileType = $_FILES['file-plan']['type'];

      $fileExt = explode('.',$fileName);
      $fileActualExt = strtolower(end($fileExt));

      $allow = array('jpg','jpeg','png');

      if(in_array($fileActualExt, $allow)){
        if($fileError === 0){
          $fileNameNew = uniqid('',true).".".$fileActualExt;
          $fileDestination = 'planFile/'.$fileNameNew;

          $plan = $fileNameNew;

          $statement = $pdo -> prepare("INSERT INTO plan(idBailleur, idLogement, plan)
          VALUES (:idBailleur, :idLogement, :plan)");
            $statement->bindValue(':idBailleur', $idBailleur);
            $statement->bindValue(':idLogement', $idLogement);
            $statement->bindValue(':plan', $plan);
            $statement->execute();
          move_uploaded_file($fileTmpName,$fileDestination);
        }
      }
    }

    $statement = $pdo -> prepare("INSERT INTO logement(
      idBailleur, idLogement, idCategorie, idStyle, lieu, prix, nb_chambres, nb_douches, emplacement, status)
      VALUES (:idBailleur, :idLogement, :idCategorie, :idStyle, :lieu, :prix, :nb_chambres, :nb_douches, :emplacement, :status)");

      $statement->bindValue(':idBailleur', $idBailleur);
      $statement->bindValue(':idLogement', $idLogement);
      $statement->bindValue(':idCategorie', $idCategorie);
      $statement->bindValue(':idStyle', $idStyle);
      $statement->bindValue(':lieu', $lieu);
      $statement->bindValue(':prix', $prix);
      $statement->bindValue(':nb_chambres', $nb_chambres);
      $statement->bindValue(':nb_douches', $nb_douches);
      $statement->bindValue(':status', $status);
      $statement->bindValue(':emplacement', $emplacement);
      $statement->execute();

      header("Location: indexBailleur.php");
  }else{
    header('Location: ajouterLogement.php');
  }
}

exit;



  if(isset($_POST['submit'])){
    $file = $_FILES['img1'];
    $file2 = $_FILES['img2'];

    $fileName = $_FILES['img1']['name'];
    $fileTmpName = $_FILES['img1']['tmp_name'];
    $fileSize = $_FILES['img1']['size'];
    $fileError = $_FILES['img1']['error'];
    $fileType = $_FILES['img1']['type'];

    $fileName2 = $_FILES['img2']['name'];
    $fileTmpName2 = $_FILES['img2']['tmp_name'];
    $fileSize2 = $_FILES['img2']['size'];
    $fileError2 = $_FILES['img2']['error'];
    $fileType2 = $_FILES['img2']['type'];

    $fileExt = explode('.',$fileName);
    $fileActualExt = strtolower(end($fileExt));

    $fileExt2 = explode('.',$fileName2);
    $fileActualExt2 = strtolower(end($fileExt2));

    $allow = array('jpg','jpeg','png');

    if(in_array($fileActualExt, $allow) && in_array($fileActualExt2, $allow)){
      if($fileError === 0 && $fileError2 === 0){

        $fileNameNew = uniqid('',true).".".$fileActualExt;
        $fileDestination = 'uploads/'.$fileNameNew;

        $fileNameNew2 = uniqid('',true).".".$fileActualExt2;
        $fileDestination2 = 'uploads/'.$fileNameNew2;

        $statement = $pdo -> prepare("INSERT INTO logement (username, chamber, price, rooms, toilets, location, description, image1, image2) VALUES (:username, :chamber, :price, :rooms, :toilets,:location, :description, :image1, :image2)");

        $statement->bindValue(':username', $username);
        $statement->bindValue(':chamber', $chamber);
        $statement->bindValue(':price', $price);
        $statement->bindValue(':rooms', $rooms);
        $statement->bindValue(':toilets', $toilets);
        $statement->bindValue(':location', $location);
        $statement->bindValue(':description', $description);
        $statement->bindValue(':image1', $fileNameNew);
        $statement->bindValue(':image2', $fileNameNew2);
        $statement->execute();

        move_uploaded_file($fileTmpName,$fileDestination);
        move_uploaded_file($fileTmpName2,$fileDestination2);

        header("Location: indexBailleur.php");
      }
    }
  }
      /*else{
        header("Location: content.php?uploadFail=Error_uploading_file!");
      }
    }else{
      header("Location: content.php?uploadFail=Error_can't_upload_this_file_type");
    }
  }*/

 ?>
