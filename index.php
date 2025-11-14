<?php
require_once(__DIR__ . "/Models/class.pdoMudry.inc.php");

if(!isset($_REQUEST['uc'])) 
    $uc = 'accueil';
else 
    $uc = $_REQUEST['uc'];

$pdo = PdoMudry::getPdoMudry();
switch($uc) 
{
    case 'accueil': {
        include("Views/v_accueil.php");
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
    case 'supprimerAvion': {
        include("Controllers/c_suppressionAvion.php");
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
    case 'voirEmployer' : {
        include("Controllers/c_voirEmployer.php");
        break;
    }
    case 'gererEmployer' : { 
        include("Controllers/c_gestionEmployer.php");
        break; 
    }
}