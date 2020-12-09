<?php
require_once File::build_path("model/Model.php");

class ModelVoiture extends Model {
	
    //variables
    protected static $object = 'voiture';
    protected static $primary='Immatriculation';
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
        $this->immatriculation=$immatriculation2;
	if (strlen($immatriculation2)<8){
            $this->immatriculation = substr($immatriculation2,0,8);
	}
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





}
?>