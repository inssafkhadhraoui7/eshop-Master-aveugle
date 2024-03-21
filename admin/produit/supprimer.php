<?php
$id=$_GET['idp'];
include"../../inc/function.php";
$conn=connecte();
$rq="DELETE FROM produit WHERE id_prod='$id'";
$result=$conn->query($rq);
if($result){
    header('location:liste.php?supp=ok');
}






?>