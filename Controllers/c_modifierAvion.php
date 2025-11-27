<?php

$modeleModele = new ModeleModel();
$modeleAvion = new AvionModel();

$action = $_REQUEST['action'];

switch ($action) {

    case 'modifierAvion':
        $avion = $modeleAvion->getAvionById($_GET['id_Avion']);
        $lesModeles = $modeleModele->getAllModeles();

        include dirname(__DIR__) . '/Views/v_modificationAvion.php';
        break;

    case 'confirmUpdate':
        $modeleAvion->modifierAvion(
            $_POST['id_Avion'],
            $_POST['numSerie_Avion'],
            $_POST['codeInterne_Avion'],
            $_POST['id_Modele'],
        );
        header("Location: index.php?uc=voirAvion&action=liste");
        break;
}
