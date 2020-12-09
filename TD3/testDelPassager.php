<?php

require_once 'trajet.php';

if (empty($_POST['data'][0]) ){
    echo "donnée manquante";
}
else {
    echo "L'utilisateur ".$_POST['data'][0]. " a été supprimé du trajet n°".$_POST['data'][1];
    print_r($_POST['data']);
   Trajet::deletePassager($_POST['data'])->afficher();
}
