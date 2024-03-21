<?php
session_start();
include'../../inc/function.php';
$categories=getcategorie();
$produits=getallproduct();
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/docs/4.1/assets/img/favicons/favicon.ico">

    <title>admin profile</title>

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
            <h1 class="h2">Listes des Produits</h1>
            <div>
                
                <a class="btn btn-primary" data-toggle="modal" data-target="#exampleModalLong">Ajouter</a>
            </div>
           
          </div>
           <!-- liste de cate -->
           <div>
               <?php
               if (isset($_GET['ajout']) && ($_GET['ajout']=='ok')){
                   print'
                   <div class="alert alert-success">Produit ajoutée avec succées</div>
                   ';


               }
               if (isset($_GET['supp']) && ($_GET['supp']=='ok')){
                print'
                <div class="alert alert-success">Produit supprimee avec succées</div>
                ';


            }
            if (isset($_GET['mod']) && ($_GET['mod']=='ok')){
              print'
              <div class="alert alert-success">Produit modifée avec succées</div>
              ';


          }


               ?>
</div>
            <table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nom</th>
      <th scope="col">Description</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
      <?php
     
    
     foreach($produits as $i => $p){
         $i++;
         print'
         <tr>
   <th scope="row">'.$i.'</th>
   <td>'. $p['nom_prod'].'</td>
   <td>'. $p['description'].'</td>
   <td>
       <table><tr>
       <td><a href="" data-toggle="modal" data-target="#editModalLong'.$p['id_prod'].'" class="btn btn-success">Modifier</a></td>
      <td> <a  onclick="return deleteprod()" href="supprimer.php?idp='.$p['id_prod'].'"class="btn btn-danger">Supprimerr</a></td>
        </tr></table >
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


<!-- Modal ajout -->
<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Ajouter une Produit</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <form action="ajout.php" method="post" enctype="multipart/form-data">
       <input type="hidden" value="<?php echo $produits['id_prod'];?>" name="idp"/>
        <div class="form-group">
            <input type="text"name="nom" class="form-control" placeholder="nom de Produit" >
        </div>
        <div class="form-group">
            <textarea name="description" class="form-control" placeholder="description de produit..."  ></textarea>
        </div>
        <div class="form-group">
            <input type="number" step="0.01"name="prix" class="form-control" placeholder="prix" >
        </div>
        <div class="form-group">
            <input type="file"name="image" class="form-control" >
        </div>
        <div class="form-group">
            <select name="categorie" class="form-control"  >
              <?php
              foreach($produits as $index => $p)
                print '  <option value="'.$p['id_prod'].'">'.$c['nom_prod'].'</option>'
                ;
              
              ?>
              </select>
        </div>
        <div class="form-group">
            <input type="number"name="quantite" class="form-control" placeholder="taper votre quantité de produit..." >
        </div>
        <input type="hidden" name="createur" value="<?php $_SESSION['id_ad']; ?>" />
      </div>
      <div class="modal-footer">       
        <button  type="sumbit" class="btn btn-primary">Enregistrer</button>
      </div>
      </form>
    </div>
  </div>
</div>
<?php
foreach($produits as $index => $p){?>
<div class="modal fade" id="editModalLong<?php echo$p['id_prod'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Modifier un produit</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <form action="modifier.php" method="post" ">
         <input type="hidden" value="<?php echo $p['id_prod'];?>" name="idc"/>
        <div class="form-group" >
            <input type="text"name="nom" class="form-control"  value="<?php echo $categorie['nom'];?>" placeholder="nom de categorie" >
        </div>
        <div class="form-group">
            <textarea name="description" class="form-control" placeholder="description de categorie..."  ><?php echo $categorie['description'];?></textarea>
        </div>
      </div>
      <div class="modal-footer">       
        <button  type="sumbit" class="btn btn-primary">Enregistrer</button>
      </div>
      </form>
    </div>
  </div>
</div>
<?php
}
?>

<script>
      function deleteprod{
        return confirm("voulez-vous vraiment supprimer ce produit!");
      }
      </script>   
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

    <!-- Graphs -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.7.1/dist/Chart.min.js"></script>
   
  </body>
</html