<?php
// contrôleur : c_creerAeroport.php
require_once '../Models/m_aeroport.php';

if (!isset($_REQUEST['action'])) {
    $action = 'saisirAeroport';
} else {
    $action = $_REQUEST['action'];
}

switch ($action) {

    case 'saisirAeroport':
        // valeurs par défaut pour le formulaire
        $nom = '';
        $latitude = '';
        $longitude = '';
        $codeCommecial_Aeroport = '';

        include '../Views/v_addAeroport.php';
        break;

    case 'confirmCreationAeroport':

        // Récupération sécurisée des données POST
        $nom  = isset($_POST['nom']) ? trim($_POST['nom']) : '';
        $latitude  = isset($_POST['latitude']) ? trim($_POST['latitude']) : '';
        $longitude = isset($_POST['longitude']) ? trim($_POST['longitude']) : '';
        // attention à l'orthographe exacte du name dans la vue :
        $codeCommecial_Aeroport = isset($_POST['codeCommecial_Aeroport']) ? trim($_POST['codeCommecial_Aeroport']) : '';

        $erreurs = [];

        // Validation simple
        if ($nom === '') {
            $erreurs[] = "Le nom de l'aéroport est obligatoire.";
        }

        // Remplacement des virgules par des points pour les décimaux
        $latitudeNorm = str_replace(',', '.', $latitude);
        $longitudeNorm = str_replace(',', '.', $longitude);

        if ($latitude === '' || !is_numeric($latitudeNorm)) {
            $erreurs[] = "La latitude doit être un nombre valide.";
        }

        if ($longitude === '' || !is_numeric($longitudeNorm)) {
            $erreurs[] = "La longitude doit être un nombre valide.";
        }

        if ($codeCommecial_Aeroport === '') {
            $erreurs[] = "Le code commercial de l'aéroport est obligatoire.";
        }

        if (!empty($erreurs)) {
            // On affiche la vue des erreurs (si tu en as une)
            if (file_exists('../Views/erreurs/v_erreurs.php')) {
                include('../Views/erreurs/v_erreurs.php');
            }
            // Puis on réaffiche le formulaire avec les valeurs saisies
            include('../Views/v_addAeroport.php');
        } else {
            // Conversion en float après validation
            $latitudeFloat = (float)$latitudeNorm;
            $longitudeFloat = (float)$longitudeNorm;

            // Utilisation du modèle
            $model = new AeroportModel(); // doit utiliser PdoMudry en interne

            $ok = $model->insertAeroport(
                $nom,
                $latitudeFloat,
                $longitudeFloat,
                $codeCommecial_Aeroport // même orthographe que dans la vue
            );

            if (!$ok || (is_array($ok) && isset($ok['error']))) {
                $erreurs[] = "Une erreur est survenue lors de la création de l'aéroport.";
                if (file_exists('../Views/erreurs/v_erreurs.php')) {
                    include('../Views/erreurs/v_erreurs.php');
                }
                include('../Views/v_addAeroport.php');
            } else {
                $message = "L'aéroport a été créé avec succès.";
                if (file_exists('../Views/v_message.php')) {
                    include('../Views/v_message.php');
                }

                // tu peux au choix :
                // - réafficher le formulaire vide
                // - ou rediriger vers la liste des aéroports
                $nom = $latitude = $longitude = $codeCommecial_Aeroport = '';
                include('../Views/v_addAeroport.php');
            }
        }

        break;
}
