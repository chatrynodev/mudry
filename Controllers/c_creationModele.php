<?php
require_once dirname(__DIR__) . '/Models/m_avion.php';
require_once dirname(__DIR__) . '/Models/m_modele.php';

$modeleModele = new ModeleModel();

$lesModeles = $modeleModele->getAllModeles();

$action = $_REQUEST['action'];

switch ($action) 
{
    case 'creerModele':
        include dirname(__DIR__) . '/Views/v_creationModele.php';
        break;

    case 'confirmAdd':
        $modeleModele->creerModele(
            $_POST['id_Modele'],
            $_POST['libelle_Modele'],
            $_POST['nbSiegeMax_Modele']
        );
        header("Location: index.php?uc=voirModele&action=liste");
        break;
}