<?php
$action = $_REQUEST['action'];
switch($action) {
    case 'modificationAvion': {
        $num = isset($_REQUEST['num']) ? intval($_REQUEST['num']) : 0;
        $UnAvion = $pdo->getUnAvion($num);
        include("Views/v_modificationAvion.php");
        break;
    }
    case 'confirmModifAvion': {
        $num = isset($_REQUEST['num']) ? intval($_REQUEST['num']) : 0;
        $nom = $_REQUEST['nomC'];
        $prenom = $_REQUEST['prenomC'];
        $adresse = $_REQUEST['adresseC'];
        $codepostal = $_REQUEST['codepostalC'];
        $ville = $_REQUEST['villeC'];
        $pdo->modifierAvion($numSerie, $nom);
        $lesAvions = $pdo->getLesAvions();
        include("Views/v_avions.php");
        break;
    }
}
?>
