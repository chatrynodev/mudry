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

        // validation minimale
        if ($libelle === '' || $nb <= 0) {
            $erreur = "Nom de modèle et nombre de sièges requis.";
            include dirname(__DIR__) . '/Views/v_creationModele.php';
            break;
        }

        $idModele = $modeleModel->creerModele($libelle, $nb);
        if (!empty($selectedRoles) && is_array($selectedRoles)) {
            $modeleModel->assignRolesToModele($idModele, $selectedRoles);
        }

        header("Location: index.php?uc=voirModele&action=liste");
        exit;
}
?>