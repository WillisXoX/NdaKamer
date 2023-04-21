<!DOCTYPE html>
<?php
  $errorRegister = '';
  $errorUser = '';
  $msg1 = '';
  $msg2 = '';

  if(isset($_GET['signUp'])){
    if($_GET['signUp'] == 'error_usernameRegister'){
      $msg1 = "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
        <strong>NOM UTILISATEUR exite deja!</strong>
        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
      </div>";
    }
    if($_GET['signUp'] == 'error_username'){
      $msg2 = "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
        <strong>NOM UTILISATEUR / MOT DE PASSE invalide!</strong>
        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
      </div>";
    }
  }
 ?>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="device-width, initial-scale=1.0" charset="utf-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="index.css">
    <link rel="stylesheet" href="bailleur.css">
    <link rel="stylesheet" href="signUp.css">

    <title>Bailleur</title>
  </head>
  <body>

    <div class="main-block signUp">
      <header class="nav-block">
        <div class="side-block">
          <div class="logo-block">
            <a href="index.php">
              <h1>NDA</h1>
              <p>KAMER</p>
            </a>
          </div>
        </div>
        <nav class="link-block">
          <ul>
            <li><a href="index.php" class="link">ACCUIEL</a></li>
            <li><a href="index.php#logement" class="link">NOS LOGEMENT</a></li>
          </ul>
        </nav>
      </header>
      <div class="contain">
        <div class="container" id="container">
        	<div class="form-container sign-up-container">
        		<form action="signUpRegisterAgent.php" class="formSignUp" id="formRegister" method="post">
            <?php if(!empty($msg1)){
                echo $msg1;
              } ?>
        			<h1>Create Account</h1>
        			<span>ou utilise ton compte d'agent pour t'enregistrer</span>
        			<input type="text" placeholder="NOM" id="nameRegister" name="nameRegister"><small id="errorNameRegister"></small>
              <input type="text" placeholder="PRENOM" id="surnameRegister" name="surnameRegister"><small id="errorSurnameRegister"></small>
              <input type="number" placeholder="CONTACT" id="contactRegister" name="contactRegister"><small id="errorContactRegister"></small>
              <input type="email" placeholder="EMAIL" id="emailRegister" name="emailRegister"><small id="errorEmailRegister"></small>
              <input type="text" placeholder="NOM UTILISATEUR" id="userNameRegister" name="userNameRegister"><small id="errorUserNameRegister"></small>
        			<input type="password" placeholder="MOT DE PASSE" id="passwordRegister" name="passwordRegister"><small id="errorPasswordRegister"></small>
        			<button type="submit" name="submitRegister">Sign Up</button>
        		</form>
        	</div>

        	<div class="form-container sign-in-container">
        		<form action="signUpUserAgent.php" class="formSignUp" id="formUser" method="post">
              <?php if(!empty($msg2)){
                  echo $msg2;
                } ?>
        			<h1>Sign in</h1>
        			<span>ou utilse ton compte d'agent</span>
        			<input type="text" placeholder="NOM UTILISATEUR" id="userName" name="userName"><small id="errorUserName"></small>
        			<input type="password" placeholder="MOT DE PASSE" id="userPassword" name="userPassword"><small id="errorUserPassword"></small>
        			<button type="submit" name="submitUser">Sign In</button>
        		</form>

        	</div>
        	<div class="overlay-container">
        		<div class="overlay">
        			<div class="overlay-panel overlay-left">
        				<h1>Welcome Back!</h1>
        				<h4>To keep connected with us please login with your personal info</h4>
        				<button class="ghost" id="signIn">Sign In</button>
        			</div>
        			<div class="overlay-panel overlay-right">
        				<h1>Hello, Friend!</h1>
        				<h4>Enter your personal details and start journey with us</h4>
        				<button class="ghost" id="signUp">Sign Up</button>
        			</div>
        		</div>
        	</div>
      </div>
      </div>
    </div>
<script src="msg.js" charset="utf-8"></script>
<script type="text/javascript">

//Message pop
  document.getElementsByClassName('container')[0].scrollIntoView();


  const formUser = document.getElementById('formUser');
  const formRegister = document.getElementById('formRegister');
  var error = 0;


  formUser.addEventListener('submit',(e) =>{
    checkInputsUser();
    if(error > 0){
      e.preventDefault();
    }
  });

  function checkInputsUser(){
    const userName = document.getElementById('userName').value;
    const userPassword = document.getElementById('userPassword').value;

    if(userName === ''){
      document.getElementById('errorUserName').innerHTML = 'NOM UTILISATEUR est vide! ';
      document.getElementById('errorUserName').style.display = 'block';
      error = error + 1;
    }else{
      document.getElementById('errorUserName').style.display = 'none';
    }

    if(userPassword === ''){
      document.getElementById('errorUserPassword').innerHTML = ' MOT DE PASSE est vide! ';
      document.getElementById('errorUserPassword').style.display = 'block';
      error = error + 1;
    }else if(userPassword.length < 6){
      document.getElementById('errorUserPassword').innerHTML = ' MOT DE PASSE est fabile (min = 7)! ';
      document.getElementById('errorUserPassword').style.display = 'block';
      error = error + 1;
    }else{
      document.getElementById('errorUserPassword').style.display = 'none';
    }

  }

  formRegister.addEventListener('submit',(e) =>{
    checkInputsRegister();
    if(error > 0){
      e.preventDefault();
    }
  });

  function checkInputsRegister(){
    const nameRegister = document.getElementById('nameRegister').value;
    const surnameRegister = document.getElementById('surnameRegister').value;
    const userNameRegister = document.getElementById('surnameRegister').value;
    const passwordRegister = document.getElementById('passwordRegister').value;
    const emailRegister = document.getElementById('emailRegister').value;
    const contactRegister = document.getElementById('contactRegister').value;


    var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;

    if(nameRegister === ''){
      document.getElementById('errorNameRegister').innerHTML = 'NOM est vide! ';
      document.getElementById('errorNameRegister').style.display = 'block';
      error = error + 1;
    }else{
      document.getElementById('errorNameRegister').style.display = 'none';
    }

    //Surname Register Check
    if(surnameRegister === ''){
      document.getElementById('errorSurnameRegister').innerHTML = 'PRENOM est vide! ';
      document.getElementById('errorSurnameRegister').style.display = 'block';
      error = error + 1;
    }else{
      document.getElementById('errorSurnameRegister').style.display = 'none';
    }
    //Username Register Check
    if(userNameRegister === ''){
      document.getElementById('errorUserNameRegister').innerHTML = 'NOM UTILISATEUR est vide! ';
      document.getElementById('errorUserNameRegister').style.display = 'block';
      error = error + 1;
    }else{
      document.getElementById('errorUserNameRegister').style.display = 'none';
    }

    //Email Register Check
    if(emailRegister === ''){
      document.getElementById('errorEmailRegister').innerHTML = 'EMAIL est vide! ';
      document.getElementById('errorEmailRegister').style.display = 'block';
      error = error + 1;
    }else if(!(emailRegister.match(mailformat))){
      document.getElementById('errorEmailRegister').innerHTML = 'EMAIL est invalide! ';
      document.getElementById('errorEmailRegister').style.display = 'block';
    }else{
      document.getElementById('errorEmailRegister').style.display = 'none';
    }

    //Password Register Check
    if(passwordRegister === ''){
      document.getElementById('errorPasswordRegister').innerHTML = ' MOT DE PASSE est vide! ';
      document.getElementById('errorPasswordRegister').style.display = 'block';
      error = error + 1;
    }else if(passwordRegister.length < 6){
      document.getElementById('errorPasswordRegister').innerHTML = ' MOT DE PASSE est fabile (min = 7)! ';
      document.getElementById('errorPasswordRegister').style.display = 'block';
      error = error + 1;
    }else{
      document.getElementById('errorPasswordRegister').style.display = 'none';
    }

    if(contactRegister === ''){
      document.getElementById('errorContactRegister').innerHTML = 'CONTACT est vide! ';
      document.getElementById('errorContactRegister').style.display = 'block';
      error = error + 1;
    }else{
      document.getElementById('errorContactRegister').style.display = 'none';
    }
  }

  //Form Toggle
  const signUpButton = document.getElementById('signUp');
  const signInButton = document.getElementById('signIn');
  const container = document.getElementById('container');

  signUpButton.addEventListener('click', () => {
  container.classList.add("right-panel-active");
  });

  signInButton.addEventListener('click', () => {
  container.classList.remove("right-panel-active");
  });

</script>
  </body>
</html>
