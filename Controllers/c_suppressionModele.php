<?php
require_once dirname(__DIR__) . '/Models/m_modele.php';
require_once dirname(__DIR__) . '/Models/m_avion.php';

$modeleModele = new ModeleModel();
$modeleAvion = new AvionModel();

$action = $_REQUEST['action'] ?? '';

switch ($action) {

    case '':
        $id_Modele = isset($_GET['id_Modele']) ? intval($_GET['id_Modele']) : null;
        $unModele = $modeleModele->getModeleById($id_Modele);
        // Récupérer les rôles assignés pour les afficher
        $rolesAssignes = $modeleModele->getRoleForModele($id_Modele);
        include dirname(__DIR__) . '/Views/v_supprimerModele.php';
        break;

    case 'confirmDelete':
        $id_Modele = isset($_POST['id_Modele']) ? intval($_POST['id_Modele']) : null;
        if (!$id_Modele) {
            header("Location: index.php?uc=voirModele&action=liste");
            exit;
        }

        // Vérifier si des avions utilisent ce modèle
        $avionsUsing = $modeleAvion->getAvionsByModele($id_Modele);
        if (!empty($avionsUsing)) {
            $erreur = "Impossible de supprimer : un ou plusieurs avions utilisent ce modèle.";
            $unModele = $modeleModele->getModeleById($id_Modele);
            $rolesAssignes = $modeleModele->getRoleForModele($id_Modele);
            include dirname(__DIR__) . '/Views/v_supprimerModele.php';
            break;
        }

        // Supprimer d'abord les assignations de rôles
        $modeleModele->assignRolesToModele($id_Modele, []);

        // Puis supprimer le modèle
        $modeleModele->supprimerModele($id_Modele);
        header("Location: index.php?uc=voirModele&action=liste");
        exit;
        break;
}
