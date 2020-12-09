<?php
class Conf {

    


 static private $databases = array(
     
 // ou localhost sur votre machine
 'hostname' => 'localhost:3306',

 'database' => 'slam4',		

 'login' => 'root',

 'password' => ''
 
 );
 

 static public function getLogin() {

 return self::$databases['login'];
 }
 static public function getHostname() {

 return self::$databases['hostname'];
 }
 static public function getDatabase() {

 return self::$databases['database'];
 }
 static public function getPassword() {

 return self::$databases['password'];
 }

}
