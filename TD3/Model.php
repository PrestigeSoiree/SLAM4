<?php

require_once 'Conf.php';

class Model
{
public static $pdo;
    
  public static function Init(){
    $hostname=Conf::getHostname();
    $BDDname=Conf::getDatabase();
    $login=Conf::getLogin();
    $password=Conf::getPassword();

    try{
      self::$pdo= new PDO("mysql:host=$hostname;dbname=$BDDname",$login,$password,
      array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
      self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
     } 
     catch(PDOException $e) 
     {
       
      echo $e->getMessage("erreur (");
     }
    }
 } 
  Model::Init()
?>