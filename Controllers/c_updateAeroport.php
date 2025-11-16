<?php
// c_modifierAeroport.php sécurisé

require_once dirname(__DIR__) . '/Models/m_aeroport.php';

$action = isset($_REQUEST['action']) ? $_REQUEST['action'] : 'modifier';

switch ($action) {

    case 'modifier': {

        if (!isset($_GET['id'])) {
            die("ID manquant.");
        }

        $id = (int) $_GET['id'];

        $model = new AeroportModel();
        $aeroport = $model->getAeroportById($id);

        if (!$aeroport) {
            die("Aucun aéroport trouvé.");
        }

        include dirname(__DIR__) . '/Views/v_updateAeroport.php';
        break;
    }

    case 'confirmerModification': {

        $id = isset($_POST['id']) ? (int)$_POST['id'] : 0;

        $nom  = trim($_POST['nom']);
        $latitude  = trim($_POST['latitude']);
        $longitude = trim($_POST['longitude']);
        $codeCommercial = trim($_POST['codeCommercial']);

        $erreurs = [];

        if ($nom === '') $erreurs[] = "Le nom est obligatoire.";
        if ($latitude === '' || !is_numeric($latitude)) $erreurs[] = "Latitude invalide.";
        if ($longitude === '' || !is_numeric($longitude)) $erreurs[] = "Longitude invalide.";
        if ($codeCommercial === '') $erreurs[] = "Code commercial obligatoire.";

        $model = new AeroportModel();

        if (!empty($erreurs)) {

            $aeroport = $model->getAeroportById($id);

            include dirname(__DIR__) . '/Views/erreurs/v_erreurs.php';
            include dirname(__DIR__) . '/Views/v_updateAeroport.php';

        } else {

            $ok = $model->updateAeroport($id, $nom, $latitude, $longitude, $codeCommercial);

            if (!$ok) {

                $erreurs[] = "Erreur lors de la modification.";
                $aeroport = $model->getAeroportById($id);

                include dirname(__DIR__) . '/Views/erreurs/v_erreurs.php';
                include dirname(__DIR__) . '/Views/v_updateAeroport.php';

            } else {

                header("Location: index.php?uc=voirAeroport&action=liste");
                exit;
            }
        }

        break;
    }

    default:
        echo "Action inconnue dans c_updateAeroport.php";
}
