<?php
class Trajet {
 
 private $id;
 private $depart;
 private $arrivee;
 private $date;
 private $nbplaces;
 private $prix;
 private $conducteur_login;
 

 public function getId(){
    return $this->id;
}

public function setId($id){
    $this->id = $id;
}

public function getDepart(){
    return $this->depart;
}

public function setDepart($depart){
    $this->depart = $depart;
}

public function getArrivee(){
    return $this->arrivee;
}

public function setArrivee($arrivee){
    $this->arrivee = $arrivee;
}

public function getDate(){
    return $this->date;
}

public function setDate($date){
    $this->date = $date;
}

public function getNbplaces(){
    return $this->nbplaces;
}

public function setNbplaces($nbplaces){
    $this->nbplaces = $nbplaces;
}

public function getPrix(){
    return $this->prix;
}

public function setPrix($prix){
    $this->prix = $prix;
}

public function getConducteur_login(){
    return $this->conducteur_login;
}

public function setConducteur_login($conducteur_login){
    $this->conducteur_login = $conducteur_login;
}


public function __construct($i = NULL, $d = NULL, $a = NULL,$Da = NULL, $nb = NULL, $p = NULL,$l = NULL) {
    if (!is_null($i) && !is_null($d) && !is_null($a) && !is_null($Da) && !is_null($nb) && !is_null($p)&& !is_null($l)) {
        $this->id = $i;
        $this->depart = $d;
        $this->arrivee = $a;
        $this->date = $Da;
        $this->nbplaces = $nb;
        $this->prix = $p;
        $this->conducteur_login = $l;
    }
  }



 public static  function getAllTrajets() {
$rep = Model::$pdo->query("Select * from trajet");
$rep->setFetchMode(PDO::FETCH_CLASS,'trajet');
$tab_trajets = $rep->fetchAll();
foreach ($tab_trajets as $key){
    $key->afficher()."<br>";
}
}


 // une methode d'affichage.
 public function afficher() {
    
    echo $this->id."<br>";
    echo "Départ à : ".$this->depart."<br>";
    echo "Direction : ".$this->arrivee."<br>";
    echo "Départ le : ".$this->date."<br>";
    echo "Nombre de place disponibles : ".$this->nbplaces."<br>";
    echo "Prix : ".$this->prix." €<br>";
    echo "Pseudo du conducteur : ".$this->conducteur_login."<br><br>";

 // À compléter dans le prochain exercice
 }
}
?>
