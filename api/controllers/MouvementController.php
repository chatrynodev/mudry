<?php
// controllers/MouvementController.php

require_once __DIR__ . "/../models/MouvementModel.php";
require_once __DIR__ . "/../utils/response.php";

class MouvementController {

    // GET /api/getVolsDuJour?date=YYYY-MM-DD
    // Header : Authorization: Bearer <token>
    public function getVolsDuJour() {
        $user = checkToken(); // Récupère les infos du pilote connecté (dont id_Employer)

        $date = $_GET['date'] ?? date('Y-m-d'); // Si pas de date → aujourd'hui

        // Validation format de date
        if (!preg_match('/^\d{4}-\d{2}-\d{2}$/', $date)) {
            sendError("Format de date invalide. Utilisez YYYY-MM-DD.", 400);
        }

        $model      = new MouvementModel();
        // On passe l'id_Employer du pilote connecté pour ne retourner QUE ses vols
        $mouvements = $model->getMouvementsByDate($date, $user['id_Employer']);

        if ($mouvements === false) {
            sendError("Erreur lors de la récupération des vols.", 500);
        }

        sendSuccess($mouvements);
    }

    // GET /api/getDetailsMouvement?id=<num_Mouv>
    // Header : Authorization: Bearer <token>
    public function getDetailsMouvement() {
        checkToken();

        if (empty($_GET['id'])) {
            sendError("Paramètre 'id' manquant.", 400);
        }

        $id = (int)$_GET['id'];

        $model     = new MouvementModel();
        $mouvement = $model->getMouvementById($id);

        if (!$mouvement) {
            sendError("Mouvement introuvable.", 404);
        }

        sendSuccess($mouvement);
    }
}