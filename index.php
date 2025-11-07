<?php
// création d'une session
session_start();
/* inclusion en une seule fois du fichier des fonctions et du modèle
require_once("models/fonctions.inc.php");*/
require_once("Models/class.pdoMudry.inc.php");
// inclusion des vues
include("Views/v_header.php") ;
//include("Views/v_bandeau.php") ;

if(!isset($_REQUEST['uc']))
     $uc = 'accueil';
else
	$uc = $_REQUEST['uc'];

$pdo = PdoJardiPlants::getPdoMudry();	 
switch($uc)
{
	case 'accueil':
		{include("Views/v_accueil.php");break;}
	case 'voirEmployer' :
		{include("Controllers/c_voirEmployer.php");break;}
	case 'gererEmployer' :
		{ include("Controllers/c_gestionEmployer.php");break; }
}
include("Views/v_footer.php") ;
?>