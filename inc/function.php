<?php
function connecte(){
  //connexio bd
  $servername = "localhost";
  $bduser = "root";
  $password = "";
  $bdname="shop";
  
  try {
    $conn = new PDO("mysql:host=$servername;dbname=$bdname", $bduser, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo "Connected successfully";
    } 
  catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
  
  }
  return $conn;
} 
function getcategorie(){
  $conn= connecte();
  //creation rq
$rq= "SELECT * FROM categorie";
//execution rq
$result=$conn->query($rq);
//resultat
$categories=$result->fetchAll();
//var_dump($cat);
return $categories;
}
function getallproduct(){
 $conn= connecte();
//creation rq
$rq= "SELECT * FROM produit";
//execution rq
$result=$conn->query($rq);
//resultat
$produits=$result->fetchAll();
//var_dump($cat);
return $produits;
}   
function getsearch($keyword){
  $conn= connecte();
$requette= "SELECT* FROM produit WHERE nom_prod LIKE '%$keyword%'";
      $result=$conn->query($requette);
      $produits=$conn->fetchAll();
      return $produits;

}
function getproduit ($id){
  $conn= connecte();
  //creation rq
  $rq= "SELECT * FROM produit WHERE id_prod=$id ";
  $result=$conn->query($rq);
  //resultat
  $produit=$result->fetch();
  //var_dump($cat);
  return $produit;

}
 function addvisiteur(){
  $conn= connecte();
  $nom=$_POST['nom'];
$prenom=$_POST['prenom'];
$email=$_POST['email'];
$mp=md5($_POST['mp']);
$phone=$_POST['telephone'];
  //creation rq
  $result= $conn->prepare("INSERT INTO visiteur(nom,prenom,email,mp,telephone) VALUES ('$nom','$prenom','$email','$mp','$phone')");
  $result->execute();
  if ($result){
    return true;
  }else{return false;}
 }
 function connection ($data){
  $conn= connecte();
  $email=$data['email'];
  $mp=md5($data['mp']);
   //creation rq
  $rq=("SELECT* FROM visiteur WHERE email='$email' AND mp='$mp'");
  $result=$conn->query($rq);

  $user=$result->fetch();
  return $user;
 }
 function connectadmin ($data){
  $conn= connecte();
  $email=$data['email'];
  $mp=md5($data['mp']);
   //creation rq
  $rq=("SELECT* FROM admin WHERE email='$email' AND mp='$mp'");
$result=$conn->query($rq);

  $user=$result->fetch();
  return $user;
 }
 function getalluser(){
  $conn= connecte();
   //creation rq
   $rq=("SELECT* FROM visiteur WHERE etat=0");
  $result=$conn->query($rq);
 
   $user=$result->fetchAll();
   return $user;

 }
 function getstock(){
  $conn= connecte();
  //creation rq
  $rq=("SELECT s.id,p.nom_prod ,s.quantite FROM produit p ,stock s WHERE p.id_prod= s.produit");
  $result=$conn->query($rq);

  $stock=$result->fetchAll();
  return $stock;

 }
 function getcommande(){
  $conn= connecte();
  //creation rq
  $rq=("SELECT v.nom ,v.prenom,v.telephone, p.total,p.etat,p.date_crea,p.id FROM panier p ,visiteur v WHERE p.visiteur= v.id");
  $result=$conn->query($rq);

  $commandes=$result->fetchAll();
  return $commandes;




 }
 function getallcommande(){
  $conn= connecte();
  //creation rq
  $rq=("SELECT p.nom_prod,p.image,c.quantite,c.total,c.panier  FROM commande c,produit p WHERE c.produit= p.id_prod");
  $result=$conn->query($rq);

  $comm=$result->fetchAll();
  return $comm;
 }
 function changeretat($data){
  $conn= connecte();
  $rq="UPDATE  panier SET etat='".$data['etat']."' WHERE id ='".$data['p_id']."' ";
  $result=$conn->query($rq);


 }
 function editadmin ($data){
  $conn= connecte();
  if ($data['mp']!=""){
  $rq="UPDATE admin SET nom='".$data['nom']."', email='".$data['email']."',(mp='".md5($data['mp'])."' WHERE id_ad ='".$data['id']."' ";
  }else{
    $rq="UPDATE admin SET nom='".$data['nom']."', email='".$data['email']."' WHERE id_ad ='".$data['id']."' ";
  }
  $result=$conn->query($rq);
  return true;

 }
 function getdata(){
   $data=array();
  $conn= connecte();
   $rq1="SELECT count(*) FROM produit ";
   $result1=$conn->query($rq1);
   $nbprod=$result1->fetch();
   $rq2="SELECT count(*) FROM visiteur ";
   $result2=$conn->query($rq2);
   $nbclient=$result2->fetch();
   $rq3="SELECT count(*) FROM categorie ";
   $result3=$conn->query($rq3);
   $nbcat=$result3->fetch();
    $data['produit']=$nbprod[0];
    $data['client']=$nbclient[0];
    $data['categorie']=$nbcat[0];
    return $data;
 }


?>