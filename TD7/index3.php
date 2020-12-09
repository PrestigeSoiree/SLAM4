<html>
    <head>
        <?php
        //connexion
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
        //fin script connexion
            
            session_start();
            $_SESSION['login']='franco';
            $_SESSION['tab']=array("andro","BTS SIO");
        ?>
        <meta charset="UTF-8">
        <title>Test Session</title>
    </head>
    <body>
        <?php
     echo $_SESSION['login'];
     foreach ($_SESSION['tab'] as $values){
         echo "<br>Les données sont : ".$values;
     }
     
    session_unset();
    session_destroy();
    setcookie(session_name(),'',time()-1);
    
    if(isset($_SESSION['login']) && $_SESSION['tab']){
            echo $_SESSION['login'];
            foreach ($_SESSION['tab'] as $values){
                echo "<br>Les données sont : ".$values;
            }
    }
    else{
        echo "<br>La session 'login' et 'tab' ont été supprimée!";
    }

        ?>
    </body>
</html>
<?php

