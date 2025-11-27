<?php
session_start();

// Vérification si je suis connecté ou non
if (!empty($_SESSION['isConnected'])) {
    $isConnected = true;
} else {
    $isConnected = false;
}

require_once(__DIR__ . "/Models/class.pdoMudry.inc.php");

if(!isset($_REQUEST['uc'])) 
    $uc = 'accueil';
else 
    $uc = $_REQUEST['uc'];

//redirection si non connecté
if ($isConnected === false) {
    $uc = 'connexion';
}

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
    case 'ajouterEmployer' : {
        include("Controllers/c_ajouterEmployer.php");
        break;
    }
    case 'supprimerEmployer' : {
        include("Controllers/c_supprimerEmployer.php");
        break;
    }
    case 'modifierEmployer' : {
        include("Controllers/c_modifierEmployer.php");
        break;
    }
    case 'connexion': {
        include("connexion.php");
        break;
    }
    case 'deconnexion': {
        include("deconnexion.php");
        break;
    }
}