<?php
    /* 
    Le contrôleur contient la logique métier de votre code.
    */
if ( !isset($_SESSION) )
     session_start() ;
require_once("console_log.php") ; 
require_once("modele.php") ;

$classLogin  = "normal" ;
$classPasswd = "normal" ;
$classGenre  = "normal" ;
$classAdmin  = "normal" ;
$Message = "Veuillez editer svp !!!" ;

Console_log("ProfileController") ;
if( isset($_POST['submit_Logout'] ))
{

    session_destroy() ;
    Console_log("From profileV") ;
    include("LoginC.php") ;
}
else
if( isset($_POST['submit_ProfileOK'] ) )
{
        Console_log("ProfileOk") ;
        $Choice = $_POST['submit_ProfileOK'] ;
        /*
            !empty ( $_POST['Login']) && 
            !empty ( $_POST['Admin'])
        */
        if (!empty ( $_POST['Login'])) 
           $Login =  $_POST['Login'] ;
        else 
           $classLogin = "error" ;
         if ( !empty ( $_POST['Passwd']))
            $Passwd =  $_POST['Passwd'] ;
         else
            $classPasswd = "error" ;
        if (!empty ( $_POST['Genre']))
            $Genre  =  $_POST['Genre'] ;
        else
           $classGenre = "error" ;
        if (isset ( $_POST['Admin']))
           $Admin =  $_POST['Admin'] ;
        else
           $classAdmin  = "error" ;
            
        Console_log("OK Login:".$Login) ;
        Console_log("OK Passwd:".$Passwd) ;
        Console_log("OK Genre:".$Genre) ;
        Console_log("OK Admin:".$Admin) ;

        $FileLoaded = FALSE ; 
        if(isset($_FILES["photo"]) && $_FILES["photo"]["error"] == 0){
            Console_log("Upload") ;
            $allowed = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "gif" => "image/gif", "png" => "image/png");
            $filename = $_FILES["photo"]["name"];
            $filetype = $_FILES["photo"]["type"];
            $filesize = $_FILES["photo"]["size"];
            Console_log("Filename". $filename) ;
            // Vérifie l'extension du fichier
            $ext = pathinfo($filename, PATHINFO_EXTENSION);
            if(!array_key_exists($ext, $allowed)) die("Erreur : Veuillez sélectionner un format de fichier valide.");
    
            // Vérifie la taille du fichier - 5Mo maximum
            $maxsize = 5 * 1024 * 1024;
            if($filesize > $maxsize) die("Error: La taille du fichier est supérieure à la limite autorisée.");
    
            // Vérifie le type MIME du fichier
            // Attention a bien créer un dossier upload 
            if(in_array($filetype, $allowed)){
                // Vérifie si le fichier existe avant de le télécharger.
                if(file_exists("upload/" . $_FILES["photo"]["name"])){
                    $Message=  $_FILES["photo"]["name"] . " existe déjà.";
                } else{
                    move_uploaded_file($_FILES["photo"]["tmp_name"], "upload/" . $_FILES["photo"]["name"]);
                  //  echo "Votre fichier a été téléchargé avec succès.";
                    
                } 
                $Base64img = base64_encode(file_get_contents("upload/" . $_FILES["photo"]["name"])) ;
                    if (!$Base64img)
                        $Message = "Echec chargement fichier" ;
                    else
                       {
                        $Message =  "Réussite chargement fichier" ;
                        $FileLoaded = TRUE ;
                       } 
            } else{
                 $Message =  "Error: Il y a eu un problème de téléchargement de votre fichier. Veuillez réessayer."; 
            }
        } 
        else // on reprend l'image précédente 
           $Base64img = $_SESSION['Image'] ;

        if ( isset($Base64img) && isset($Login) && isset($Passwd) && isset($Genre) )
           {
                if ( Remplace($Login, $Passwd, $Genre, $Base64img,$Admin ) )
                $Message = "Sauvegarde Réussie" ; 
                else 
                {
                    $Message = "Erreur de Sauvegarde" ; 
                }
            }
        
           
        include("profileV.php") ;  
}        
else
   if( isset($_POST['submit_List'] ))
        {
            $Login = $_SESSION['login'] ;
            $data  = Recuperation() ;
            $Ligne = $data[$Login] ;
            $Admin = $Ligne[3] ;
            Console_log($data) ;
            # include("ListingC.php") ;
            include("ListingAdminC.php") ;
        } 
    else
    if (isset($_GET['Login']))
    {
        Console_log("FromListing") ;
        $Login = $_GET['Login'] ;
        $Data = Recuperation() ;
        $Ligne = $Data[$Login] ;
        $Passwd = $Ligne[0] ;
        $Genre = $Ligne[1] ;
        $Base64img = $Ligne[2] ;
        $Admin = $Ligne[3] ;
        $_SESSION['Image'] =  $Base64img ;
    
        Console_log("Login") ;
        Console_log("Login:".$Login) ;
        Console_log("Passwd:".$Passwd) ;
        Console_log("Genre:".$Genre) ;
        Console_log("Image:".$Base64img) ;
        Console_log("Admin:".$Admin) ;
        include("profileV.php") ; 
    }
    else
    if ( isset($_SESSION['login']) )
    {
        Console_log("FromLogin") ;
        $Login = $_SESSION['login'] ;
        Console_log("login:".$Login) ;
        $Data = Recuperation() ;
        $Ligne = $Data[$Login] ;
        $Passwd = $Ligne[0] ;
        $Genre = $Ligne[1] ;
        $Base64img = $Ligne[2] ;
        $Admin = $Ligne[3] ;
        $_SESSION['Image'] =  $Base64img ;
      //  $Base64img = base64_encode(file_get_contents("P.jpg"));
    
        Console_log("Login réussi") ;
        Console_log("Login:".$Login) ;
        Console_log("Passwd:".$Passwd) ;
        Console_log("Genre:".$Genre) ;
        Console_log("Image:".$Base64img) ;
        Console_log("Admin:".$Admin) ;
        
        include("profileV.php") ; 
    }
    else
       include("profileV.php") ;    
?>