<?php
require_once dirname(__DIR__) . "/Models/m_equipage.php";

$action = $_REQUEST['action'];
$numMouv = $_REQUEST['num_Mouv'] ?? null;

switch($action){

    case 'voirEquipage':
        $equipage = Equipage::getEquipageByMouv($numMouv);
        $roles     = Equipage::getRoles();
        $employers = Equipage::getEmployers();
        include dirname(__DIR__) . "/Views/v_voirEquipage.php";
        break;

    case 'addEquipage':
        $idRole     = $_POST['id_Role'];
        $idEmployer = $_POST['id_Employer'];
        $presence   = $_POST['presence'];

        Equipage::addEquipage($numMouv, $idRole, $idEmployer, $presence);

        header("Location: index.php?uc=equipage&action=voirEquipage&num_Mouv=".$numMouv);
        break;

    case 'deleteEquipage':
        $idRole     = $_GET['id_Role'];
        $idEmployer = $_GET['id_Employer'];

        Equipage::deleteEquipage($numMouv, $idRole, $idEmployer);

        header("Location: index.php?uc=equipage&action=voirEquipage&num_Mouv=".$numMouv);
        break;
}
