<?php
session_start();
$id=$_POST['idp'];
$nom=$_POST['nom'];
$description=$_POST['description'];
$prix=$_POST['prix'];
$image=$_POST['image'];
$date_mod=date("Y-m-d");
include"../../inc/function.php";
$conn=connecte();
$rq=("UPDATE produit SET nom='$nom',description='$description',prix='$prix',image='$image',date_mod='$date_mod' WHERE id_prod='idp'");
$result=$conn->query($rq);
if($result){
    header('location:liste.php?mod=ok');
}





?>