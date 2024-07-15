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
        $DATA = "SELECT * FROM users WHERE Login = '".$Login."'"."AND Passwd ='".$Passwd."'" ;
        Console_log("Data:".$DATA) ;
        $result = mysqli_query($conn,$DATA) ;
        if ($result) {
          return mysqli_num_rows($result) ; 
       } 
       else {
        die("Select failed: " .  mysqli_error($conn));
      }
    }
       
    function Sauvegarde($Login, $Passwd,$Genre,$Fichier,$Admin )
    {
        $conn=Connect() ;        
                 
       // $sql = mysqli_query($conn,"INSERT INTO `users`(`Login`, `Passwd`, `Genre`, `Fichier`, `Admin`)
       // VALUES ('".$Login."','".$Passwd."','".$Genre."','".$Fichier."','".$Admin."')");
        $sql = "INSERT INTO `users`(`Login`, `Passwd`, `Genre`, `Fichier`, `Admin`) VALUES ( ?,?,?,?,?)" ;
        $requete = mysqli_prepare($conn,$sql) ;
        if ($requete)
           {
            Console_log("Preparation réussie");
          }
        else
           die("Error:".mysqli_error($conn));
        $ok = mysqli_stmt_bind_param($requete,'sssss',$Login,$Passwd,$Genre,$Fichier,$Admin) ; // 5S car cinq strings
        $ok = mysqli_stmt_execute($requete) ;
        if ($ok) {
            Console_log("New record created successfully");
          } else 
                die("Error: " .mysqli_stmt_error($requete)) ;
        Console_log("Passwd:".$Passwd) ;
        Console_log("Genre:".$Genre) ;
       // Console_log("Genre:".$Fichier) ;
        Console_log("Admin:".$Admin) ; 
        return 1 ;
    } 

?>