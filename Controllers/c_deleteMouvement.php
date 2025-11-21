<?php
require_once dirname(__DIR__) . '/Models/m_mouvement.php';
$modeleMouv = new MouvementModel();

$action = $_REQUEST['action'];

switch ($action)
{
    case 'delete':
        $unMouv = $modeleMouv->getUnMouvement($_GET['num_Mouv']);
        include dirname(__DIR__) . '/Views/v_deleteMouvement.php';
        break;

    case 'confirmDelete':
        $modeleMouv->supprimerMouvement($_POST['num_Mouv']);
        header("Location: index.php?uc=voirMouvement&action=liste");
        break;
}
