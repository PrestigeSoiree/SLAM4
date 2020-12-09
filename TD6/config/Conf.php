<?php
class Conf{
    static private $databases = array(

        'hostname'=>'localhost:3306',

        'database'=>'slam4',

        'login' => 'root',

        'password' => '');       
    
    static public function getLogin() {

        // echo 'Login : ';        
        return self::$databases['login'];
    }
    static public function getHostname() {

        // echo 'Hôte : ';
        return self::$databases['hostname'];
    }
    static public function getDatabase() {

        // echo 'Base de donnée : ';
        return self::$databases['database'];
    }
    static public function getPassword() {
        
        // echo 'Mot de Passe : ';
        return self::$databases['password'];
    }
}
?>