<?php
  session_start();

  require_once 'dbConnect.php';
  $error = false;

  //Variables
  $residence = $_POST['lieu'];
  $experience = $_POST['experience'];
  $age = $_POST['age'];
  $prix = $_POST['prix'];
  $description = $_POST['description'];

  //Check variables
  $errorImage = $_FILES['file-image']['error'];
  if($errorImage != 0){
    $error = true;
  }
  if(empty($residence)){
    $error = true;
  }
  if(empty($experience)){
    $error = true;
  }
  if(empty($description)){
    $error = true;
  }
  if(empty($age)){
    $error = true;
  }
  if(empty($prix)){
    $error = true;
  }

  //Categorie
  if(isset($_POST['studio'])){
    $categorie[] = 'studio';
  }
  if(isset($_POST['chambre'])){
    $categorie[] .= 'chambre';
  }
  if(isset($_POST['appartement'])){
    $categorie[] .= 'appartement';
  }
  if(isset($_POST['maison'])){
    $categorie[] .= 'maison';
  }

  //Style
  if(isset($_POST['simple'])){
    $style[] = 'simple';
  }
  if(isset($_POST['moderne'])){
    $style[] .= 'moderne';
  }
  if(isset($_POST['meubler'])){
    $style[] .= 'meubler';
  }

  if(isset($categorie) && isset($style)){
    if(!$error){
      //Importing all image files
      $idAgent = $_SESSION['usernameAgent'];

      $fileName = $_FILES['file-image']['name'];
      $fileTmpName = $_FILES['file-image']['tmp_name'];
      $fileSize = $_FILES['file-image']['size'];
      $fileError = $_FILES['file-image']['error'];
      $fileType = $_FILES['file-image']['type'];

      $fileExt = explode('.',$fileName);
      $fileActualExt = strtolower(end($fileExt));

      $allow = array('jpg','jpeg','png');

      if(in_array($fileActualExt, $allow)){
        if($fileError === 0){
          $fileNameNew = uniqid('',true).".".$fileActualExt;
          $fileDestination = 'profileFile/'.$fileNameNew;

          $image = $fileNameNew;

          $statement = $pdo -> prepare("INSERT INTO agentinfo(idAgent, image, residence, age, experience, prix, description)
          VALUES (:idAgent, :image, :residence, :age, :experience, :prix, :description)");
          $statement->bindValue(':idAgent', $idAgent);
          $statement->bindValue(':image', $image);
          $statement->bindValue(':residence', $residence);
          $statement->bindValue(':age', $age);
          $statement->bindValue(':experience', $experience);
          $statement->bindValue(':prix', $prix);
          $statement->bindValue(':description', $description);
          $statement->execute();

          move_uploaded_file($fileTmpName,$fileDestination);

          //Insert categorie
          if(isset($_POST['studio'])){
            $statement = $pdo -> prepare("INSERT INTO categorieagent(idCategorie, idAgent, agent)
            VALUES (:idCategorie, :idAgent, :agent)");
            $statement->bindValue(':idCategorie', 'STUDIO');
            $statement->bindValue(':idAgent', $idAgent);
            $statement->bindValue(':agent', $idAgent);
            $statement->execute();
          }
          if(isset($_POST['chambre'])){
            $statement = $pdo -> prepare("INSERT INTO categorieagent(idCategorie, idAgent, agent)
            VALUES (:idCategorie, :idAgent, :agent)");
            $statement->bindValue(':idCategorie', 'CHAMBRE');
            $statement->bindValue(':idAgent', $idAgent);
            $statement->bindValue(':agent', $idAgent);
            $statement->execute();
          }
          if(isset($_POST['appartement'])){
            $statement = $pdo -> prepare("INSERT INTO categorieagent(idCategorie, idAgent, agent)
            VALUES (:idCategorie, :idAgent, :agent)");
            $statement->bindValue(':idCategorie', 'APPARTEMENT');
            $statement->bindValue(':idAgent', $idAgent);
            $statement->bindValue(':agent', $idAgent);
            $statement->execute();
          }
          if(isset($_POST['maison'])){
            $statement = $pdo -> prepare("INSERT INTO categorieagent(idCategorie, idAgent, agent)
            VALUES (:idCategorie, :idAgent, :agent)");
            $statement->bindValue(':idCategorie', 'MAISON');
            $statement->bindValue(':idAgent', $idAgent);
            $statement->bindValue(':agent', $idAgent);
            $statement->execute();
          }

          //Insert style
          if(isset($_POST['simple'])){
            $statement = $pdo -> prepare("INSERT INTO styleagent(idStyle, idAgent, agent)
            VALUES (:idStyle, :idAgent, :agent)");
            $statement->bindValue(':idStyle', 'SIMPLE');
            $statement->bindValue(':idAgent', $idAgent);
            $statement->bindValue(':agent', $idAgent);
            $statement->execute();
          }
          if(isset($_POST['moderne'])){
            $statement = $pdo -> prepare("INSERT INTO styleagent(idStyle, idAgent, agent)
            VALUES (:idStyle, :idAgent, :agent)");
            $statement->bindValue(':idStyle', 'MODERNE');
            $statement->bindValue(':idAgent', $idAgent);
            $statement->bindValue(':agent', $idAgent);
            $statement->execute();
          }
          if(isset($_POST['meubler'])){
            $statement = $pdo -> prepare("INSERT INTO styleagent(idStyle, idAgent, agent)
            VALUES (:idStyle, :idAgent, :agent)");
            $statement->bindValue(':idStyle', 'MEUBLER');
            $statement->bindValue(':idAgent', $idAgent);
            $statement->bindValue(':agent', $idAgent);
            $statement->execute();
          }
        }
      }
      header("Location: indexAgent.php");
    }
  }else{
    header("Location: creeProfil.php");
  }
 ?>
