<?php
require_once dirname(__DIR__) . '/Models/m_employer.php';
require_once dirname(__DIR__) . '/Models/m_langues.php';
require_once dirname(__DIR__) . '/Models/m_parler.php';
require_once dirname(__DIR__) . '/Models/m_commercial.php';
require_once dirname(__DIR__) . '/Models/m_technicien.php';

$modelEmployer = new ModelEmployer();
$modelLangues = new LanguesModel();
$modelParler = new ParlerModel();   
$modelCommercial = new CommercialModel();
$modelTechnicien = new TechnicienModel();

$lesEmployers = $modelEmployer->getAllEmployers();
$lesLangues = $modelLangues->getAllLangues();

$action = $_REQUEST['action'];

switch ($action) 
{
    case 'formAdd':
        include dirname(__DIR__) . '/Views/v_ajouterEmployer.php';
        break;

    case 'confirmAddTechnicien': // Confirmation de l'ajout d'un technicien
        $modelEmployer->ajouterEmployer(
            $_POST['tel_Employer'],
            $_POST['nom_Employer'],
            $_POST['prenom_Employer']
            
        );
        $modelTechnicien->ajouterTechnicien(
            $modelEmployer->getLastInsertedId(),
            $_POST['nb_Heures']
        );
        header("Location: index.php?uc=voirEmployer&action=liste");
        break;
    
}
