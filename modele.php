<?php
    /*  
    Le modèle permet de faire la liaison avec des données.
    Pour cet exercice, il y a "enfin" une partie modèle à réaliser.
    */
     
    function Connect()
    {
     $servername = "localhost";
     $username = "root";
     $password = "";
     $dbname = "aviation";

    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    // Check connection
    if ($conn) 
        Console_log("Connexion réussie") ; 
     else
        die("Connection failed: " . mysqli_connect_error());      
    return $conn;
    }

    
    function Supprime($Id )
    {
        $conn=Connect() ;
        Console_log("Id:".$Id) ;
        $DATA = "DELETE  FROM avions WHERE Id = $Id" ;
        Console_log("Data:".$DATA) ;
        $result = mysqli_query($conn,$DATA) ;
        if ($result) {
          return $result ; 
       } 
       else {
        die("DELETE failed: " .  mysqli_error($conn));
      }
    }

    function Existe($Id )
    {
        $conn=Connect() ;
        Console_log("Id:".$Id) ;
        $DATA = "SELECT * FROM avions WHERE Id = '".$Id."'" ;
        Console_log("Data:".$DATA) ;
        $result = mysqli_query($conn,$DATA) ;
        if ($result) {
          return mysqli_num_rows($result) ; 
       } 
       else {
        die("Select failed: " .  mysqli_error($conn));
      }
    }
   
   
    function Sauvegarde($Publication,$Numero,$Type, $Article)
    {
        console_log("function Sauvegarde") ;
        $conn=Connect() ;        
                 
       // $sql = mysqli_query($conn,"INSERT INTO `avions`(`Login`, `Passwd`, `Genre`, `Fichier`, `Admin`)
       // VALUES ('".$Login."','".$Passwd."','".$Genre."','".$Fichier."','".$Admin."')");
        $sql = "INSERT INTO `avions`(`Publication`, `Numero`, `Type`,`Article`) VALUES ( ?,?,?,?)" ;
        $requete = mysqli_prepare($conn,$sql) ;
        if ($requete)
           {
            Console_log("Preparation réussie");
          }
        else
           die("Error:".mysqli_error($conn));
        $ok = mysqli_stmt_bind_param($requete,'siss',$Publication,$Numero,$Type,$Article) ; // 5S car cinq strings
        $ok = mysqli_stmt_execute($requete) ;
        if ($ok) {
            Console_log("New record created successfully");
          } else 
                die("Error: " .mysqli_stmt_error($requete)) ; 
        return 1 ;
    } 

    function Remplace($Id, $Publication,$Numero,$Type,$Article )
    {
      console_log("function Remplace pour:".$Id) ;
        $conn=Connect() ;
        $sql = "UPDATE `avions` SET  `Publication` = ? ,`Numero` = ?,`Type`= ?,`Article`=?  WHERE `Id` = ?" ;
        $requete = mysqli_prepare($conn,$sql) ;
        if ($requete)
           {
             Console_log("Preparation réussie");
          }
        else
          die("Error:".mysqli_error($conn));
        $ok = mysqli_stmt_bind_param($requete,'sissi',$Publication,$Numero,$Type,$Article,$Id) ; // 5S car cinq strings
        $ok = mysqli_stmt_execute($requete) ;
        if ($ok) {
            Console_log("New record Replaced successfully");
          } else 
        die("Error: " .mysqli_stmt_error($requete)) ;
        return 1 ;
    } 
    


    function RecuperationParPublication($Publication)
    {
        $conn = connect() ;
        $sql = "SELECT * FROM avions  WHERE Publication='".$Publication."' ORDER BY Numero DESC" ;
        $result = mysqli_query($conn,$sql) ;
        if ($result) {
          Console_log("Recuperation Réussie");
       } 
       else {
         Console_log("Error: " . $result . "<br>" . mysqli_error($conn));
         return 0 ;
      }
        $data = [] ;
        while($info = mysqli_fetch_assoc($result))
        {
          //var_dump($info) ;
          // utiliser les guillements
          $data[$info["Id"]]= [ $info["Publication"],$info[ "Numero"], $info["Type"],$info["Article"]] ; 
        }
        return $data ;
    } 

    function RecuperationParPublicationASC($Publication)
    {
        $conn = connect() ;
        $sql = "SELECT * FROM avions  WHERE Publication='".$Publication."' ORDER BY Numero ASC" ;
        $result = mysqli_query($conn,$sql) ;
        if ($result) {
          Console_log("Recuperation Réussie");
       } 
       else {
         Console_log("Error: " . $result . "<br>" . mysqli_error($conn));
         return 0 ;
      }
        $data = [] ;
        while($info = mysqli_fetch_assoc($result))
        {
          //var_dump($info) ;
          // utiliser les guillements
          $data[$info["Id"]]= [ $info["Publication"],$info[ "Numero"], $info["Type"],$info["Article"]] ; 
        }
        return $data ;
    } 



    function RecuperationParNumero($Publication,$Numero)
    {
        $conn = connect() ;
        $sql = "SELECT * FROM avions  WHERE Publication='".$Publication."' AND Numero=$Numero ORDER BY Numero DESC" ;
        $result = mysqli_query($conn,$sql) ;
        if ($result) {
          Console_log("Recuperation par Numero Réussie");
       } 
       else {
         Console_log("Error: " . $result . "<br>" . mysqli_error($conn));
         return 0 ;
      }
        $data = [] ;
        while($info = mysqli_fetch_assoc($result))
        {
          //var_dump($info) ;
          // utiliser les guillements
          $data[$info["Id"]]= [ $info["Publication"],$info[ "Numero"], $info["Type"],$info["Article"]] ; 
        }
        return $data ;
    } 


    function RecuperationParType($Type)
    {
        $conn = connect() ;
        $sql = "SELECT * FROM avions  WHERE Type='".$Type."' ORDER BY Numero DESC" ;
        $result = mysqli_query($conn,$sql) ;
        if ($result) {
          Console_log("Recuperation Réussie");
       } 
       else {
         Console_log("Error: " . $result . "<br>" . mysqli_error($conn));
         return 0 ;
      }
        $data = [] ;
        while($info = mysqli_fetch_assoc($result))
        {
          //var_dump($info) ;
          // utiliser les guillements
          $data[$info["Id"]]= [ $info["Publication"],$info[ "Numero"], $info["Type"],$info["Article"]] ; 
        }
        return $data ;
    } 

    function RecuperationParTypeArticle($Type)
    {
        $conn = connect() ;
        $sql = "SELECT * FROM avions  WHERE Type='".$Type."' ORDER BY Article ASC" ;
        $result = mysqli_query($conn,$sql) ;
        if ($result) {
          Console_log("Recuperation Réussie");
       } 
       else {
         Console_log("Error: " . $result . "<br>" . mysqli_error($conn));
         return 0 ;
      }
        $data = [] ;
        while($info = mysqli_fetch_assoc($result))
        {
          //var_dump($info) ;
          // utiliser les guillements
          $data[$info["Id"]]= [ $info["Publication"],$info[ "Numero"], $info["Type"],$info["Article"]] ; 
        }
        return $data ;
    } 

    function RecuperationDesTypes()
    {
        $conn = connect() ;
        $sql = "SELECT DISTINCT Type FROM avions  ORDER BY Type ASC" ;
        $result = mysqli_query($conn,$sql) ;
        if ($result) {
          Console_log("Recuperation Réussie");
       } 
       else {
         Console_log("Error: " . $result . "<br>" . mysqli_error($conn));
         return 0 ;
      }
        $data = [] ;
        $Val = 0 ;
        while($info = mysqli_fetch_assoc($result))
        {
          //var_dump($info) ;
          // utiliser les guillements
          $data[$Val]= [ "","", $info["Type"],"" ] ; 
          $Val = $Val + 1 ;
        }
        return $data ;
    } 

    function Recherche($Id)
    {
      $conn=Connect() ;
      Console_log("Id:".$Id) ;
      $sql = mysqli_query($conn,"select * from avions where Id = $Id") ;
      if ($sql) {
        Console_log("Recherche Réussie");
     } 
     else {
       Console_log("Error: " . $sql . "<br>" . mysqli_error($conn));
       return 0 ;
    }
    $Data = [] ;
    if($info = mysqli_fetch_assoc($sql))
        {
          $Data = [ $info["Publication"],$info[ "Numero"], $info["Type"],$info["Article"]] ;
          Console_log($Data) ;
          return $Data ;
        }
    else    
      return 0  ;
    } 


   function RecuperationMonographie()
    {
        $conn = connect() ;
        $sql = "SELECT * FROM avions  WHERE Type='DataBase' OR Type='Spotlight' OR Type='SpecialEdition'OR Type='Profile' ORDER BY Article ASC" ;
        $result = mysqli_query($conn,$sql) ;
        if ($result) {
          Console_log("Recuperation Réussie");
       } 
       else {
         Console_log("Error: " . $result . "<br>" . mysqli_error($conn));
         return 0 ;
      }
        $data = [] ;
        while($info = mysqli_fetch_assoc($result))
        {
          //var_dump($info) ;
          // utiliser les guillements
          $data[$info["Id"]]= [ $info["Publication"],$info[ "Numero"], $info["Type"],$info["Article"]] ; 
        }
        return $data ;
    } 
    
    function RechercheLike($Id)
    {
      $conn=Connect() ;
      Console_log("Id:".$Id) ;
      $sql = mysqli_query($conn,"select * from avions where Article LIKE '". $Id."'") ;
      if ($sql) {
        Console_log("Recherche Réussie");
     } 
     else {
       Console_log("Error: " . $sql . "<br>" . mysqli_error($conn));
       return 0 ;
    }
    $data = [] ;
    while($info = mysqli_fetch_assoc($sql))
        {
          $data[$info["Id"]]= [ $info["Publication"],$info[ "Numero"], $info["Type"],$info["Article"]] ;         
        }
    return $data ;  
    } 
?>