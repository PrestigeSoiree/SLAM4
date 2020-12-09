<?php
require_once File::build_path ("model/Model.php");

class ModelUtilisateur extends Model {
	
    //variables
    protected static $object = 'utilisateur';
    protected static $primary='login';
    private $nom;
    private $prenom;  
    private $login;
	
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
	
    // un getter
    public function getLogin() {
	return $this->login;
    }
    // un setter
    public function setLogin($login2) {
        if (strlen($login2) < 8){
            $this->login = substr($login2,0,8);
        }
        else{
            $this->login = $login2;
            }
    }

  
	
    // un constructeur
    public function __construct($nom = NULL, $prenom= NULL, $login= NULL) {
        if(!is_null($nom) && !is_null($prenom) && !is_null($login)){
            $this->nom = $nom;
            $this->prenom = $prenom;
            $this->login = $login;
	}
    }
	
    //une methode d'affichage.
   public function afficher() {
	echo htmlspecialchars("Le login ".$this->Login." correspond à ".$this->Nom." ".$this->Prenom." . ");
    }
}
?>