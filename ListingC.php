<?php
    /* 
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

require_once("modele.php") ;



if( isset($_POST['submit_OKL'] ))
   include("index.php") ;
else
{
    //Console_log("Listingc".$Publication) ;
    Console_log($data) ;
    include("ListingV.php") ;
} 

?>