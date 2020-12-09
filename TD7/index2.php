<html>
    <head>
        <?php
        $tableau = array("test1","test2","test3");
            setcookie("TestCookie1", serialize($tableau), time()+3600);
            
        ?>
        <meta charset="UTF-8">
        <title>Test Cookie</title>
    </head>
    <body>
        <?php
        var_dump($tableau);
        if(isset($_COOKIE["TestCookie1"])){
            $tab=unserialize($_COOKIE["TestCookie1"]);
            foreach ($tab as $values){
            
                    echo "<br>Le cookie contient : ".$values;
            
            }
                    
        }
        else{
            echo "aucune données dans le cookie";
        }

        ?>
    </body>
</html>
<?php
