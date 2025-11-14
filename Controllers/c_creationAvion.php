<?php
$action = isset($_REQUEST['action']) ? $_REQUEST['action'] : '';
switch ($action) {
    case 'creerAvion': {
        include("Views/v_creationAvion.php");
        break;
    }
    case 'confirmCreatAvion': {
        // les noms envoyés par v_creationAvion.php sont "numSerie" et "codeInterne"
        $numSerie_Avion = isset($_REQUEST['numSerie']) ? trim($_REQUEST['numSerie']) : null;
        $codeInterne_Avion = isset($_REQUEST['codeInterne']) ? trim($_REQUEST['codeInterne']) : null;
        $id_Modele = isset($_REQUEST['id_Modele']) && $_REQUEST['id_Modele'] !== '' ? intval($_REQUEST['id_Modele']) : null;

        if ($numSerie_Avion === null || $codeInterne_Avion === null) {
            $erreur = "Numéro de série et code interne requis.";
            include("Views/v_creationAvion.php");
            break;
        }

        $pdo->creerAvion($numSerie_Avion, $codeInterne_Avion, $id_Modele);

        $lesAvions = $pdo->getLesAvions();
        include("Views/v_avions.php");
        break;
    }
    default: {
        $lesAvions = $pdo->getLesAvions();
        include("Views/v_avions.php");
        break;
    }
}
?>