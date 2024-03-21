<?php
session_start();
$nom=$_POST['nom'];
$description=$_POST['description'];
$createur=$_POST['createur'];
$prix=$_POST['prix'];
$categorie=$_POST['categorie'];
$date_crea=date("Y-m-d");
$qt=$_POST['quantite'];
$date_crea=date("Y-m-d");
//upead images 
$target_dir = "../../images/";
$target_file = $target_dir . basename($_FILES["image"]["name"]);
// Check if $uploadOk is set to 0 by an error
    if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
          $image=$_FILES["image"]["name"];
    } else {
      echo "Sorry, there was an error uploading your file.";
    }
    include "../../inc/function.php";
$conn=connecte();

$rq=("INSERT INTO produit(nom_prod,description,prix,image,createur,categorie,date_crea) VALUES ('$nom','$description','$prix','$image','$createur','$categorie','$date_crea')");
$result=$conn->query($rq);
if($result){
  $p_id=$conn->lastInsertId();
$rq2=("INSERT INTO stock(produit,quantite,createur,date_crea)VALUE('$p_id','$qt','$createur','$date_crea')");
if($conn->query($rq2)){
  header('location:liste.php?ajout=ok');
}else{
  echo " Impossible d'ajouter le stock du produit";
} 

}





?>