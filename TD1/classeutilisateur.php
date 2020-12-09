<?php
class Utilisateur {
 
 private $login;
 private $nom;
 private $prenom;

 // un getter
 public function getLogin() {
    return $this->login;
 }

 public function getNom() {
    return $this->nom;
 }
 
 public function getPrenom() {
    return $this->prenom;
 }

 // un setter
 public function setCouleur($login) {
    $this->login = $login;
 }

 public function setMarque($nom) {
    $this->nom = $nom;
 }

 public function setPrenom($prenom) {
    $this->prenom = $prenom;
 }


 // un constructeur
 public function __construct($l, $n, $p) {
 $this->login = $l;
 $this->nom = $n;
 $this->prenom = $p;
 }

}
?>
