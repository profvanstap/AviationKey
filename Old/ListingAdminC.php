<?php

    /* 
    session_start() ;
    Le contrôleur Listing contient la logique métier de votre code.
    */
    /*
    function console_log($output, $with_script_tags = true) {
    $js_code = 'console.log(' . json_encode($output, JSON_HEX_TAG) . 
    ');';
        if ($with_script_tags) {
            $js_code = '<script>' . $js_code . '</script>';
        }
        echo $js_code;
    }*/

require_once("console_log.php") ;   
require_once("modele.php") ;

Console_log("ListingAdminC.php") ;
$classLogin = "normal" ;
$classPasswd  = "normal" ;


if( isset($_POST['submit_OKL'] ))
   include("ProfileC.php") ;
else
{
    $data=Recuperation() ;
    Console_log($data) ;
    include("ListingAdminV.php") ;
} 

?>