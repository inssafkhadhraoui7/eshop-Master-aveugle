<?php
session_start();
$nom=$_POST['nom'];
$description=$_POST['description'];
$createur=$_SESSION['id_ad'];
$date_crea=date("Y-m-d");
include "../../inc/function.php";
$conn=connecte();
$rq=("INSERT INTO categorie(nom,description,createur,date_crea) VALUES ('$nom','$description','$createur','$date_crea')");
$result=$conn->query($rq);
if($result){
    header('location:liste.php?ajout=ok');
}





?>