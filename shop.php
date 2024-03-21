<?php
session_start();
include "inc/function.php";  

  $categories=getcategorie();
 if (!empty($_POST)){
   $produits=getsearch($_POST['search']);
 }else $produits=getallproduct();
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
  </head>
<body>
    <?php
    include "inc/header.php";?>
      <!-- Breadcrumb Section Begin -->
      <section class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__text">
                        <h4>Shop</h4>
                        <div class="breadcrumb__links">
                            <a href="index.php">Maisson</a>
                            <span>Boutique</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->
    <!-- Instagram Section Begin -->
    <div class="row col-12 mt-4">
        <?php
         foreach($produits as $produit){

          print '<div class="col-3 mt-2">
          <div class="card" style="width: 18rem;">
              <img src="images/'.$produit['image'].'" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title">'.$produit['nom_prod'].'</h5>
                <p class="card-text">'.$produit['description'].'</p>
                <a href="produit.php?id='.$produit['id_prod'].'" class="btn btn-primary">Afficher</a>
              </div>
            </div>
        </div>';
         }



        ?>
        </div>
    <!-- Instagram Section End -->
      <div class="row col-12 mt-4">
       <?php
    include "inc/footer.php";?> 
</body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>




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