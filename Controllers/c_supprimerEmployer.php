<?php
// c_supprimerEmployer.php — version sécurisée

require_once dirname(__DIR__) . '/Models/m_employer.php';
require_once dirname(__DIR__) . '/Models/m_technicien.php';
require_once dirname(__DIR__) . '/Models/m_commercial.php';

$action = isset($_REQUEST['action']) ? $_REQUEST['action'] : 'confirmer';

switch ($action) {

    // ------------------------------------------------
    // AFFICHER LA PAGE DE CONFIRMATION
    // ------------------------------------------------
    case 'confirmer': {

        if (!isset($_GET['id'])) {
            die("ID manquant pour la suppression.");
        }

        $id = (int) $_GET['id'];

        $modelEmployer = new ModelEmployer();
        $employer = $modelEmployer->getEmployerById($id);

        if (!$employer) {
            die("Aucun employer trouvé.");
        }

        include dirname(__DIR__) . '/Views/v_supprimerEmployer.php';
        break;
    }

    // ------------------------------------------------
    // SUPPRESSION EFFECTIVE
    // ------------------------------------------------
    case 'supprimer': {

        if (!isset($_POST['id'])) {
            die("ID manquant.");
        }

        $id = (int) $_POST['id'];

        $modelEmployer = new ModelEmployer();
        $ok = $modelEmployer->supprimerEmployer($id);

        if (!$ok) {
            echo "Erreur lors de la suppression.";
            exit;
        }

        header("Location: index.php?uc=voirEmployer&action=liste");
        exit;
    }

    default:
        echo "Action inconnue dans c_supprimerEmployer.php.";
}
