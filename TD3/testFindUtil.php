<?php

require_once 'trajet.php';

if (empty($_POST['id_trajet']) ){
    echo "donnée manquante";
}
else {
    echo "ID : ".$_POST['id_trajet'];
    Trajet::findPassagers("$_POST[id_trajet]")->afficher();
    //Voiture::save($_POST['marque'],$_POST['couleur'],$_POST['immatriculation']);
}
