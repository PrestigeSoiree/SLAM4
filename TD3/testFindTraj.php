<?php

require_once 'trajet.php';

if (empty($_POST['id_user']) ){
    echo "donn�e manquante";
}
else {
    echo "ID : ".$_POST['id_user']. "<br>";
    User::findTrajets($_POST['id_user'])->afficher();
}
