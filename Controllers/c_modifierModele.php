<?php
require_once dirname(__DIR__) . '/Models/m_modele.php';
require_once dirname(__DIR__) . '/Models/m_avion.php';


$modeleModele = new ModeleModel();

$action = $_REQUEST['action'];

switch ($action) {

    case 'modifierModele':
        $modele = $modeleModele->getModeleById($_GET['id_Modele']);

        include dirname(__DIR__) . '/Views/v_modificationModele.php';
        break;

    case 'confirmUpdate':
        $modeleModele->modifierModele(
            $_POST['id_Modele'],
            $_POST['libelle_Modele'],
            $_POST['nbSiegeMax_Modele']
        );
        header("Location: index.php?uc=voirModele&action=liste");
        break;
}
