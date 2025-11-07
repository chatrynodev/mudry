<?php
// $action : variable d'aiguillage
$action = $_REQUEST['action'];
switch($action)
{
	case 'voirEmployer' :
	{
		$n= nbEmployer();
		if($n >0)
		{
			$desIdEmployer = getLesIdEmployer();
			$lesEmployer = $pdo->getLesIdEmployer($desIdEmployer);
			include("vues/v_voirEmployer.php");
		}
		else
		{
			$message = "Il n'y a pas d'employer chez Mudry !!";
			include ("vues/v_message.php");
		}
		break;
	}

	/*case 'supprimerUnProduit':
	{
		// récupérer l'id du produit à supprimer
		$idProduit = $_REQUEST['produit'];
		// retirer du panier (fonction dans util/fonctions.inc.php)
		retirerDuPanier($idProduit);

		// message de confirmation de suppression
		$message = "Le produit a bien été supprimé du panier.";
		include("vues/v_message.php");

		// si le panier contient encore des produits, recharger la vue du panier
		$n = nbProduitsDuPanier();
		if($n > 0)
		{
			$desIdProduit = getLesIdProduitsDuPanier();
			$lesProduitsDuPanier = $pdo->getLesProduitsDuTableau($desIdProduit);
			include("vues/v_panier.php");
		}
		else
		{
			$message = "Panier vide !!";
			include ("vues/v_message.php");
		}
		break;
	}
	case 'passerCommande' :
	    $n= nbProduitsDuPanier();
		if($n>0)
		{
			$nom ='';$rue='';$ville ='';$cp='';$mail='';
			include ("vues/v_commande.php");
		}
		else
		{
			$message = "Panier vide !!";
			include ("vues/v_message.php");
		}
		break;
	case 'confirmerCommande'	:
	{
		$nom = $_REQUEST['nom'];
		$rue = $_REQUEST['rue']; 
		$ville = $_REQUEST['ville'];
		$cp = $_REQUEST['cp'];
		$mail = $_REQUEST['mail'];
		
		// Vérification des données avec la fonction existante
		$lesErreurs = getErreursSaisieCommande($nom, $rue, $ville, $cp, $mail);
		
		if (count($lesErreurs) > 0) {
			// Il y a des erreurs, on réaffiche le formulaire avec les erreurs
			include("vues/v_erreurs.php");
			include("vues/v_commande.php");
		}
		else {
			// Les données sont valides
			
			// Récupération des produits du panier
			$lesIdProduit = getLesIdProduitsDuPanier();
			
			// Création de la commande dans la base
			$pdo->creerCommande($nom, $rue, $cp, $ville, $mail, $lesIdProduit);
			
			// Suppression du panier
			supprimerPanier();
			
			// Message de confirmation
			$message = "Commande enregistrée";
			include("vues/v_message.php");
		}
		break;
	}*/
}


?>


