<?php
session_start();
include'../../inc/function.php';
$categories=getcategorie();
?>
<!doctype html>
<html lang="fr">
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
      <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search">
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
            <h1 class="h2">Listes des Categories</h1>
            <div>
                
                <a class="btn btn-primary" data-toggle="modal" data-target="#exampleModalLong">Ajouter</a>
            </div>
           
          </div>
           <!-- liste de cate -->
           <div>
               <?php
               if (isset($_GET['ajout']) && ($_GET['ajout']=='ok')){
                   print'
                   <div class="alert alert-success">categorie ajoutée avec succées</div>
                   ';


               }
               if (isset($_GET['supp']) && ($_GET['supp']=='ok')){
                print'
                <div class="alert alert-success">categorie supprimee avec succées</div>
                ';


            }
            if (isset($_GET['mod']) && ($_GET['mod']=='ok')){
              print'
              <div class="alert alert-success">categorie modifée avec succées</div>
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
      $i=0;
        foreach($categories as $c){
            $i++;
            print'
            <tr>
      <th scope="row">'.$i.'</th>
      <td>'. $c['nom'].'</td>
      <td>'. $c['description'].'</td>
      <td>
          <a href="" data-toggle="modal" data-target="#editModalLong'.$c['id_cat'].'" class="btn btn-success">Modifier</a>
          <a  onclick="return deletecat()" href="supprimer.php?idc='.$c['id_cat'].'"class="btn btn-danger">Supprimerr</a>

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
        <h5 class="modal-title" id="exampleModalLongTitle">Ajouter une categorie</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <form action="ajout.php" method="post"id="addform">
        <div class="form-group"id="blocknom">
            <input type="text"name="nom"id="nom" class="form-control" placeholder="nom de categorie" >
        </div>
        <div class="form-group">
            <textarea name="description" class="form-control" placeholder="description de categorie..."  ></textarea>
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
foreach($categories as $index => $categorie){?>


<div class="modal fade" id="editModalLong<?php echo $categorie['id_cat'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Modifier une categorie</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <form action="modifier.php" method="post" >
         <input type="hidden" value="<?php echo $categorie['id_cat'];?>" name="idc"/>
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