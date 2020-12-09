<?php
require_once File::build_path('model/ModelUtilisateur.php'); 
require_once File::build_path( 'config/Conf.php');

class ControllerUtilisateur{
    
    public static function readAll(){
        $controller="utilisateur";
        $view="list";
        $pagetitle='Liste des utilisateurs';
        $tab_u = ModelUtilisateur::selectAll();
        require_once File::build_path( 'view/view.php'); 
    }
    
     public static function read(){
        $controller="utilisateur";
        $view="detail";
        $pagetitle='Detail de l\'utilisateurs';
        $primary_value = $_GET['login'];
        if(ModelUtilisateur::select($primary_value)==true){
           $tab = ModelUtilisateur::select($primary_value); 
        require_once File::build_path( 'view/view.php');
        
        }
        else{
           require_once File::build_path( 'view/utilisateur/error.php'); 
        }
    }
    
    public static function create(){
        $controller="utilisateur";
        $view="update";
        $pagetitle='création de l\'utilisateur';
        $action='create';
        require_once File::build_path( 'view/view.php'); 
    }
    
    public static function created(){
       $data = array();
        $data['login'] = $_POST['login'];
        $data['nom'] = $_POST['nom'];
        $data['prenom'] = $_POST['prenom'];
        
        $utilisateur = new ModelUtilisateur($data);
        $utilisateur->save($data);
        
        $controller="utilisateur";
        $view="created";
        $pagetitle='confirmation';
        $tab_u = ModelUtilisateur::selectAll();   
        require_once File::build_path('view\view.php');
    }
    
    public static function error(){
        require_once File::build_path('view/utilisateur/error.php');
    }
    
    
    public static function delete() {
        
        $primary_values=$_GET['login'];
        $utilisateur = new ModelUtilisateur($primary_values);
        $utilisateur->delete($primary_values);
        
        $controller="utilisateur";
        $view="deleted";
        $pagetitle='suppression';
        
        $tab_u = ModelUtilisateur::selectAll(); 
        require_once File::build_path('view\view.php');
    }
    
    public static function update(){
        
        $controller="utilisateur";
        $view="update";
        $pagetitle='Mise à jour de l\'utilisateur';
        $action='update';

        $primary_value = $_GET['login'];
        if(ModelUtilisateur::select($primary_value)==true){
           $tab_user = ModelUtilisateur::select($primary_value); 
        require_once File::build_path( 'view/view.php');
    }  
    }
    
    public static function updated(){
       $data = array();
        $data['login'] = $_POST['login'];
        $data['nom'] = $_POST['nom'];
        $data['prenom'] = $_POST['prenom'];
        
        $utilisateur = new ModelUtilisateur($data);
        $utilisateur->update($data);
        
        $controller="utilisateur";
        $view="updated";
        $pagetitle='confirmation';
        $tab_u = ModelUtilisateur::selectAll();     
        require_once File::build_path('view\view.php');          
    }
}

?>
