<?php
// initialisation du panier
// initPanier();
// $action : variable d'aiguillage
$action = $_REQUEST['action'];
switch($action)
{
	case 'voirEmployer' :
	{
		$lesEmployers = $pdo->getLesEmployers();
		include("vues/v_voirEmployers.php");
  		$employer = $_REQUEST['employer'];
		$lesEmployers = $pdo->getLesEmployers($categorie);
		include("vues/v_voirEmployer.php");
		break;
	}
	case 'ajouterEmployer' :
	{
		$idEmployer=$_REQUEST['employer'];
		$ok = ajouterEmployer($idEmployer);
		if(!$ok)
		{
			$message = "Cet employer est déjà dans l'entreprise !!";
			include("vues/v_message.php");
		}
        else
        {
            $message = "L'employer a bien été ajouté à l'entreprise.";
            include("vues/v_message.php");
        }
		break;
	}
}
?>