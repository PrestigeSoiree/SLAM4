<?php

require_once 'trajet.php';

if (empty($_POST['id_user']) ){
    echo "donnée manquante";
}
else {
    echo "ID : ".$_POST['id_user']. "<br>";
    User::findTrajets($_POST['id_user'])->afficher();
}
