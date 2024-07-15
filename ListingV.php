<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style11.css">
    <title>Listing fichier</title>
</head>
<body>
  
    <form action="ListingC.php"   method="post" >
        <input id='submit_OKL' class="button" type="submit" name="submit_OKL" value="OK" >
     </form>
    <?php    
    echo "<table>
         <thead> 
         <th>Id</th> 
         <th>Publication</th>
         <th>Numero</th>
         <th>Type</th>
         <th>Article</th>
         <th>Edit</th>
         </thead>
         <tbody>" ;

    /* echo "<p> Login : $login passwd : $passwd </p> "  ;  */
    $count=0 ;
    if(!empty($data))
        foreach( $data as $Id => $Ligne )
        {
         echo "<tr>"    ;     
         echo "<td>".$Id."</td>" ;
         echo "<td>".$Ligne[0]."</td>" ;
         echo "<td>".$Ligne[1]."</td>" ;
         echo "<td>".$Ligne[2]."</td>" ;
         echo "<td>".$Ligne[3]."</td>" ;
         echo "<td><a href=\"registerC.php?Id=$Id\"> .$count. </a> </td>" ;
         echo  "</tr>"  ; 
        $count=$count + 1 ;
       }

    echo "</tbody>
          </table>" ;
    ?>
    
       
</body>
</html>

