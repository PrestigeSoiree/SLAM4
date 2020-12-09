<?php
require_once File::build_path ("model/Model.php");

class ModelTrajet extends Model {
	
    //variables
    protected static $object = 'trajet';
    protected static $primary='id';
    private $id;
    private $depart;  
    private $arrivee;
    private $date;
    private $nbplaces;
    private $prix;
    private $conducteur_login;
    
    //getter
    function getId() {
        return $this->id;
    }

    function getDepart() {
        return $this->depart;
    }

    function getArrivee() {
        return $this->arrivee;
    }

    function getDate() {
        return $this->date;
    }

    function getNbplaces() {
        return $this->nbplaces;
    }

    function getPrix() {
        return $this->prix;
    }

    function getConducteur_login() {
        return $this->conducteur_login;
    }

    
    //setter
    function setId($id2) {
        $this->id = $id2;
    }

    function setDepart($depart2) {
        $this->depart = $depart2;
    }

    function setArrivee($arrivee2) {
        $this->arrivee = $arrivee2;
    }

    function setDate($date2) {
        $this->date = $date2;
    }

    function setNbplaces($nbplaces2) {
        $this->nbplaces = $nbplaces2;
    }

    function setPrix($prix2) {
        $this->prix = $prix2;
    }

    function setConducteur_login($conducteur_login2) {
        $this->conducteur_login = $conducteur_login2;
    }
	
    // un constructeur
    public function __construct($id = NULL, $depart = NULL, $arrivee = NULL, $date = NULL, $nbplaces = NULL, $prix = NULL, $conducteur_login = NULL) {
        if(!is_null($id) && !is_null($depart) && !is_null($arrivee) && !is_null($date) && !is_null($nbplaces) && !is_null($prix) && !is_null($conducteur_login)){
            $this->id = $id;
            $this->depart = $depart;
            $this->arrivee = $arrivee;
            $this->date = $date;
            $this->nbplaces = $nbplaces;
            $this->prix = $prix;
            $this->conducteur_login = $conducteur_login;
	}
    }
	
    //une methode d'affichage.
   public function afficher() {
	echo htmlspecialchars("Le trajet ".$this->Id." pour ".$this->Depart."/".$this->Arrivee." du : ".$this->Date." mets à disposition : ".$this->Nbplaces." places pour le trajet. Le prix du trajet sera de "
                .$this->Prix ." et le conducteur sera ".$this->Conducteur_login);
    }





}
?>