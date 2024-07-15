<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style9.css">
    <title> Les profils </title>
</head>
<body>
    <form action="profileC.php"   method="post" enctype="multipart/form-data">
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
              <input type="text" id="Login" name="Login" readonly
               value= "<?php echo $Login  ?>"
              >
              
    </p>
     <p>
              <label for="Passwd" class="<?php echo $classPasswd ?>">  Passwd:  </label>
              <input type="text" id="Passwd" name="Passwd"
              value= "<?php echo $Passwd  ?>"
              >      
    </p>
     <p>
              <label for="Genre" class="<?php echo $classGenre ?>">  Genre:  </label>
              <input type="text" id="Genre" name="Genre"
              value= "<?php echo $Genre  ?>"
              >      
    </p>
    <p>
              <label for="Admin" class="<?php echo $classAdmin ?>">  Admin:  </label>
              <input type="text" id="Admin" name="Admin"
              value= "<?php echo $Admin  ?>"
              >      
    </p>
         <h2>Upload Fichier</h2>
        <label for="fileUpload">Fichier:</label>
        <input type="file" name="photo" id="fileUpload">
     <p>
        <img src="data:image/jpeg;base64,<?= $Base64img; ?>" alt="Mon image" width="100" height="100" />
    </p>
    
        <input id='submit_ProfileOK' class="button" type="submit" name="submit_ProfileOK" value="OK" >
        <input id='submit_List' class="button" type="submit" name="submit_List" value="List" >
        <input id='submit_Logout' class="button" type="submit" name="submit_Logout" value="Logout" >
   </form>
</body>
</html>