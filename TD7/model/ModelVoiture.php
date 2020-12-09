<?php
require_once File::build_path ("model/Model.php");

class ModelVoiture extends Model {
	

    protected static $object = 'voiture';
    protected static $primary='Immatriculation';
    private $marque;
    private $couleur;  
    private $immatriculation;
    private $prix;
    private $qte;
	

    public function getMarque() {
	return $this->marque;
    }

    public function setMarque($marque2) {
        $this->marque = $marque2;
    }
	

    public function getCouleur() {
	return $this->couleur;
    }

    public function setCouleur($couleur2) {
	$this->couleur = $couleur2;
    }
	

    public function getImmatriculation() {
	return $this->immatriculation;
    }

    public function setimmatriculation($immatriculation2) {
        if(strlen($immatriculation2) < 8) {
            $this->immatriculation = substr($immatriculation2,0,8);
        }
        else{
            $this->immatriculation = $immatriculation2;
            }
     }
    

    public function getQTE() {
	return $this->qte;
    }

    public function setQte($qte2) {
	$this->qte = $qte2;
    }    
    

    public function getPrix() {
	return $this->prix;
    }

    public function setPrix($prix2) {
	$this->prix = $prix2;
    }
	

    public function __construct($m = NULL, $c= NULL, $i= NULL/*, $q= NULL, $p= NULL*/) {
        if(!is_null($m) && !is_null($c) && !is_null($i) /*&& !is_null($q) && !is_null($p)*/){
            $this->marque = $m;
            $this->couleur = $c;
            $this->immatriculation = $i;
           /* $this->qte = $q;
            $this->prix = $p;*/
	}
    }
	
    
   public function afficher() {
	echo htmlspecialchars("Voiture de marque : ".$this->Marque." de couleur : ".$this->Couleur." immatriculation : ".$this->Immatriculation." . ");
    }





}
?>