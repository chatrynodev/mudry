<?php
require_once("Models/class.pdoMudry.inc.php");
require_once("Models/m_aeroport.php");

if(!isset($_REQUEST['uc'])) 
    $uc = 'accueil';
else 
    $uc = $_REQUEST['uc'];


$pdo = PdoMudry::getPdoMudry();
switch($uc) 
{
    case 'accueil': {
        include("Views/v_Accueil.php");
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
    case 'cAeroport': {
        include("Views/v_creerAeroport.php");
        break;
    }
    case 'creerAeroport': {
        include("Controllers/c_creerAeroport.php");
        break;
    }
    case 'modifierAeroport': {
        include("Controllers/c_updateAeroport.php");
        break;
    }
    case 'supprimerAeroport': {
        include("Controllers/c_deleteAeroport.php");
        break;
    }
    case 'voirAeroport': {
        include "Controllers/c_voirAeroport.php";
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