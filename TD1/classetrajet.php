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


 // un constructeur
 public function __construct($i,$d,$a,$Da,$nb,$p,$l) {
 $this->id = $i;
 $this->depart = $d;
 $this->arrivee = $a;
 $this->date = $Da;
 $this->nbplaces = $nb;
 $this->prix = $p;
 $this->conducteur_login = $l;
 }

 /*public static  function getAllTrajets() {
$rep = Model::$pdo->query("Select * from trajet");
$rep->setFetchMode(PDO::FETCH_CLASS,'Trajet');
$tab_trajets = $rep->fetchAll();
foreach ($tab_trajets as $key){
    $key->affichage()."<br>";
}
}*/

 // une methode d'affichage.
 public function afficher() {
    
    echo $this->login."<br>";
    echo $this->nom."<br>";
    echo $this->prenom."<br>";

 // À compléter dans le prochain exercice
 }
}
?>
