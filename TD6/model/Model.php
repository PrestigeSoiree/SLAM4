<?php
require_once ('lib/File.php');
require_once File::build_path('config/Conf.php');
class Model{
    
    public static $pdo;
    
    
    public static function Init(){
        $hote = Conf::getHostname();
        $bdd = Conf::getDatabase();
        $login = Conf::getLogin();
        $mdp = Conf::getPassword();

        try {
            $pdo = new PDO("mysql:host=$hote;dbname=$bdd", $login, $mdp);
            self::$pdo = $pdo;
            echo 'Connexion réussie <br><br>';
        } catch (Exception $ex) {
            echo 'Erreur : ' .$ex;
        }
    }
    
    //fonction afficher tout
    public static function selectAll() {
        
        $table_name = static::$object;
        $class_name = 'Model'.ucfirst($table_name);
        
        if($table_name == 'voiture'){
            $sql = Model::$pdo->query("SELECT * FROM ".$table_name);
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
                $voiture = new $class_name($m,$c,$i);
                $tab_v[]=$voiture;
            }
            return $tab_v;
        }
        
        if($table_name == 'utilisateur'){
            $sql = Model::$pdo->query("SELECT * FROM ".$table_name);
            while($tab_users = $sql->fetch(PDO::FETCH_ASSOC)){
                foreach($tab_users as $key =>$value){
                    if($key=='Login'){
                        $login=$value;
                    }
                    if($key=='Nom'){
                        $nom=$value;
                    }
                    if($key=='Prenom'){
                        $prenom=$value;
                    }
                }
                $user = new $class_name($nom,$prenom,$login);
                $tab_u[]=$user;
            }
            return $tab_u;
        }
        
               if($table_name == 'trajet'){
            $sql = Model::$pdo->query("SELECT * FROM ".$table_name);
            while($tab_trajets = $sql->fetch(PDO::FETCH_ASSOC)){
                foreach($tab_trajets as $key =>$value){
                    if($key=='Id'){
                        $id=$value;
                    }
                    if($key=='Depart'){
                        $depart=$value;
                    }
                    if($key=='Arrivee'){
                        $arrivee=$value;
                    }
                    if($key=='Date'){
                        $date=$value;
                    }
                    if($key=='Nbplaces'){
                        $nbplaces=$value;
                    }
                    if($key=='Prix'){
                        $prix=$value;
                    }
                    if($key=='Conducteur_login'){
                        $conducteur_login=$value;
                    }
                }
                $trajet = new $class_name($id,$depart,$arrivee,$date,$nbplaces,$prix,$conducteur_login);
                $tab_t[]=$trajet;

            }
            return $tab_t;
        }
    }

    //fonction afficher détail
    public static function select($primary_value) {
        
        $table_name = static::$object;
        $class_name = 'Model'.ucfirst($table_name);
        $primary_key = static::$primary;

        $sql = "SELECT * from ".$table_name." WHERE ".$primary_key." =:nom_tag";
        
        // Préparation de la requête
        $req_prep = Model::$pdo->prepare($sql);
        $values = array(
            "nom_tag" => $primary_value,
            //nomdutag => valeur, ...
        );
        

        $req_prep->execute($values);
        

        $req_prep->setFetchMode(PDO::FETCH_CLASS, $class_name);
        $tab = $req_prep->fetchAll();
        

        if (empty($tab)){
            return false;
        }
        else{
            return $tab[0];
        }
    }
    
    //fonction delete
    public static function delete($primary_value){
        
        $table_name = static::$object;
        $class_name = 'Model'.ucfirst($table_name);
        $primary_key = static::$primary;
       
        $sql = "DELETE FROM $table_name WHERE $primary_key =:nom_tag ";
        
        // Préparation de la requête
        $req_prep = Model::$pdo->prepare($sql);
        $values = array(
            "nom_tag" => $primary_value,
            //nomdutag => valeur, ...
        );
    

        
        $req_prep->execute($values);
        

        $req_prep->setFetchMode(PDO::FETCH_CLASS, $class_name);
        $tab = $req_prep->fetchAll();
    
    }
    
    public static function update($data){
    
        $table_name = static::$object;
        $class_name = 'Model'.ucfirst($table_name);
        $primary_key = static::$primary;
        $donnees='';
        
        foreach($data as $k=> $values){
            if($k==$primary_key){
                $primary = '"'.$values.'"';
            }
            else{
                $donnees = $donnees.$k.' = "'.$values.'", ';
            }
        }
        
        $donnees = rtrim($donnees, ", ");
        $sql = "UPDATE ".$table_name." SET ".$donnees." WHERE ".$primary_key." = $primary";

        $req_prep = Model::$pdo->prepare($sql);

        $req_prep->execute($data);

        $req_prep->setFetchMode(PDO::FETCH_CLASS, $class_name);
        $req_prep->fetchAll();
    }
    
    public static function save($data){
        $table_name = static::$object;
        $class_name = 'Model'.ucfirst($table_name);
        $primary_key = static::$primary;
        $key = '';
        $val = '';
    
        foreach ($data as $k=>$values){
            $key = $key.$k.", ";
            $val = $val.'"'.$values.'", '; 
        }
        $key = rtrim($key, ", ");
        $val = rtrim($val, ", ");
        
    $sql = "INSERT INTO ".$table_name." (".$key.") VALUES (".$val.")";

    $req_prep = Model::$pdo->prepare($sql);

    $req_prep->execute($data);
    
    $req_prep->setFetchMode(PDO::FETCH_CLASS, $class_name);
    $req_prep->fetchAll();

}
       
}
Model::Init();
