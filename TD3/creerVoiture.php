<?php
require_once 'Voiture.php';
require_once 'Conf.php';
require_once 'Model.php';
   
  if ( isset( $_POST["marque"]) ) {

    $marque = $_POST['marque']; 


    echo "<h3>Votre voiture est de la marque : </h3>"; 
    echo $marque."<br>" ; 
   
 }
 if ( isset( $_POST["couleur"]) ) {

    $couleur = $_POST['couleur']; 


    echo "<h3>Votre voiture est de couleur : </h3>"; 
    echo $couleur."<br>" ; 
   
 }
 if ( isset( $_POST["immatriculation"]) ) {

   $immatriculation = $_POST['immatriculation']; 


   echo "<h3>Votre plaque d'immatriculation est : </h3>"; 
   echo $immatriculation."<br>" ; 
  
}
 Voiture::save($marque,$couleur,$immatriculation);

 echo "<br>Cliquez ". '<a href="formulaireVoiture.html">ici</a>' ." pour insérez une autre voiture ";
 echo '';

?>