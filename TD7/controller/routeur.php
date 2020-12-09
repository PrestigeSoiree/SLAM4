<?php

require_once File::build_path('controller/ControllerVoiture.php');
require_once File::build_path('controller/ControllerUtilisateur.php');
require_once File::build_path('controller/ControllerTrajet.php');

if(isset($_COOKIE['preference'])){
    $controller_default = $_COOKIE['preference'];
}
else{
    $controller_default = 'voiture';
}

if (isset($_GET['controller'])){

    $controller = $_GET['controller'];

}

else{
        $controller = $controller_default;
}


switch ($controller) {
    
    case 'voiture':
        
        $controller_class = 'ControllerVoiture';
        break;
    
    case 'utilisateur':
        
        $controller_class = 'ControllerUtilisateur';        
        break;
        
    case 'trajet':

        $controller_class = 'ControllerTrajet';
        break;

}

if (class_exists($controller_class)){
    


    if (isset($_GET['action'])){

        $action = $_GET['action'];

    }

    else{
        
        $action ='readAll';
    }


    $class_methods = get_class_methods($controller_class);
    foreach($class_methods as $method_name){
        if(in_array($action, $class_methods)){

            $controller_class::$action();
        }
        else{

            $controller_class::error();
        }
    }
}
else{
    
        $controller_class::error();  
}

?>