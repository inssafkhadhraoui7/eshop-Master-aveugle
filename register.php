<?php
session_start();
if(isset($_SESSION['nom'])){
    header('location:profile.php');
}
include "inc/function.php"; 
$show=0;
  $categories=getcategorie();
 
  if(!empty($_POST)){
   if (addvisiteur($_POST)){
    $show=1;
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="css/magnific-popup.css" type="text/css">
    <link rel="stylesheet" href="css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="style.css" type="text/css">
    <link rel="stylesheet" href="main.css" type="text/css">
  </head>
<body>
       <!--      header    -->
       <?php
  include "inc/header.php";?>
      <div class="col-10 p-3">
        <form action="register.php" method="post" class="login100-form validate-form">
        <span class="login100-form-title p-b-49">
						Créer un Compte 
					</span>
					<div class="wrap-input100 validate-input m-b-23" data-validate = "Username is reauired">
						<span class="label-input100">Adresse E-mail</span>
						<input class="input100" type="text" name="email" placeholder="aaaaaaaa@gmail.com">
						<i class="fa-solid fa-envelope"></i>
					</div>
					<div class="wrap-input100 validate-input m-b-23" data-validate = "Username is reauired">
						<span class="label-input100">Nom de Famille</span>
						<input class="input100" type="text" name="nom" placeholder="Tapez votre Nom">
						<i class="fa-solid fa-user"></i>
					</div>
					<div class="wrap-input100 validate-input m-b-23" data-validate = "Username is reauired">
						<span class="label-input100">Prénom</span>
						<input class="input100" type="text" name="prenom" placeholder="Tapez votre prénom">
						<i class="fa-solid fa-user"></i>
					</div>
					<div class="wrap-input100 validate-input m-b-23" data-validate = "Username is reauired">
						<span class="label-input100">Numéro-téléphone</span>
						<input class="input100" type="text" name="telephone" placeholder="Tapez votre telephone">
						<i class="fa-solid fa-user"></i>
					</div>
					<div class="wrap-input100 validate-input" data-validate="Password is required">
						<span class="label-input100">Mot de passe</span>
						<input class="input100" type="password" name="mp" placeholder="Tapez votre mot de passe">
						<i class="fa-solid fa-lock"></i>
					</div>
					
					<br/>
					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button class="login100-form-btn">
								Creer
							</button>
						</div>
					</div>
					<br/>
					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<a href=""><button class="login100-form-btn" >
								Annuler
							</button></a>
						</div>
					</div>
          </form>
      </div>
     <!--      footer    -->
     <?php
    include "inc/footer.php";?>
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.4.8/sweetalert2.all.min.js"></script>
      <?php
      if ($show==1){
        print"
        <script> 
       Swal.fire({
         position: 'top-end',
           icon: 'success',
          title: 'Votre compte est crée avec success',
           showConfirmButton: false,
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
     </html>