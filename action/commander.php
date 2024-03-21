<?php
session_start();
if(!isset($_SESSION['nom'])){
   header('location:../inscrir.php');
  exit();
}
include "../inc/function.php";
$conn=connecte();
// //creation du panier
$visiteur=$_SESSION['id'];


 $id=$_POST['prod'];
 $qt=$_POST['qt'];

 $rq="SELECT prix,nom_prod FROM produit WHERE id_prod='$id'";
 $result=$conn->query($rq);
 
    $produit=$result->fetch();
    $total=$qt * $produit['prix'];
    $date=date("Y-m-d");
    if(!isset($_SESSION['panier'])){
        $_SESSION['panier']=array($visiteur,0,$date,array());

    }
    $_SESSION['panier'][2]+=$total;
    $_SESSION['panier'][3][]=array($id,$qt,$total,$date,$date,$produit['nom_prod']);
header('location:../panier.php');







?>