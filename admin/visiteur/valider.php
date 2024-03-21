<?php
$id=$_GET['id'];
include "../../inc/function.php"; 
$conn=connecte();
$rq= ("UPDATE visiteur SET etat=1  WHERE id='$id'");
$result=$conn->query($rq);

if($result){
    header('location:liste.php?vali=ok');
}else echo"Erreur de validation";


?>