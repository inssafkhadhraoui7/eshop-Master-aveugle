<?php
session_start();
$id=$_GET['id'];
$total_en=$_SESSION['panier']['3'][$id][2];
$_SESSION['panier'][3][2]-=$total_en;
unset($_SESSION['panier'][3][$id]);

header ('location:../panier.php');




?>