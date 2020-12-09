<?php
class User {

 private $nom;
 private $login;
 private $prenom;

 // un getter
 public function getLogin() {
 return $this->login;
 }

 // un setter
 public function setLogin($login2) {
 $this->login = $login2;
 }
    
 // un getter
 public function getNom() {
 return $this->nom;
 }

 // un setter
 public function setNom($nom2) {
 $this->nom = $nom2;
 }

     // un getter
 public function getPrenom() {
    
 return $this->prenom;
 }

 // un setter
 public function setPrenom($prenom2) {
     
 $this->prenom = $prenom2;
 }


 // un constructeur

 public function __construct($l = NULL, $n = NULL, $p = NULL) {
        if (!is_null($l) && !is_null($n) && !is_null($p)) {
            $this->login = $l;
            $this->nom = $n;
            $this->prenom = $p; 
            
        } 
    }
    
 // une methode d'affichage.
 public function afficher() {
 
     echo $this -> login." ";
     echo $this -> nom." ";
     echo $this -> prenom." ";
     echo "<br>";
     
 }
 
 
  public static function getAllUsers(){
     $rep = Model::$pdo->query('SELECT * FROM users'); 
     $rep->setFetchMode(PDO::FETCH_CLASS, 'user'); 
      return $tab_us = $rep->fetchAll();




 }
 
  
 public static function getUt($login) {
    $sql = "SELECT * from users WHERE login=:nom_tag";
    $req_prep = Model::$pdo->prepare($sql);
    $values = array(
        "nom_tag" => $login
    );
    $req_prep->execute($values);
    $req_prep->setFetchMode(PDO::FETCH_CLASS, 'user');
    $tab_us = $req_prep->fetchAll();
    if (empty($tab_us)){
        return false;
    }
    return $tab_us[0];
}

    
public static function findTrajets($login){
    $sql = "SELECT * from trajet, passager WHERE id_user=:nom_tag";
    $req_prep = Model::$pdo->prepare($sql);
    $values = array(
        "nom_tag" => $login
    );
    $req_prep->execute($values);
    $req_prep->setFetchMode(PDO::FETCH_CLASS, 'trajet');
    $tab_t = $req_prep->fetchAll();
    if (empty($tab_t)){
        return false;
    }
    return $tab_t[0];
}
   
}