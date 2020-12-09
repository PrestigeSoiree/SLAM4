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



 public function __construct($l = NULL, $n = NULL, $p = NULL) {
   if (!is_null($l) && !is_null($n) && !is_null($p)) {
     // Si aucun de $m, $c et $i sont nuls,
     // c'est forcement qu'on les a fournis
     // donc on retombe sur le constructeur à 3 arguments
     $this->login = $l;
     $this->nom = $n;
     $this->prenom = $p;
   }
 }



 public static  function getAllUtilisateurs() {
   $rep = Model::$pdo->query("Select * from utilisateur");
   $rep->setFetchMode(PDO::FETCH_CLASS,'utilisateur');
   $tab_utilisateur = $rep->fetchAll();
   foreach ($tab_utilisateur as $key){
       $key->afficher()."<br>";
   }
   }
   
   public function afficher() {
    
      echo "Login : ".$this->login."<br>";
      echo "Nom : ".$this->nom."<br>";
      echo "Prénom :".$this->prenom."<br><br>";

  
   // À compléter dans le prochain exercice
   }

}
?>
