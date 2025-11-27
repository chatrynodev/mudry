<?php
include_once dirname(__DIR__) . '/Fonctions/f_dateMouv_verify.php';


$modeleMouv = new MouvementModel();
$modeleAvion = new AvionModel();
$modeleAero = new AeroportModel();

$lesAvions = $modeleAvion->getAllAvions();
$lesAeroports = $modeleAero->getAllAeroports();

$action = $_REQUEST['action'];

switch ($action) {
    case 'formAdd':
        include dirname(__DIR__) . '/Views/v_addMouvement.php';
        break;

    case 'confirmAdd':

    $date_depart  = $_POST['date_Depart'];
    $date_arrivee = $_POST['date_Arrive'];

    $valid_depart = valid_date_depart($date_depart);
    $valid_dates  = valid_date_arrivee($date_depart, $date_arrivee);

    // ❌ Erreur date départ
    if (!$valid_depart) {
        header("Location: index.php?uc=voirMouvement&action=liste&status=error&message=add_failDepart");
        exit;
    }

    // ❌ Erreur cohérence dates
    if (!$valid_dates) {
        header("Location: index.php?uc=voirMouvement&action=liste&status=error&message=add_failDates");
        exit;
    }

    // ✔ Si dates valides → insertion
    $ok = $modeleMouv->ajouterMouvement(
        $_POST['num_Vol'],
        $_POST['distance'],
        $_POST['nbPassager'],
        $_POST['date_Depart'],
        $_POST['date_Arrive'],
        $_POST['duree'],
        $_POST['id_Avion'],
        $_POST['id_Aeroport_Arrivee'],
        $_POST['id_Aeroport_Depart']
    );

    header("Location: index.php?uc=voirMouvement&action=liste&status=success");
    exit;
    break;
}
?>
