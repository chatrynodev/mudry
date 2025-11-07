<?php
    $action=$_REQUEST['action'];
    switch($action) 
    {
        case 'creerAvion':
        {
           include("vues/v_creationAvion.php");
           break;
        }
        case 'confirmCreatAvion':
        {
            $numSerie_Avion = $_REQUEST['numSerie_Avion'];
            $codeInterne_Avion = $_REQUEST['codeInterne_Avion'];
            $id_Modele = $_REQUEST['id_Modele'];
            $pdo->creerAvion($numSerie_Avion, $codeInterne_Avion, $id_Modele);

            $lesAvions = $pdo->getLesAvions();
            include("vues/v_avions.php");
            break;
        }
    }
?>