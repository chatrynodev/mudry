<?php
$action = $_REQUEST['action'];
switch($action) {
    case 'modificationAvion': {
        $num = isset($_REQUEST['num']) ? intval($_REQUEST['num']) : 0;
        $leAvion = $pdo->getLeAvion($num);
        include("Views/v_modificationAvion.php");
        break;
    }
    case 'confirmModifAvion': {
        $num = isset($_REQUEST['num']) ? intval($_REQUEST['num']) : 0;
        $code = $_REQUEST['codeInterne_Avion'];
        $pdo->modifierAvion($num, $code);
        $lesAvions = $pdo->getLesAvions();
        include("Views/v_avions.php");
        break;
    }
}
?>
