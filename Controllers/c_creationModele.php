<?php


$modeleModel = new ModeleModel();
$lesRoles = $modeleModel->getAllRoles();

$action = isset($_REQUEST['action']) ? $_REQUEST['action'] : 'creerModele';
switch ($action) 
{
    case 'creerModele':
        include dirname(__DIR__) . '/Views/v_creationModele.php';
        break;

    case 'confirmAdd':
        $libelle = isset($_POST['libelle_Modele']) ? trim($_POST['libelle_Modele']) : '';
        $nb = isset($_POST['nbSiegeMax_Modele']) ? intval($_POST['nbSiegeMax_Modele']) : 0;
        $selectedRoles = isset($_POST['id_Role']) ? $_POST['id_Role'] : [];
        $selectedQuantites = isset($_POST['qte']) ? $_POST['qte'] : [];

        // validation minimale
        if ($libelle === '' || $nb <= 0) {
            $erreur = "Nom de modèle et nombre de sièges requis.";
            include dirname(__DIR__) . '/Views/v_creationModele.php';
            break;
        }

        // Validation : au moins un rôle doit être sélectionné
        if (empty($selectedRoles)) {
            $erreur = "Vous devez sélectionner au moins un rôle pour créer un modèle.";
            include dirname(__DIR__) . '/Views/v_creationModele.php';
            break;
        }

        $idModele = $modeleModel->creerModele($libelle, $nb);
        if (!empty($selectedRoles)) {
            // Récupérer les quantités pour chaque rôle sélectionné
            $rolesAvecQte = [];
            foreach ($selectedRoles as $idRole) {
                $qte = isset($selectedQuantites[$idRole]) ? intval($selectedQuantites[$idRole]) : 1;
                $qte = max(1, $qte); // S'assurer que la quantité est au minimum 1
                $rolesAvecQte[$idRole] = $qte;
            }
            
            if (!empty($rolesAvecQte)) {
                $modeleModel->assignRolesToModele($idModele, $rolesAvecQte);
            }
        }

        header("Location: index.php?uc=voirModele&action=liste");
        exit;
}
?>