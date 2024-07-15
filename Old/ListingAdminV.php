<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style9.css">
    <title>Listing fichier</title>
</head>
<body>
  
    
    <?php    
    echo "<table>
         <tr> 
         <th>Login</th> 
         <th>passwd</th>
         <th>genre</th>
         <th>admin</th>
         <th>editer<th>
         </tr>" ;

    /* echo "<p> Login : $login passwd : $passwd </p> "  ;  */
    $count=0 ;
    foreach( $data as $login => $Ligne )
    {
         echo "<tr>"    ;     
         echo "<td>".$login."</td>" ;
         echo "<td>".$Ligne[0]."</td>" ;
         echo "<td>".$Ligne[1]."</td>" ;
         echo "<td>".$Ligne[3]."</td>" ;
         if ( $Admin ) 
             echo "<td><a href=\"profileC.php?Login=$login\"> Calcule </a> </td>" ;
         echo  "</tr>"  ; 
      $count=$count + 1 ;
    }
    echo "</table>" ;
    ?>
      
   <form action="ListingC.php"   method="post" >
        <input id='submit_OKL' class="button" type="submit" name="submit_OKL" value="OK" >
   </form>
</body>
</html>

