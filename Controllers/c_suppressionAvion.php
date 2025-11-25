<?php
require_once dirname(__DIR__) . '/Models/m_modele.php';
require_once dirname(__DIR__) . '/Models/m_avion.php';


$modeleModele = new ModeleModel();
$modeleAvion = new AvionModel();

$action = $_REQUEST['action'] ?? '';

switch ($action) {

    case '':
        $avion = $modeleAvion->getAvionById($_GET['id_Avion']);
        include("Views/v_supprimerAvion.php");
        break;

    case 'confirmDelete':
        $avionIsInMouvement = $modeleAvion->getAvionIsInMouvement($_POST['id_Avion']);
        if ($avionIsInMouvement){
            header("Location: index.php?uc=voirAvion&action=liste");
            break;
        }
        $modeleAvion->supprimerAvion(
            $_POST['id_Avion'],
            $_POST['id_Modele']
        );
        header("Location: index.php?uc=voirAvion&action=liste");
        break;
}
