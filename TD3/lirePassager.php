<?php

require_once'Model.php';
require_once 'trajet.php';
require_once'user.php';



echo "<br>";
echo "<br>";



Trajet::findPassagers("1")->afficher();

echo "<br>";
echo "<br>";

User::findTrajets("us2")->afficher();


