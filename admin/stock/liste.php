<?php
session_start();
include'../../inc/function.php';
$stocks=getstock();
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
            <h1 class="h2">Stocks des Produits</h1>
           
          </div>
           <!-- liste de cate -->
           <div>
               <?php
               if (isset($_GET['mod']) && ($_GET['mod']=='ok')){
                   print'
                   <div class="alert alert-success">stock modifiée avec succées</div>
                   ';


               }
              

               ?>
</div>
            <table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nom de produit</th>
      <th scope="col">Quantite</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
      <?php
      $i=0;
        foreach($stocks as $s){
            $i++;
            print'
            <tr>
      <th scope="row">'.$i.'</th>
      <td>'. $s['nom_prod'].'</td>
      <td>'. $s['quantite'].'</td>
      <td>
          <a href="" data-toggle="modal" data-target="#editModal"'.$s['id'].'" class="btn btn-success">Modifier</a>
          

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
foreach($stocks as $index => $s){?>


<div class="modal fade" id="editModal" <?php echo $s['id'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Modifier stock<spam class="text-primary"><?php echo $s['nom_prod']; ?></spam></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <form action="modifier.php" method="post" ">
         <input type="hidden" value="<?php echo $s['id'];?>" name="id"/>
        <div class="form-group" >
            <input type="number"name="qt" class="form-control"  value="<?php echo $s['quantite'];?>" placeholder="taper votre nouveau quantité de stock" >
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