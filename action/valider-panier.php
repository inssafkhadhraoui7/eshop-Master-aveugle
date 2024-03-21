<?php
session_start();
include "../inc/function.php";
$conn=connecte();
// //creation du panier
$visiteur=$_SESSION['id'];
$total=$_SESSION['panier'][2];
$date=date("Y-m-d");
$rq_p="INSERT INTO panier (visiteur,total,date_crea)VALUES('$visiteur','$total','$date') ";
 $result=$conn->query($rq_p);
 $id_pan=$conn -> lastInsertId();
 $commandes = $_SESSION['panier'][3];
 foreach ($commandes as $c){
     $id=$c[0];
     $qt= $c[1];
     $total=$c[2];
    $rq2= "INSERT INTO  commande (produit,quantite,panier,total,date_crea,date_mod) VALUES ('$id','$qt',' $id_pan','$total','$date','$date')";
    $result=$conn->query($rq2);
 }
 unset( $_SESSION['panier']);
header('location:../index.php');

?>