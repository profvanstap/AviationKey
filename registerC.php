<?php
    /* 
    Le contrôleur contient la logique métier de votre code.
    */
 
require_once("console_log.php") ; 
require_once("Modele.php") ;

$classId      = "normal" ;
$classPublication = "normal" ;
$classNumero = "normal" ;
$classType  = "normal" ;
$classArticle  = "normal" ;
# Appel à la fonction enregistre

if( isset($_POST['submit_OK'] ))
{
      $Choice = $_POST['submit_OK'] ;
      $Message = "Champ à corriger" ; 
     
    if (empty ( $_POST['Publication']))
    {
        $Publication = "" ;
        $classPublication = "error" ;
    }
    else
       $Publication =  $_POST['Publication'] ;
    if (empty ( $_POST['Numero']))
    {
       $Numero = "" ;  
       $classNumero = "error" ;
    }
    else
      $Numero =  $_POST['Numero'] ;

    if (empty ( $_POST['Type']))
    { 
       $Type = "" ;
       $classType = "error" ;
    }  
    else
       $Type =  $_POST['Type'] ;
    if (empty ( $_POST['Article']))
    {
          $Article = "" ;
          $classArticle = "error" ;
    }
    else
        $Article  =  $_POST['Article'] ;  
    
     if (!empty ( $_POST['Publication']) && !empty ( $_POST['Numero']) &&  !empty ( $_POST['Type'])&& !empty ( $_POST['Article']))
         {
            Console_log("Publication:".$Publication) ;
            Console_log("Type:".$Type) ;
            Console_log("Article:".$Article) ;
            /*
            $File = base64_encode(file_get_contents("P.jpg")); On charge une image par défaut
            */
            // Console_log("File:".$File) ;
             if(!empty ( $_POST['Id']))
               {
                $Id = $_POST['Id'] ;
                Remplace($Id, $Publication,$Numero,$Type,$Article ) ;
                $Message = "Remplacement réussi de ".$Id ;
                $Id="" ;
                $Article = "" ;      
                /* $Publication = "" ; pour pouvoir faire une liste après */
                $Numero = "" ;
                $Type  = "" ; 
               }
             else  
             if ( Sauvegarde( $Publication,$Numero, $Type,$Article) )
             {
                $Message = "Sauvegarde de". $Article."réussie " ;
                $Id="" ;
                $Article = "" ;      
                /* $Publication = "" ;pour pouvoir faire une liste après */
                $Numero = "" ;
                $Type  = "" ; 
             }
             else
                $Message = "Echec Sauvegarde" ; 
         }
    
    Console_log("classPublication:".$classPublication) ;
    Console_log("classType:".$classType) ;
    Console_log("classArticle:".$classArticle) ;
    include("registerV.php") ;            
}
else
if (isset($_GET['Id'] ))
{ 
   $Id = $_GET['Id'] ;
   $Data = Recherche($Id) ;
   if ($Data!=0)
      {
       $Message = "Edition réussie" ;
       $Publication = $Data[0] ;
       $Numero      = $Data[1] ;
       $Type        = $Data[2] ; 
       $Article     = $Data[3] ;
      }
    else
      {
       $Message = "Echec Edition" ;
       $classId = "error" ;
      }  
   include("registerV.php") ;     
}
else
if (isset($_POST['submit_EDIT'] ))
{ 
   if(!empty ( $_POST['Id']))
   {
    $Id = $_POST['Id'] ;
    $Data = Recherche($Id) ;
    if ($Data!=0)
      {
       $Message = "Edition réussie" ;
       $Publication = $Data[0] ;
       $Numero      = $Data[1] ;
       $Type        = $Data[2] ; 
       $Article     = $Data[3] ;
      }
    else
      {
       $Message = "Echec Edition" ;
       $classId = "error" ;
      }  
   }
   else  
    {
      $classId = "error" ;
      $Message = "Impossible d'editer sans ID" ;
      $Id= "" ;
      $Article = "" ;      
      $Publication = "" ;
      $Numero = "" ;
       $Type  = "" ; 
    }
 include("registerV.php") ;     
}
else
if (isset($_POST['submit_DELETE'] ))
 { 
   $Id = $_POST['Id'] ;
   if (empty ( $Id ))
      {
         $Message = "Echec Suppression car Id vide " ; 
         $classId = "error" ;
      }         
   else   
   if (Supprime($Id))
            {    
               $Message = "Suppression réussie " ; 
               $Id  = "" ;            
            }
     else
        {
         $Id  =  $_POST['Id'] ;
         $classId = "error" ;
         $Message = "Echec Suppression Mauvais Id" ; 
        }  

   $Article = "" ;      
   $Publication = "" ;
   $Numero = "" ;
   $Type  = "" ;  
   include("registerV.php") ;  
 }
else
 if (isset($_POST['submit_Back'] ))
 {
   /*
    # On copie l'url du navigateur 
    header("Location:http://myprojects/exercice-10-mvc-profvanstap/") ;
    exit() ;
   */
 }
 else
 if( isset($_POST['submitListPublication'] )) 
 {
    
    if (!empty($_POST['Publication'])) 
         $Publication =  $_POST['Publication'] ;
    else
         $Publication = "Aeroplane";
    Console_log($Publication) ;
    $data=RecuperationParPublication($Publication) ;
    include("ListingC.php") ;
 } 
 else
 if( isset($_POST['submitListPublicationASC'] )) 
 {
    
    if (!empty($_POST['Publication'])) 
         $Publication =  $_POST['Publication'] ;
    else
         $Publication = "Aeroplane";
    Console_log($Publication) ;
    $data=RecuperationParPublicationASC($Publication) ;
    include("ListingC.php") ;
 } 
else
if( isset($_POST['submitNumero'] )) 
 {
    
    if (!empty($_POST['Publication'])) 
         $Publication =  $_POST['Publication'] ;
    else
         $Publication = "Aeroplane"; // Valeur par défaut
   if (!empty($_POST['Numero'])) 
         $Numero =  $_POST['Numero'] ;
    else
         $Numero = 0 ; // Valeur par défaut
    Console_log($Publication) ;
    $data=RecuperationParNumero($Publication,$Numero) ;
    include("ListingC.php") ;
 }
else
if( isset($_POST['submitListType'] )) 
{
   
   if (!empty($_POST['Type'])) 
        $Type =  $_POST['Type'] ;
   else
        $Type = "Spotlight";
   Console_log($Type) ;
   $data=RecuperationParType($Type) ;
   include("ListingC.php") ;
} 
else
if( isset($_POST['submitListTypeArticle'] )) 
{
   
   if (!empty($_POST['Type'])) 
        $Type =  $_POST['Type'] ;
   else
        $Type = "Spotlight";
   Console_log($Type) ;
   $data=RecuperationParTypeArticle($Type) ;
   include("ListingC.php") ;
} 
else
if( isset($_POST['submitTypes'] )) 
{
   Console_log("List <> Types") ;
   $data=RecuperationDesTypes() ;
   include("ListingC.php") ;
} 
else
if( isset($_POST['submitMonos'] )) 
{
   Console_log("List <> Mono") ;
   $data=RecuperationMonographie() ;
   include("ListingC.php") ;
}
else if( isset($_POST['submitLike'] )) 
{
   
   if (!empty($_POST['Article'])) 
        $Article =  $_POST['Article'] ;
   else
        $Article = "%";
   Console_log("Like:".$Article) ;
   $data=RechercheLike($Article) ;
   include("ListingC.php") ;
} 
else  
   {
    $Message = "Veuillez encoder svp" ;
    Console_log("Par défaut") ; 
    Console_log("classArticle:".$classArticle) ;
    Console_log("classPublication:".$classPublication) ;
    Console_log("classType:".$classType) ;
    
    $Id = "" ;
    if(!isset($Publication))
       $Publication = "" ; 
    $Numero = "" ;
    $Type  = "" ;
    $Article  = "" ;
    include("registerV.php") ;
   }
?>

