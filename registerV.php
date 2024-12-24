<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style12.css">
    <title>Exercice 9 Ecran de saisie</title>
</head>
<body>
    <form action="registerC.php"   method="post" >
<?php
    /*
    La vue va réaliser l'affichage de l'information.
    */
?>
  <p>   
<input type="text" id="Message" readonly
 value="<?php echo $Message ?>"
>
    <p>
              <label for="Id" class="<?php echo $classNumero ?>">  Id:  </label>
              <input type="number" id="Id" name="Id"
               value= "<?php if (!empty($Id)) echo $Id ; ?>" 
              >      
    </p>
    
     <p>
              <label for="Publication" class="<?php echo $classPublication ?>">  Publication:  </label>
              <select name="Publication" id="Publication" required>
                    <option <?php if($Publication == 'Aeroplane'){echo("selected");}?> value="Aeroplane">Aeroplane</option>
                    <option <?php if($Publication == 'Aeroplane Archive'){echo("selected");}?> value="Aeroplane Archive">Aeroplane Archive</option>
                    <option <?php if($Publication == 'AirForces'){echo("selected");}?> value="AirForces">AirForces</option>
		            <option <?php if($Publication == 'CombatAircraft'){echo("selected");}?> value="CombatAircraft">CombatAircraft</option>
                    <option <?php if($Publication == 'FlyPast'){echo("selected");}?> value="FlyPast">FlyPast</option>
                    <option <?php if($Publication == 'FlyPastSpecial'){echo("selected");}?> value="FlyPastSpecial">FlyPastSpecial</option>
                    <option <?php if($Publication == 'Key'){echo("selected");}?> value="Key">Key</option>
		    <option <?php if($Publication == 'ScaleAircraftModelling'){echo("selected");}?> value="ScaleAircraftModelling">ScaleAircraftModelling</option>
		    <option <?php if($Publication == 'Squadron!'){echo("selected");}?> value="Squadron!">Squadron!</option>

                </select> 
    </p>
    <p>
              <label for="Numero" class="<?php echo $classNumero ?>">  Numero:  </label>
              <input type="number" id="Numero" name="Numero"
               value= "<?php echo $Numero  ?>" 
              >      
    </p>
     <p>
              <label for="Type" class="<?php echo $classType ?>">  Type:  </label>
              <input type="text" id="Type" name="Type"
               value= "<?php echo $Type  ?>" 
              >      
    </p>
    <p>
              <label for="Article"  class="<?php echo $classArticle ?>"> Article: </label>
              <input type="text" id="Article" name="Article" size="80"
               value= "<?php echo $Article  ?>" 
              >
    </p>

    <div style="display: flex;">
        <input id='submit_OK' class="button" type="submit" name="submit_OK" value="OK" >
        <input id='submit_EDIT' class="button" type="submit" name="submit_EDIT" value="EDIT" >
        <input id='submit_DELETE' class="button" type="submit" name="submit_DELETE" value="DELETE" >
    </div>
    <div style="display: flex;">
        <input id='submitListPublication' class="button" type="submit" name="submitListPublication" value="List By Publication" >
        <input id='submitListPublicationASC' class="button" type="submit" name="submitListPublicationASC" value="List By Publication ASC" >
        <input id='submitNumero' class="button" type="submit" name="submitNumero" value="List By Numero" >
        <input id='submitListType' class="button" type="submit" name="submitListType" value="List By Type" >
        <input id='submitListTypeArticle' class="button" type="submit" name="submitListTypeArticle" value="List By Type/Article" >
    </div>
    <div>        
        <input id='submitTypes' class="button" type="submit" name="submitTypes" value="List Types" >
	    <input id='submitMonos' class="button" type="submit" name="submitMonos" value="List Monos" >
        <input id='submitLike' class="button" type="submit" name="submitLike" value="List Like" >
    </div>
    </form>
</body>
</html>