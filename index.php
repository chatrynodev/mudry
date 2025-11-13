<?php
require_once("Models/class.pdoMudry.inc.php");

if(!isset($_REQUEST['uc'])) 
    $uc = 'accueil';
else 
    $uc = $_REQUEST['uc'];


$pdo = PdoMudry::getPdoMudry();
switch($uc) 
{
    case 'accueil': {
        include("Controllers/c_voirAvions.php");
        break;
    }
    case 'creerAvion': {
        include("Controllers/c_creationAvion.php");
        break;
    }
    case 'modifierAvion': {
        include("Controllers/c_modifierAvion.php");
        break;
    }

    case 'creerAeroport': {
        include("Controllers/c_creationAeroport.php");
        break;
    }
    case 'modifierAeroport': {
        include("Controllers/c_modifierAeroport.php");
        break;
    }
    case 'supprimerAeroport': {
        include("Controllers/c_suppressionAeroport.php");
        break;
    }
}