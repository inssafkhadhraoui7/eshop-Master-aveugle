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
<body onload="verif1()">
   <script src="js\voice.js"></script>
    <?php
    include "inc/header.php";?>
       <!-- Hero Section Begin -->
   <section class="hero">
        <div class="hero__slider owl-carousel">
            <div class="hero__items set-bg" data-setbg="images/hero-1.jpg">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-5 col-lg-7 col-md-8">
                            <div class="hero__text">
                                <h6 id="h6" onmouseenter="verif(this)">Collection Été</h6>
                                <h2 id="H02" onmouseenter="verif(this)">Collections Automne - Hiver 2023</h2>
                                <p id="p" onmouseenter="verif(this)">Une marque spécialisée dans la création d'essentiels de luxe. Fabriqué de manière éthique avec une inébranlable
                                engagement envers une qualité exceptionnelle.</p>
                                <a href="#" class="primary-btn" id="shop" onmouseenter="verif(this)">Shop now <span class="arrow_right"></span></a>
                               
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="hero__items set-bg" data-setbg="images/hero-2.jpg">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-5 col-lg-7 col-md-8">
                            <div class="hero__text">
                                <h6>Collection Été</h6>
                                <h2>Collections Automne - Hiver 2023</h2>
                                <p>Une marque spécialisée dans la création d'essentiels de luxe. Fabriqué de manière éthique avec une inébranlable
                                engagement envers une qualité exceptionnelle.</p>
                                <a href="#" class="primary-btn">Shop now <span class="arrow_right"></span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Hero Section End -->
    
    <!-- Banner Section Begin -->
    <section class="banner spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 offset-lg-4">
                    <div class="banner__item">
                        <div class="banner__item__pic">
                            <img src="images/banner/banner-1.jpg" alt="">
                        </div>
                        <div class="banner__item__text">
                            <h2 id="h2" >Collections de vêtements 2023</h2>
                            <a href="#">Achetez maintenant</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="banner__item banner__item--middle">
                        <div class="banner__item__pic">
                            <img src="images/banner/banner-2.jpg" alt="">
                        </div>
                        <div class="banner__item__text">
                            <h2>Accessories</h2>
                            <a href="#">Achetez maintenant</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="banner__item banner__item--last">
                        <div class="banner__item__pic">
                            <img src="images/banner/banner-3.jpg" alt="">
                        </div>
                        <div class="banner__item__text">
                            <h2>Chaussures Printemps 2023</h2>
                            <a href="#">Acheter maintenant</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
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
          
         
     <section class="categories spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="categories__text">
                        <h2>Vêtements Hot <br /> <span>Collection de chaussures</span> <br /> Accessories</h2>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="categories__hot__deal">
                        <img src="images/product-sale.png" alt="">
                        <div class="hot__deal__sticker">
                            <span>Vente de</span>
                            <h5>29.99DT</h5>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 offset-lg-1">
                    <div class="categories__deal__countdown">
                        <span>Offre de la semaine</span>
                        <h2>Sac Poitrine Multi-poches Noir</h2>
                        <div class="categories__deal__countdown__timer" id="countdown">
                            <div class="cd-item">
                                <span>3</span>
                                <p>jours</p>
                            </div>
                            <div class="cd-item">
                                <span>1</span>
                                <p>Heures</p>
                            </div>
                            <div class="cd-item">
                                <span>50</span>
                                <p>Minutes</p>
                            </div>
                            <div class="cd-item">
                                <span>18</span>
                                <p>Secondes</p>
                            </div>
                        </div>
                        <a href="#" class="primary-btn">Achetez maintenant</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Categories Section End -->
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