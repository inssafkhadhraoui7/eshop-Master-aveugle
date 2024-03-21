<?php
session_start();
$id=$_POST['id'];
$nom=$_POST['qt'];
$rq="UPDATE SET quantite='$qt' WHERE id= '$id'";
$result=$conn->query($rq);
if($result){
    header('location:liste.php?mod=ok');
}





?>