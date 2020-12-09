<?php
    require_once 'model/ModelVoiture.php';
	$i = $_POST["immatriculation"];
	$m = $_POST["marque"];
	$c = $_POST["couleur"];
        
                try {
            ModelVoiture::save($i,$m,$c);
            echo "<br> <br> Bien enregistré";
        } catch (Exception $ex) {
            echo 'Erreur : ' .$ex;
        }
?>