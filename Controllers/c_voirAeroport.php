<?php
// contrôleur : c_voirAeroport.php

require_once dirname(__DIR__) . '/Models/m_aeroport.php';

$action = isset($_REQUEST['action']) ? $_REQUEST['action'] : 'liste';

switch ($action) {

    case 'liste': {
        $model = new AeroportModel();
        $aeroports = $model->getAllAeroports();

        // DEBUG (tu peux activer si ça ne marche toujours pas)
        // var_dump($aeroports); die();

        include dirname(__DIR__) . '/Views/v_Aeroport.php';
        break;
    }

    default: {
        echo "Action inconnue dans c_voirAeroport.php";
        break;
    }
}
