<?php
session_start();
include "inc/function.php"; 

  $cat=getcategorie();
 if (isset($_GET['id'])){
     $produit=getproduit ($_GET['id']);
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
</head>
<body>
<?php
  include "inc/header.php";?>
      <div class="row col-12 mt-4">
        
         <div class="card col-8 offset-2">
             <img src="images/<?php  echo $produit['image'] ?>" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title"><?php  echo $produit['nom_prod'] ?></h5>
                <p class="card-text"><?php  echo $produit['description'] ?></p>
               </div>
               <ul class="list-group list-group-flush">
                   <li class="list-group-item"><?php  echo $produit['prix'] ?>DT</li>
                   <?php
                   foreach($cat as $i => $c){
                       if ($c['id_cat']==$produit['categorie']){
                           print'
                           <button class="btn btn-success mt-2">'.$c['nom'].'</button>';
                       }
                   }

                   ?>
                    

                
                            </ul>
                            <div>
                     <form action="action/commander.php" method="post">
                         <input type="hidden" value="<?php  echo $produit['id_prod'] ?>" name="prod">
                         <table><tr>
                         <th><label > Votre Quantite  </label></th>
                         <td><input type="number" class="form-control" name="qt" step="1" placeholder="Quantité de produit"></td></tr>
                         <tr align-center><td ><button type="sumbit" class="btn btn-primary mt-2">Ajouter au Panier</button></td></tr></table>
                     </form>
                 </div>
               </div>
                 
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