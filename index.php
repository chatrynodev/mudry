<?php
include("includes/model.inc.php");

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
    case 'voirAvion': {
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
    case 'supprimerAvion': {
        include("Controllers/c_suppressionAvion.php");
        break;
    }
    case 'voirModele': {
        include("Controllers/c_voirModele.php");
        break;
    }
    case 'creerModele': {
        include("Controllers/c_creationModele.php");
        break;
    }
    case 'modifierModele': {
        include("Controllers/c_modifierModele.php");
        break;
    }
    case 'supprimerModele': {
        include("Controllers/c_suppressionModele.php");
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
    case 'deleteAeroport': {
        include("Controllers/c_deleteAeroport.php");
        break;
    }
    case 'voirAeroport': {
        include "Controllers/c_voirAeroport.php";
        break;
    }
    case 'voirMouvement' : {
        include("Controllers/c_voirMouvement.php");
        break;
    }
    case 'addMouvement' : {
        include("Controllers/c_addMouvement.php");
        break;
    }
    case 'updateMouvement' : {
        include("Controllers/c_updateMouvement.php");
        break;
    }
    case 'deleteMouvement' : {
        include("Controllers/c_deleteMouvement.php");
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
    	case 'gererEquipage' : { 
        include("Controllers/c_gestionEquipage.php");
        break; 
    }
}