<?php

$modeleModele = new ModeleModel();
$modeleAvion = new AvionModel();

$lesAvions = $modeleAvion->getAllAvions();
$lesModeles = $modeleModele->getAllModeles();

$action = $_REQUEST['action'];

switch ($action) 
{
    case 'formAdd':
        include dirname(__DIR__) . '/Views/v_creationAvion.php';
        break;

    case 'confirmAdd':
        $modeleAvion->creerAvion(
            $_POST['id_Avion'],
            $_POST['numSerie_Avion'],
            $_POST['codeInterne_Avion'],
            $_POST['id_Modele']
        );
        header("Location: index.php?uc=voirAvion&action=liste");
        break;
}
/*
<br /><b>Warning</b>:  Trying to access array offset on false in 
<b>C:\laragon\www\mudry\Views\v_modificationAvion.php</b> on line <b>18</b><br />
<br /><b>Deprecated</b>:  htmlspecialchars(): Passing null to parameter #1 
($string) of type string is deprecated in <b>
C:\laragon\www\mudry\Views\v_modificationAvion.php</b> on line <b>18</b><br />
*/