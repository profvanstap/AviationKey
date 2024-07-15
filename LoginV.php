<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style9.css">
    <title>Exercice 9 Ecran de saisie</title>
</head>
<body>
    <form action="LoginC.php"   method="post" >
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
              <label for="login"  class="<?php echo $classLogin ?>"> Login: </label>
              <input type="text" id="Login" name="Login">
   </p>
   <p>
              <label for="Passwd" class="<?php echo $classPasswd ?>">  Passwd:  </label>
              <input type="text" id="Passwd" name="Passwd"
              >      
    </p>
        <input id='submit_Login' class="button" type="submit" name="submit_Login" value="Login" >
        <input id='submit_Register' class="button" type="submit" name="submit_Register" value="Register" >
   </form>
</body>
</html>