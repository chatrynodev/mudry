<?php
require_once dirname(__DIR__) . '/Models/m_employer.php';
require_once dirname(__DIR__) . '/Models/m_langues.php';
require_once dirname(__DIR__) . '/Models/m_parler.php';
require_once dirname(__DIR__) . '/Models/m_commercial.php';
require_once dirname(__DIR__) . '/Models/m_technicien.php';
require_once dirname(__DIR__) . '/Fonctions/f_verifTypeEmployer.php';

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
    case 'formUpdate':
        $employer = $modelEmployer->getEmployerById($_REQUEST['id_Employer']);
        $role = verifierTypeEmployer(PdoMudry::getPdoMudry()->getConnexion(), $_REQUEST['id_Employer']);
        if ($role === 'technicien') {
            $employer['nb_Heures'] = $modelTechnicien->getNbHeuresTechnicienById($_REQUEST['id_Employer']);
        }
        if ($role === 'commercial') {
            $employer['langues'] = $modelParler->getLanguesByCommercialId($_REQUEST['id_Employer']);
        }
        $lesLangues = $modelLangues->getAllLangues();
        include dirname(__DIR__) . '/Views/v_modifierEmployer.php';
        break;

    case 'confirmUpdateEmployer': // Confirmation de l'ajout d'un technicien
        $id = (int) $_POST['id_Employer'];

        $modelEmployer->modifierEmployer(
                $id,
                $_POST['tel_Employer'],
                $_POST['nom_Employer'],
                $_POST['prenom_Employer'],
            );

        if ($_POST['role'] === 'technicien') {
            $modelTechnicien->modifierTechnicien(
                $id,
                $_POST['nb_Heures']
            );
        }

        if ($_POST['role'] === 'commercial') {
            $modelParler->supprimerParlerByCommercialId($id);
            foreach ($_POST['langues'] as $idlangue) {
                $modelParler->insertParler(
                    $id,
                    $idlangue
                );
            }
        }

        header("Location: index.php?uc=voirEmployer&action=liste");
        break;
}
