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
     $dbname = "users";

    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    // Check connection
    if ($conn) 
        Console_log("Connexion réussie") ; 
     else
        die("Connection failed: " . mysqli_connect_error());      
    return $conn;
    }

    
    function Existe($Login, $Passwd )
    {
        $conn=Connect() ;
        Console_log("Login:".$Login) ;
        Console_log("Passwd:".$Passwd) ;
        $DATA = "SELECT * FROM users WHERE Login = '".$Login."'" ;
        Console_log("Data:".$DATA) ;
        $result = mysqli_query($conn,$DATA) ;
        if ($result) {
        //$sql = $conn->prepare('SELECT * FROM users WHERE Login = ?');
        //$sql->bind_param('s', $Login); // s = string, i = integer
        //if ( $sql->execute() === TRUE ) { 
          Console_log("Recherche Réussie");
          return mysqli_num_rows($result) ; 
       } 
       else {
        die("Select failed: " . $conn->error);
      }
    }
   
   
    function Sauvegarde($Login, $Passwd,$Genre,$Fichier,$Admin )
    {
        $conn=Connect() ;
        /* if (file_exists($filename)) {
            $current = file_get_contents($filename);
            $data = unserialize($current) ;
            foreach( $data as $Login2 => $Passwd2 )
                if ($Login2 == $Login )
                  {
                   Console_log("Match !!!".$Login) ;
                   return 0 ; 
                  }
        */             
                 
        $sql = mysqli_query($conn,"INSERT INTO `users`(`Login`, `Passwd`, `Genre`, `Fichier`, `Admin`)
        VALUES ('".$Login."','".$Passwd."','".$Genre."','".$Fichier."','".$Admin."')");
        
        if ($sql) {
            Console_log("New record created successfully");
          } else {
            Console_log("Error: " . $sql . "<br>" . $conn->error);
            return 0 ;
          }
        Console_log("Passwd:".$Passwd) ;
        Console_log("Genre:".$Genre) ;
       // Console_log("Genre:".$Fichier) ;
        Console_log("Admin:".$Admin) ; 
        //Console_log(var_dump($data)) ; // A commenter éventuellement
        return 1 ;
    } 

    function Remplace($Login, $Passwd,$Genre,$Fichier,$Admin )
    {
        
        $conn=Connect() ;
        $sql = mysqli_query($conn,"UPDATE users
SET Passwd = '".$Passwd."', Genre = '".$Genre."',Fichier = '".$Fichier."',Admin='".$Admin."' 
WHERE Login = '".$Login."'") ;
         if ($sql) {
            Console_log("New record created successfully");
         } else {
           Console_log("Error: " . $sql . "<br>" . $conn->error);
           return 0 ;
        }
        Console_log("Passwd:".$Passwd) ;
        Console_log("Genre:".$Genre) ;
        Console_log("Genre:".$Fichier) ;
        Console_log("Admin:".$Admin) ; 
        Console_log(var_dump($data)) ;
        return 1 ;
    } 
    


    function Recuperation()
    {
        $conn = connect() ;
        $result = mysqli_query($conn,"SELECT * FROM users ORDER BY Login") ;
        if ($result) {
          Console_log("Recuperation Réussie");
       } 
       else {
         Console_log("Error: " . $result . "<br>" . $conn->error);
         return 0 ;
      }
        $data = [] ;
        while($info = mysqli_fetch_assoc($result))
        {
          var_dump($info) ;
          // utiliser les guillements
          $data[$info["Login"]]= [ $info["Passwd"],$info[ "Genre"], $info["Fichier"], $info["Admin"]  ] ; 
        }
        return $data ;
    } 

    function Recherche($Login)
    {
      $conn=Connect() ;
      Console_log("Login:".$Login) ;
      Console_log("Passwd:".$Passwd) ;
      $sql = mysqli_query($conn,"select * from users where Login = $Login") ;
      if ($sql) {
        Console_log("Recherche Réussie");
     } 
     else {
       Console_log("Error: " . $sql . "<br>" . $conn->error);
       return 0 ;
    }
    $data = [] ;
        while($info = mysqli_fetch_assoc($sql))
        {
          $data= [ $info["Passwd"],$info[ "Genre"], $info["Fichier"], $info["Admin"]  ] ; 
        }
        return $data ;
    } 
?>