<?php
session_start();
if(!isset($_SESSION['nom'])){
    //header('location:profile.php');
}
include "../inc/function.php"; 
   $user=true;
 
  if(!empty($_POST)){
    $user=connectadmin ($_POST);
    if (is_array($user) && count($user)>0){
      session_start();
      $_SESSION['id_ad']=$user['id'];
      $_SESSION['email']=$user['email'];
      $_SESSION['nom']=$user['nom'];
    
      $_SESSION['mp']=$user['mp'];
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="css/magnific-popup.css" type="text/css">
    <link rel="stylesheet" href="css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="../style.css" type="text/css">
    <link rel="stylesheet" href="../main.css" type="text/css">
</head>
<body>
       <!--      header    -->
      <div class="col-12 p-5">
        <h1 class="text-center">Espace Admin Connexion</h1>
        <form action="login.php" method="post">
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Votre Email </label>
              <input type="email" class="form-control"  name ="email" id="exampleInputEmail1" aria-describedby="emailHelp">
              <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
            </div>


              <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Mot de passe</label>
                <input type="password" name="mp" class="form-control" id="exampleInputPassword1">
              </div>
            <button type="submit" class="btn btn-primary">Connexion</button>
          </form>
      </div>
     <!--      footer    -->
     <?php
    include "../inc/footer.php";?>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.4.8/sweetalert2.all.min.js"></script>
    <?php
      if (!$user){
        print"
        <script>
        Try me! 
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
</html>