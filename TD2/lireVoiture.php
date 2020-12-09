<?php
require_once 'Model.php';


$rep=Model::$pdo->query('SELECT * FROM Voiture');

 ($tab_obj = $rep->fetchAll(PDO::FETCH_OBJ));

 foreach($tab_obj as $Key){
    
    echo $Key->immatriculation."<br>";
    echo $Key->marque."<br>"  ;
    echo $Key->couleur."<br><br>";
 }




?>