<?php
session_start();
include "inc/function.php";
$total=0;
if (isset($_SESSION['panier'])){
 $total=$_SESSION['panier'][2];
}
  $cat=getcategorie();
 if (!empty($_POST)){
   $produits=getsearch($_POST['search']);
 }else $produits=getallproduct();
$commandes=array();
 if (isset($_SESSION['panier'])){
      if (count($_SESSION['panier'][3])>0 ){
          $commandes=$_SESSION['panier'][3];
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
  </head>
<body>
    <?php
    include "inc/header.php";?>
    
      <div class="row col-12 mt-4 p-5">
      <h1>Panier utilisateur</h1>
      <table class="table ">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Produit</th>
      <th scope="col">Quantité</th>
      <th scope="col">Total</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
      <?php
      foreach ($commandes as $i=> $c ){
        
          print'
          <tr>
          <th scope="row">'.($i+1).'</th>
          <td>'.$c[5].'</td>
          <td>'.$c[1].'Pieces</td>
          <td>'.$c[2].'DT</td>
          <td ><a href="action/supprimer-prod.php?id='.$i.'"class="btn btn-danger">Supprimer</a></td>
        </tr>
       
          ';
      }

      ?>
    
  </tbody>
</table>
    <div class="text-end mt3">
      <h3>Total:<?php echo $total; ?> DT
      </h3>
      <br/>
    <a href="action/valider-panier.php" class="btn btn-success"style="width:100px;">Valider</a>
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