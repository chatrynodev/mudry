<?php

$modeleModele = new ModeleModel();

$action = $_REQUEST['action'];

switch ($action) {

    case 'modifierModele':
        $modele = $modeleModele->getModeleById($_GET['id_Modele']);
        $lesRoles = $modeleModele->getAllRoles();
        $rolesAssignes = $modeleModele->getRoleForModele($_GET['id_Modele']);

        include dirname(__DIR__) . '/Views/v_modificationModele.php';
        break;

    case 'confirmUpdate':
        $libelle = isset($_POST['libelle_Modele']) ? trim($_POST['libelle_Modele']) : '';
        $nb = isset($_POST['nbSiegeMax_Modele']) ? intval($_POST['nbSiegeMax_Modele']) : 0;
        $selectedRoles = isset($_POST['id_Role']) ? $_POST['id_Role'] : [];
        $selectedQuantites = isset($_POST['qte']) ? $_POST['qte'] : [];

        // Validation minimale
        if ($libelle === '' || $nb <= 0) {
            $modele = $modeleModele->getModeleById($_POST['id_Modele']);
            $lesRoles = $modeleModele->getAllRoles();
            $rolesAssignes = $modeleModele->getRoleForModele($_POST['id_Modele']);
            $erreur = "Nom de modèle et nombre de sièges requis.";
            include dirname(__DIR__) . '/Views/v_modificationModele.php';
            break;
        }

        // Mettre à jour le modèle
        $modeleModele->modifierModele(
            $_POST['id_Modele'],
            $libelle,
            $nb
        );

        // Mettre à jour les rôles avec quantités
        if (!empty($selectedRoles)) {
            $rolesAvecQte = [];
            foreach ($selectedRoles as $idRole) {
                $qte = isset($selectedQuantites[$idRole]) ? intval($selectedQuantites[$idRole]) : 1;
                $qte = max(1, $qte);
                $rolesAvecQte[$idRole] = $qte;
            }
            
            if (!empty($rolesAvecQte)) {
                $modeleModele->assignRolesToModele($_POST['id_Modele'], $rolesAvecQte);
            }
        }

        header("Location: index.php?uc=voirModele&action=liste");
        break;
}
