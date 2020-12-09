<!DOCTYPE html>
<html>
    <meta charset="utf-8" />
 <head>
 <title></title>
 </head>

 <body>

<form method="post" action="../../controller/routeur.php?action=created">
    <fieldset>
    <legend>Mon formulaire :</legend>
    <p>
    <label for="immat_id">Immatriculation</label> :
    <input type="text" placeholder="Ex : 256AB34" name="immatriculation" id="immat_id" required/>
    </p>
    <p>
    <label for="immat_id">marque</label> :
    <input type="text" placeholder="Ex : Peugeot" name="marque" id="marque_id" required/>
    </p>
    <p>
    <label for="immat_id">couleur</label> :
    <input type="text" placeholder="Ex : Rouge" name="couleur" id="couleur_id" required/>
    </p>
    
    <p>
    <input type="submit" value="Envoyer" />
    </p>
    </fieldset>
   </form>

 </body>
</html>
