<?php

$action = isset($_REQUEST['action']) ? $_REQUEST['action'] : 'liste';

switch ($action) {

    case 'liste': {
        $model = new ModeleModel();
        $lesModeles = $model->getAllModeles();

        // DEBUG (tu peux activer si ça ne marche toujours pas)
        // var_dump($aeroports); die();

        include dirname(__DIR__) . '/Views/v_modele.php';
        break;
    }

    default: {
        echo "Action inconnue dans c_voirModele.php";
        break;
    }
}
