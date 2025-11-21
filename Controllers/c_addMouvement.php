<?php
require_once dirname(__DIR__) . '/Models/m_mouvement.php';
require_once dirname(__DIR__) . '/Models/m_avion.php';
require_once dirname(__DIR__) . '/Models/m_aeroport.php';

$modeleMouv = new MouvementModel();
$modeleAvion = new AvionModel();
$modeleAero = new AeroportModel();

$lesAvions = $modeleAvion->getAllAvions();
$lesAeroports = $modeleAero->getAllAeroports();

$action = $_REQUEST['action'];

switch ($action) 
{
    case 'formAdd':
        include dirname(__DIR__) . '/Views/v_addMouvement.php';
        break;

    case 'confirmAdd':
        $modeleMouv->ajouterMouvement(
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
