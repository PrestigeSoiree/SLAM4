<?php

require_once 'trajet.php';

if (empty($_POST['data'][0]) ){
    echo "donn�e manquante";
}
else {
    echo "L'utilisateur ".$_POST['data'][0]. " a �t� supprim� du trajet n�".$_POST['data'][1];
    print_r($_POST['data']);
   Trajet::deletePassager($_POST['data'])->afficher();
}
