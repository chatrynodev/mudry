<?php
// contrôleur : c_voirAeroport.php

require_once dirname(__DIR__) . '/Models/m_mouvement.php';

$action = isset($_REQUEST['action']) ? $_REQUEST['action'] : 'liste';

switch ($action) {

    case 'liste': {
        $model = new MouvementModel();
        $lesMouvements = $model->getAllMouvements();

        // DEBUG (tu peux activer si ça ne marche toujours pas)
        // var_dump($aeroports); die();

        include dirname(__DIR__) . '/Views/v_Mouvement.php';
        break;
    }

    default: {
        echo "Action inconnue dans c_voirMouvement.php";
        break;
    }
}
