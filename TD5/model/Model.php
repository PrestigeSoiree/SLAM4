<?php

require_once 'config/Conf.php';
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
}
Model::Init();