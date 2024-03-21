<?php
session_start();
$idc=$_POST['idc'];
$nom=$_POST['nom'];
$description=$_POST['description'];
$date_mod=date("Y-m-d");
include"../../inc/function.php";
$conn=connecte();
$rq=("UPDATE categorie SET nom='$nom',description='$description',date_mod='$date_mod' WHERE id_cat='idc'");
$result=$conn->query($rq);
if($result){
    header('location:liste.php?mod=ok');
}





?>