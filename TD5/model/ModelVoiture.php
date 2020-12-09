<?php
require_once "Model.php";
require_once File::build_path("lireVoiture.php");

class ModelVoiture {
	
    //variables
    private $marque;
    private $couleur;  
    private $immatriculation;
	
    // un getter
    public function getMarque() {
	return $this->marque;
    }
    // un setter
    public function setMarque($marque2) {
        $this->marque = $marque2;
    }
	
    // un getter
    public function getCouleur() {
	return $this->couleur;
    }
    // un setter
    public function setCouleur($couleur2) {
	$this->couleur = $couleur2;
    }
	
    // un getter
    public function getImmatriculation() {
	return $this->immatriculation;
    }
    // un setter
    public function setImmatriculation($immatriculation2) {
    $this->immatriculation = $immatriculation2;
    }
	
    // un constructeur
    public function __construct($m = NULL, $c= NULL, $i= NULL) {
        if(!is_null($m) && !is_null($c) && !is_null($i)){
            $this->marque = $m;
            $this->couleur = $c;
            $this->immatriculation = $i;
	}
    }
	
    //une methode d'affichage.
   public function afficher() {
	echo htmlspecialchars("Voiture de marque : ".$this->Marque." de couleur : ".$this->Couleur." immatriculation : ".$this->Immatriculation." . ");
    }

     public static function getAllVoitures() {  

	$sql = Model::$pdo->query("SELECT * FROM Voiture");

	while($tab_voiture = $sql->fetch(PDO::FETCH_ASSOC)){
            foreach($tab_voiture as $key =>$value){
		if($key=='Marque'){
                    $m=$value;
                }
                if($key=='Couleur'){
                    $c=$value;
                }
                if($key=='Immatriculation'){
                    $i=$value;
                }
            }
            
            $voiture = new ModelVoiture($m,$c,$i);
            $tab_v[]=$voiture;
           
        }
        return $tab_v;
    }
    public static function getVoitureByImmat($immat) {

 $sql = "SELECT * from voiture WHERE immatriculation=:nom_tag";
 // Préparation de la requête
 $req_prep = Model::$pdo->prepare($sql);
 $values = array(
 "nom_tag" => $immat,
 //nomdutag => valeur, ...
 );
 // On donne les valeurs et on exécute la requête
 $req_prep->execute($values);
 // On récupère les résultats comme précédemment
 $req_prep->setFetchMode(PDO::FETCH_CLASS, 'ModelVoiture');
 $tab_voit = $req_prep->fetchAll();
 // Attention, si il n'y a pas de résultats, on renvoie false
 if (empty($tab_voit)){
 return false;
 }
 else{
     
 return $tab_voit[0];
 }
}

public static function save($i, $m, $c){
    
    
    $sql = "INSERT INTO voiture (Immatriculation, Marque, Couleur) VALUES (:i_tag, :m_tag, :c_tag)";

    $req_prep = Model::$pdo->prepare($sql);
    $values = array(
         "i_tag" => $i,
        "m_tag" => $m,
        "c_tag" => $c
        
    //nomdutag => valeur, ...
    );

    $req_prep->execute($values);

    $req_prep->setFetchMode(PDO::FETCH_CLASS, 'ModelVoiture');
    $tab_voit = $req_prep->fetchAll();

    
}

}
?>