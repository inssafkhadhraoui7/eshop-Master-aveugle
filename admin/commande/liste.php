<?php
include'../../inc/function.php';
if (isset($_POST['btn'])){
  changeretat($_POST);
}
session_start();

$comm=getallcommande();
$commandes=getcommande();
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/docs/4.1/assets/img/favicons/favicon.ico">

    <title>adminprofile</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.1/examples/dashboard/">

    <!-- Bootstrap core CSS -->
    <link href="../../css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../../css/dashboard.css" rel="stylesheet">
  </head>

  <body>
    <nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
      <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">Sois Mes Yeux</a>
      <ul class="navbar-nav px-3">
        <li class="nav-item text-nowrap">
          <a class="nav-link" href="../../deconnexion.php">Deconnexion</a>
        </li>
      </ul>
    </nav>

    <div class="container-fluid">
      <div class="row">
       <?php
         include "../navigation.php";

?>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Listes des Paniers</h1>
          </div>
           <!-- liste de cate -->
           <div>
               <?php
               if (isset($_GET['ajout']) && ($_GET['ajout']=='ok')){
                   print'
                   <div class="alert alert-success">categorie ajoutée avec succées</div>
                   ';


               }


               ?>
</div>
            <table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Client</th>
      <th scope="col">Totale</th>
      <th scope="col">Date</th>
      <th scope="col">Etat</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
  <?php
      $i=0;
        foreach($commandes as $c){
            $i++;
            print'
            <tr>
      <th scope="row">'.$i.'</th>
      <td>'. $c['nom'].' '. $c['prenom'].'</td>
      <td>'. $c['total'].'DT</td>
      <td>'. $c['date_crea'].'</td>
      <td>'. $c['etat'].'</td>
      <td>
          <a href="" data-toggle="modal" data-target="#commandes'.$c['id'].'" class="btn btn-primary">Afficher</a>
          <a href="" data-toggle="modal" data-target="#traite'.$c['id'].'" class="btn btn-success">Traiter la commande</a>

      </td>
    </tr>
            
            ';
        }



     ?>
    

    
  </tbody>
</table>
    </div>
        </main>
      </div>
    </div>
    <?php
foreach($commandes as $index => $c){?>


<div class="modal fade" id="commandes<?php echo $c['id'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Liste des commandes</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      
      <table class="table">
        <thead>
          <tr>
            <th >Nom produit</th>
            <th>Image</th>
            <th>Quantité</th>
            <th>Total</th>
          
          </tr>
</thead>
     <tbody>
       
         <?php

         foreach($comm as $i=> $co){
           if ($co['panier']==$c['id']){
          print'<tr>
          <td>'.$co['nom_prod'].' </td>
          <td><img src="../../images/ '.$co['image'].' "width="100"/> </td>
          <td>  '.$co['quantite'].' </td>
          <td>  '.$co['total'].'DT </td>
         
          </tr>
          ';
        }
         }
        
         ?>
      
     </tbody>
        </table>
    </div>
  </div>
</div>
<?php
}

foreach($commandes as $index => $c){?>



<div class="modal fade" id="traite<?php echo $c['id'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Liste des commandes</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="liste.php" method="post">
        <input type="hidden"  value="<?php echo $c['id'];?>"name="p_id">
        <div class="form-group">
        <select name="etat" class="form-control">
          <option value="livraison">En Livraison</option>
          <option value="livraison termine">En Livraison terminé</option>
        </select>
        </div>
      
        <div class="form-group">
        <button type="submit" name="btn"class="btn btn-primary">sauvgarder</button>
          </div>
      
      </form>

    </div>
  </div>
</div>
<?php
}
?>
        
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="../../js/popper.min.js"></script>
    <script src="../../js/bootstrap.min.js"></script>

    <!-- Icons -->
    <script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>
    <script>
      feather.replace()
    </script>
    <script>
     function deletecat{
        return confirm("voulez-vous vraiment supprimer cette categorie!");
      }
      </script>
    <!-- Graphs -->
    
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.7.1/dist/Chart.min.js"></script>
  </body>
</html