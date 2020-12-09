<?php
require_once ('../model/ModelVoiture.php');
class ControllerVoiture {
 public static function readAll() {
 $tab_v = ModelVoiture::getAllVoitures();
 require ('../view/voiture/list.php');
 }

public static function read() {
    if (isset($_GET['immat'])){
        $immat=$_GET['immat'];
    $v = ModelVoiture::getVoitureByImmat($immat);
    require ('../view/voiture/detail.php'); 
        } else {
            echo "Aucune immatriculation donné !";
        }
    }



    public static function create() {
    require('../view/voiture/create.php');
}

public static function created() {
    $immatriculation=$_POST['immatriculation'];
    $couleur=$_POST['couleur'];
    $marque=$_POST['marque'];

    $v = new ModelVoiture($marque,$couleur,$immatriculation);
    $v->save($marque,$couleur,$immatriculation);
}

}
?>