<?php
$idcat=$_GET['idc'];
include"../../inc/function.php";
$conn=connecte();
$rq="DELETE FROM categorie WHERE id_cat='$idcat'";
$result=$conn->query($rq);
if($result){
    header('location:liste.php?supp=ok');
}






?>