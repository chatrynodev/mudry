<?php

$modeleMouv = new MouvementModel();
$modeleAvion = new AvionModel();
$modeleAero = new AeroportModel();

$action = $_REQUEST['action'];

switch ($action) {

    case 'formUpdate':
        $unMouv = $modeleMouv->getUnMouvement($_GET['num_Mouv']);
        $lesAvions = $modeleAvion->getAllAvions();
        $lesAeroports = $modeleAero->getAllAeroports();

        include dirname(__DIR__) . '/Views/v_updateMouvement.php';
        break;

    case 'confirmUpdate':
        $modeleMouv->modifierMouvement(
            $_POST['num_Mouv'],
            $_POST['num_Vol'],
            $_POST['distance'],
            $_POST['nbPassager'],
            $_POST['date_Depart'],
            $_POST['date_Arrive'],
            $_POST['duree'],
            $_POST['id_Avion'],
            $_POST['id_Aeroport_Arrivee'],
            $_POST['id_Aeroport_Depart']
        );
        header("Location: index.php?uc=voirMouvement&action=liste");
        break;
}
