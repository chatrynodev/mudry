<?php
$action = $_REQUEST['action'];

switch($action)
{
    case 'voirEmployer' :
    {
        $n = nbEmployer();
        if ($n > 0)
        {
            $desIdEmployer = getLesIdEmployer();
            $lesEmployers = $pdo->getLesEmployersFromTableau($desIdEmployer);

            include("vues/v_voirEmployer.php");
        }
        else
        {
            $message = "Il n'y a pas d'employer chez Mudry !!";
            include ("vues/v_message.php");
        }
        break;
    }

    case 'supprimerEmployer':
    {
        $id = $_REQUEST['employer'];

        retirerEmployer($id);

        $message = "L'employé a été supprimé.";
        include("vues/v_message.php");

        $n = nbEmployer();

        if($n > 0){
            $desIdEmployer = getLesIdEmployer();
            $lesEmployers = $pdo->getLesEmployersFromTableau($desIdEmployer);
            include("vues/v_voirEmployer.php");
        } else {
            $message = "Plus aucun employé dans la liste.";
            include("vues/v_message.php");
        }

        break;
    }
}
?>
