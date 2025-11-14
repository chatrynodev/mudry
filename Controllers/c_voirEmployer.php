<?php
$action = $_REQUEST['action'];

switch($action)
{

    case 'voirEmployer' :    // voir 1 employé
    {
        $idEmployer = $_REQUEST['employer'];

        // Récupération des infos d’un seul employé
        $unEmployer = $pdo->getEmployer($idEmployer);

        include("vues/v_voirEmployer.php");
        break;
    }

    case 'ajouterEmployer' :
    {
        $idEmployer = $_REQUEST['employer'];

        $ok = ajouterEmployer($idEmployer);

        if(!$ok)
        {
            $message = "Cet employé est déjà présent.";
        }
        else
        {
            $message = "L'employé a bien été ajouté.";
        }
        include("vues/v_message.php");
        break;
    }
}
?>
