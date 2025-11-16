<?php
// c_supprimerAeroport.php — version sécurisée

require_once dirname(__DIR__) . '/Models/m_aeroport.php';

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

        $model = new AeroportModel();
        $aeroport = $model->getAeroportById($id);

        if (!$aeroport) {
            die("Aucun aéroport trouvé.");
        }

        include dirname(__DIR__) . '/Views/v_deleteAeroport.php';
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

        $model = new AeroportModel();
        $ok = $model->deleteAeroport($id);

        if (!$ok) {
            echo "Erreur lors de la suppression.";
            exit;
        }

        header("Location: index.php?uc=voirAeroport&action=liste");
        exit;
    }

    default:
        echo "Action inconnue dans c_deleteAeroport.php.";
}
