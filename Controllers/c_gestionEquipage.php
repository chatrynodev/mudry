<?php

$action  = $_REQUEST['action']   ?? 'voirEquipage';
$numMouv = $_REQUEST['num_Mouv'] ?? null;

// Instanciation des modèles
$modeleEmploye   = new ModelEmployer();
$modeleRole      = new RoleModel();
$modeleEquipage  = new EquipageModel();
$modeleAvion     = new AvionModel();
$modeleModele    = new ModeleModel();

switch ($action) {

    /* --------------------------------------------------------------------
       AFFICHAGE DE L'ÉQUIPAGE
    -------------------------------------------------------------------- */
    case 'voirEquipage':

        // Equipage existant
        $equipage      = $modeleEquipage->getEquipageByMouv($numMouv);

        // Rôles obligatoires dépendants du modèle d’avion
        $requiredRoles = $modeleEquipage->getRequiredRolesForMouvement($numMouv);

        // Liste des employés
        $employers     = $modeleEmploye->getAllEmployers();

        include dirname(__DIR__) . '/Views/v_voirEquipage.php';
        break;


    /* --------------------------------------------------------------------
    VALIDATION DE L'ÉQUIPAGE
    -------------------------------------------------------------------- */
    case 'assignEquipage':

    // On supprime tout l'équipage actuel pour repartir propre
    $modeleEquipage->deleteAllFromMouvement($numMouv);

    foreach ($_POST as $key => $value) {

        // On cherche role_X_Y (rôle X, position Y)
        if (preg_match('/role_([0-9]+)_([0-9]+)/', $key, $matches)) {

            $idRole = intval($matches[1]);
            $ordre  = intval($matches[2]); // utile si on veut un ordre exact

            if (!empty($value)) {
                $idEmployer = intval($value);

                $modeleEquipage->addEquipage(
                    $numMouv,
                    $idRole,
                    $idEmployer,
                    1
                );
            }
        }
    }

    header("Location: index.php?uc=gererEquipage&action=voirEquipage&num_Mouv=$numMouv");
    exit;


    /* --------------------------------------------------------------------
    SUPPRESSION D’UN MEMBRE
    -------------------------------------------------------------------- */
    case 'deleteEquipage':

        $modeleEquipage->deleteEquipage(
            $numMouv,
            $_GET['id_Role'],
            $_GET['id_Employer']
        );

        header("Location: index.php?uc=gererEquipage&action=voirEquipage&num_Mouv=$numMouv");
        exit;
}
