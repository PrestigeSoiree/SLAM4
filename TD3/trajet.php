<?php
require_once 'user.php';
require_once'Model.php';

class Trajet {

    private $id;
    private $depart;
    private $arrivee;
    private $dateT;
    private $nbplace;
    private $cond_login;
    private $prix;
    private $id_user;

 // un getter
 public function getId() {
 return $this->id;
 }

 // un setter
 public function setId($id2) {
 $this->id = $id2;
 }
    
 // un getter
 public function getDepart() {
 return $this->depart;
 }

 // un setter
 public function setDepart($depart2) {
 $this->depart = $depart2;
 }

    // un getter
 public function getArrivee() {
    
 return $this->arrivee;
 }

 // un setter
 public function setArrivee($arrivee2) {
     
 $this->arrivee = $arrivee2;
 }

        // un getter
 public function getDateT() {
    
 return $this->dateT;
 }

 // un setter
 public function setDateT($dateT2) {
     
 $this->dateT = $dateT2;
 }
    
        // un getter
 public function getNbplace() {
    
 return $this->nbplace;
 }

 // un setter
 public function setNbplace($nbplace2) {
     
 $this->nbplace = $nbplace2;
 }
    
        
        // un getter
 public function getCondLog() {
    
 return $this->cond_log;
 }

 // un setter
 public function setCondLog($cond_log2) {
     
 $this->cond_log = $cond_log2;
 }
    
            // un getter
 public function getPrix() {
    
 return $this->prix;
 }

 // un setter
 public function setPrix($prix2) {
     
 $this->prix = $prix2;
 }

  public function getUs() {
    
 return $this->id_user;
 }
 
 // un constructeur

 public function __construct($i = NULL, $d = NULL, $a = NULL, $dt = NULL, $n = NULL, $c = NULL, $p = NULL) {
        if (!is_null($i) && !is_null($d) && !is_null($a)&& !is_null($dt)&& !is_null($n)&& !is_null($c)&& !is_null($p)) {
             $this->id = $i;
             $this->depart = $d;
             $this->arrivee = $a;
             $this->dateT = $d;
             $this->nbplace = $n;
             $this->cond_log = $c;
             $this->prix = $p;
            
        } 
    }

 // une methode d'affichage.
 public function afficher() {
 
     echo $this -> id." ";
     echo $this -> depart." ";
     echo $this -> arrivee." ";
     echo $this -> dateT." ";
     echo $this -> nbplace." ";
     echo $this -> cond_log." ";
     echo $this -> prix." ";
     echo "<br>";
     
 }
 
 

 
  public static function getAllTrajets(){
     $rep = Model::$pdo->query('SELECT * FROM trajet'); 
     $rep->setFetchMode(PDO::FETCH_CLASS, 'trajet'); 
      return $tab_tr = $rep->fetchAll();

 }
 
 
 public static function getAllPass(){
     $rep = Model::$pdo->query('SELECT * FROM passager'); 
     $rep->setFetchMode(PDO::FETCH_CLASS, 'passager'); 
     return $tab_tr = $rep->fetchAll();
     
      

 }
    
 
public static function findPassagers($id_user){
    $sql = "SELECT id_user, users.nom, users.prenom from passager, users WHERE id_trajet=:nom_tag AND users.login=passager.id_user";
    $req_prep = Model::$pdo->prepare($sql);
    $values = array(
        "nom_tag" => $id_user
    );
    $req_prep->execute($values);
    $req_prep->setFetchMode(PDO::FETCH_CLASS, 'User');
    $tab_tr = $req_prep->fetchAll();
    if (empty($tab_tr)){
        return false;
    }
    return $tab_tr[0];
}

/*
public static function deletePassager($id_trajet,$id_user){
    $sql="DELETE FROM passager WHERE id_trajet=:idT_tag AND id_user=:idU_tag";
    $req_prep = Model::$pdo->prepare($sql);
    $values = array(
        "idT_tag" => $id_trajet,
        "idU_tag" => $id_user
    );
    $req_prep->execute($values);
}
     
 */

public static function deletePassager($data){
    $id_trajet=$data[0];
    $id_user=$data[1];
    
    $sql="DELETE FROM passager WHERE id_trajet=:idT_tag AND id_user=:idU_tag";
    $req_prep = Model::$pdo->prepare($sql);
    $values = array(
        "idT_tag" => $id_trajet,
        "idU_tag" => $id_user
    );
    $req_prep->execute($values);
}
    
}
   
