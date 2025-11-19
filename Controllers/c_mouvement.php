<?php
$action = $_REQUEST['action'];

require_once dirname(__DIR__) . '/Models/m_mouvement.php';
$modeleMouv = new MouvementModel();

switch ($action)
{
    case 'liste':
        $lesMouvements = $modeleMouv->getAllMouvements();
        include dirname(__DIR__) . '/Views/v_mouvement.php';
        break;

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
        header("Location: index.php?uc=mouvement&action=liste");
        break;

    case 'formUpdate':
        $unMouv = $modeleMouv->getUnMouvement($_GET['num_Mouv']);
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
        header("Location: index.php?uc=mouvement&action=liste");
        break;

    case 'delete':
        $unMouv = $modeleMouv->getUnMouvement($_GET['num_Mouv']);
        include dirname(__DIR__) . '/Views/v_deleteMouvement.php';
        break;

    case 'confirmDelete':
        $modeleMouv->supprimerMouvement($_POST['num_Mouv']);
        header("Location: index.php?uc=mouvement&action=liste");
        break;
}
