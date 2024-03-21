<?php
session_start();
if(isset($_SESSION['nom'])){
    header('location:profile.php');
}
include "inc/function.php"; 
   $user=true;
  $categories=getcategorie();
  if(!empty($_POST)){
    $user=connectadmin ($_POST);
    if (is_array($user) && count($user)>0){
      session_start();
      $_SESSION['id']=$user['id'];
      $_SESSION['email']=$user['email'];
      $_SESSION['nom']=$user['nom'];
      $_SESSION['prenom']=$user['prenom'];
      $_SESSION['mp']=$user['mp'];

      $_SESSION['telephone']=$user['telephone'];
      $_SESSION['etat']=$user['etat'];
    header('location:profile.php');
    

    }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>eshop</title>
    <!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.4.8/sweetalert2.min.css">
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="style.css" type="text/css">
    <link rel="stylesheet" href="main.css" type="text/css">
  </head>
<body>
       <!--      header    -->
       <?php
    include "inc/header.php";?>
      <div class="col-12 p-5">
        <form action="inscrir.php" method="post">
            <span class="login100-form-title p-b-49">
						Connexion
					</span>

					<div class="wrap-input100 validate-input m-b-23" data-validate = "Username is reauired">
						<span class="label-input100">Nom d'utilisateur</span>
						<input class="input100" type="text" name="email" placeholder="Tapez votre nom d'utilisateur">
						<i class="fa-solid fa-user"></i>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Password is required">
						<span class="label-input100">Mot de passe</span>
						<input class="input100" type="password" name="mp" placeholder="Tapez votre mot de passe">
						<i class="fa-solid fa-lock"></i>
					</div>
					
			
					<div class="text-right p-t-8 p-b-31">
						<a href="register.php">
							Créer un Compte
						</a>
					</div>
					
					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<div class="login100-form-btn">
							<input type="submit" name="connexion" value="Connexion" />
							</div>
						</div>
					</div>

					<div class="flex-col-c p-t-155">
						<span class="txt1 p-b-17">
							Ou inscrivez-vous en utilisant
						</span>

						<a href="creer.html"txt2">
							S'inscrire
						</a>
					</div>
          </form>
      </div>
  </div>
     <!--      footer    -->
     <?php
    include "inc/footer.php";?>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.4.8/sweetalert2.all.min.js"></script>
    <?php
      if (!$user){
        print"
        <script>
       Swal.fire({
         position: 'top-end',
           icon: 'Error',
          title: 'Cordonnées non valide',
           showConfirmButton:ok,
           timer: 1500
          })
 
      </script>
      ";
      }
      ?>
        <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.nice-select.min.js"></script>
    <script src="js/jquery.nicescroll.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/jquery.countdown.min.js"></script>
    <script src="js/jquery.slicknav.js"></script>
    <script src="js/mixitup.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/main.js"></script>


    <!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>
</html>