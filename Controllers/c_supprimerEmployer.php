<?php

require_once dirname(__DIR__) . '/Models/m_employer.php';
require_once dirname(__DIR__) . '/Models/m_technicien.php';
require_once dirname(__DIR__) . '/Models/m_commercial.php';
require_once dirname(__DIR__) . '/Models/f_verifTypeEmployer.php';

$action = $_REQUEST['action'] ?? 'confirmer';

$modelEmployer = new ModelEmployer();

switch ($action) {

    // ------------------------------------------------
    // AFFICHAGE DE LA CONFIRMATION
    // ------------------------------------------------
    case 'supprimer': {

        if (!isset($_GET['id_Employer'])) {
            die("ID manquant dans l'URL.");
        }

        $id = (int) $_GET['id_Employer'];
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
    case 'confirmer': {

        if (!isset($_POST['id'])) {
            die("ID manquant.");
        }

        $id = (int) $_POST['id'];

        // Récupérer la connexion PDO (pas l'objet PdoMudry)
        $pdo = PdoMudry::getPdoMudry()->getConnexion();

        // Récupérer le type d'employé avant suppression
        $type = verifierTypeEmployer($pdo, $id);

        if ($type === "technicien") {
            $modelTech = new TechnicienModel();
            $modelTech->supprimerTechnicien($id);
        } elseif ($type === "commercial") {
            $modelCom = new CommercialModel();
            $modelCom->supprimerCommercial($id);
        }

        // Supprimer l'employé
        $ok = $modelEmployer->supprimerEmployer($id);

        if (!$ok) {
            die("Erreur lors de la suppression.");
        }

        header("Location: index.php?uc=voirEmployer&action=liste");
        exit;
    }

    default:
        echo "Action inconnue dans c_supprimerEmployer.php.";
}
