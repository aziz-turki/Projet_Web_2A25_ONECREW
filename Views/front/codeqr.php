<?php

include('../phpqrcode/qrlib.php');
require_once '../controller/formationC.php';
require_once '../controller/commandeC.php';

$commandeC = new commandeC();
$articleC = new formationC();
$article = $commandeC->CgetformationbyID($commande['ID_OFFRE']);

    $param = $_GET['prix']; // remember to sanitize that - it is user input!
    
    // we need to be sure ours script does not output anything!!!
    // otherwise it will break up PNG binary!
    
    ob_start("callback");
    
    // here DB request or some processing
    $codeText = 'le prix est '.$param.'';
    
    // end of processing here
    $debugLog = ob_get_contents();
    ob_end_clean();
    
    // outputs image directly into browser, as PNG stream
    QRcode::png($codeText);
 

