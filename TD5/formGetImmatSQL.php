<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <div>
            <form method="get" action="formGetImmatSQL.php">
                <fieldset>
                    <legend>Trouve une voiture par son immatriculation :</legend>
                    <p>
                        <label for="immat_id">Immatriculation</label> :
                        <input type="text" placeholder="Ex : XX222XX" name="immatriculation" id="immat_id" required/>
                    </p>
                    <p>
                        <input type="submit" value="Envoyer" />
                    </p>
                </fieldset> 
            </form>
        </div>
        <?php

        require_once 'model/Model.php';
        require_once 'model/ModelVoiture.php';
        
        function getVoitureByImmat($immat) {
            $sql = "TRUNCATE TABLE voiture2";
            echo "<p>J'effectue la requête \"$sql\"</p>";
            $rep = Model::$pdo->query($sql);
            $rep->setFetchMode(PDO::FETCH_CLASS, 'Voiture');
            return $rep->fetch();
        }

        if (isset($_GET['immatriculation'])) {
            $v = getVoitureByImmat($_GET['immatriculation']);
            $v-> afficher();
        }
        ?>
    </body>
</html>
