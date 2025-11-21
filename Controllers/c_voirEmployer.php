<?php
require_once dirname(__DIR__) . '/Models/m_employer.php';

$action = isset($_GET['action']) ? $_GET['action'] : 'liste';

switch ($action) {
    case 'liste':
        $modelEmployer = new ModelEmployer();
        $lesEmployers = $modelEmployer->getAllEmployers();
        include(dirname(__DIR__) . '/Views/v_voirEmployer.php');
        break;

    default:
        // Gérer les actions inconnues
        echo "Action inconnue.";
        break;
}
?>
