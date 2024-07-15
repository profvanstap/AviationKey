<?php
    /* 
    Le contrôleur contient la logique métier de votre code.
    */
if ( !isset($_SESSION) )
      session_start() ;  
    
require_once("console_log.php") ;
require_once("modele.php") ;

$classLogin = "normal" ;
$classPasswd  = "normal" ;
$Message = "Veuillez vous connecter svp" ;

if( isset($_POST['submit_Login'] ))
{
      $Choice = $_POST['submit_Login'] ;
      if (!empty ( $_POST['Login']) && !empty ( $_POST['Passwd']))
         {
            $Login = $_POST['Login'] ;
            $Passwd =  $_POST['Passwd'] ;
            Console_log("Login:".$Login) ;
            Console_log("Passwd:".$Passwd) ;
            $Code = Existe($Login, $Passwd ) ;
            if (  $Code == 0 )
               {
                 $Message = "Login ou Passwd invalide" ;
                 $classLogin = "error" ;
                 $classPasswd  = "error" ;
                 include("loginV.php") ;
               }
            else 
               { # on a réuni les condtions 
                $_SESSION['login']=$Login ;
                include("profileC.php") ;
               }        
         }
      else  
         {
          $Message = "Message ou Passwd Vide" ;
          if (empty ( $_POST['Login']))
              $classLogin = "error" ;
          if (empty ( $_POST['Passwd']))
              $classPasswd = "error" ;
          include("LoginV.php") ; 
         }    
         
}
else
    if( isset($_POST['submit_Register'] ))
   {
    include("RegisterC.php") ;
   } 
   else  
      {
      Console_log("classLogin:".$classLogin) ;
      Console_log("classPasswd:".$classPasswd) ;
      include("LoginV.php") ;
      }
?>