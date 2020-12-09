<?php
require_once File::build_path('model/ModelTrajet.php');
require_once File::build_path( 'config/Conf.php');

class ControllerTrajet{
    
    public static function readAll(){
        $controller="trajet";
        $view="list";
        $pagetitle='Liste des trajets';
        $tab_t = ModelTrajet::selectAll();
        require_once File::build_path( 'view/view.php');
    }
    
     public static function read(){
        $controller="trajet";
        $view="detail";
        $pagetitle='Detail de la trajets';
        $primary_value = $_GET['id'];
        if(ModelTrajet::select($primary_value)==true){
           $tab = ModelTrajet::select($primary_value);
        require_once File::build_path( 'view/view.php');
        
        }
        else{
           require_once File::build_path( 'view/trajet/error.php');
        }
    }
    
    public static function create(){
        $controller="trajet";
        $view="update";
        $pagetitle='création de trajet';
        $action='create';
        require_once File::build_path( 'view/view.php');
    }
    
    public static function created(){
       $data = array();
        $data['Id'] = $_POST['id'];
        $data['Depart'] = $_POST['depart'];
        $data['Arrivee'] = $_POST['arrivee'];
        $data['Date'] = $_POST['date'];
        $data['Nbplaces'] = $_POST['nbplaces'];
        $data['Prix'] = $_POST['prix'];
        $data['Conducteur_login'] = $_POST['conducteur_login'];
        
        $trajet = new ModelTrajet($data);
        $trajet->save($data);
        
        $controller="trajet";
        $view="created";
        $pagetitle='confirmation';
        $tab_t = ModelTrajet::selectAll();
        require_once File::build_path('view\view.php');
    }
    
    public static function error(){
        require_once File::build_path('view/trajet/error.php');
    }
    
    
    public static function delete() {
        
        $primary_values=$_GET['id'];
        $trajet = new ModelTrajet($primary_values);
        $trajet->delete($primary_values);
        
        $controller="trajet";
        $view="deleted";
        $pagetitle='suppression';
        
        $tab_t = ModelTrajet::selectAll(); 
        require_once File::build_path('view\view.php');
    }
//    
//    public static function update(){
//        
//        $controller="trajet";
//        $view="update";
//        $pagetitle='Mise à jour du trajet';
//        $action='update';
//
//        $primary_value = $_GET['id'];
//        if(ModelTrajet::select($primary_value)==true){
//           $tab_traj = ModelTrajet::select($primary_value); //appel au modèle pour gerer la BD
//        require_once File::build_path( 'view/view.php'); //redirige vers la vue
//    }  
//    }
//    
//    public static function updated(){
//       $data = array();
//        $data['Id'] = $_POST['id'];
//        $data['Depart'] = $_POST['depart'];
//        $data['Arrivee'] = $_POST['arrivee'];
//        $data['Date'] = $_POST['date'];
//        $data['Nbplaces'] = $_POST['nbplaces'];
//        $data['Prix'] = $_POST['prix'];
//        $data['Conducteur_login'] = $_POST['conducteur_login'];
//
//        $trajet = new ModelTrajet($data);
//        $trajet->update($data);
//        
//        $controller="trajet";
//        $view="updated";
//        $pagetitle='confirmation';
//        $tab_t = ModelTrajet::selectAll();   //appel au modèle pour gerer la BD      
//        require_once File::build_path('view\view.php');//redirige vers la vue
//    }
}

?>
