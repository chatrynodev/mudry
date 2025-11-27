<?php
require_once dirname(__DIR__) . '/Models/m_modele.php';
require_once dirname(__DIR__) . '/Models/m_avion.php';


$modeleModele = new ModeleModel();

$action = $_REQUEST['action'] ?? '';

switch ($action) {

    case '':
        $unModele = $modeleModele->getModeleById($_GET['id_Modele']);
        include("Views/v_supprimerModele.php");
        break;

    case 'confirmDelete':
        $modeleModele->supprimerModele(
            $_POST['id_Modele']
        );
        header("Location: index.php?uc=voirModele&action=liste");
        break;
}
