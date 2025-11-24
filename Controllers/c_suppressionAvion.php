<?php
require_once dirname(__DIR__) . '/Models/m_modele.php';
require_once dirname(__DIR__) . '/Models/m_avion.php';


$modeleModele = new ModeleModel();
$modeleAvion = new AvionModel();

$action = $_REQUEST['action'];

switch ($action) {

    case 'confirmDelete':
        $modeleAvion->supprimerAvion(
            $_POST['id_Avion'],
            $_POST['id_Modele']
        );
        header("Location: index.php?uc=voirAvion&action=liste");
        break;
}
