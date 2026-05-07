<?php
// controllers/EquipageController.php

require_once __DIR__ . "/../models/EquipageModel.php";
require_once __DIR__ . "/../utils/response.php";

class EquipageController {

    // GET /api/getEquipage?id_mouvement=<num_Mouv>
    // Header : Authorization: Bearer <token>
    public function getEquipage() {
        checkToken();

        if (empty($_GET['id_mouvement'])) {
            sendError("Paramètre 'id_mouvement' manquant.", 400);
        }

        $numMouv = (int)$_GET['id_mouvement'];
        $model   = new EquipageModel();
        $equipage = $model->getEquipageByMouv($numMouv);

        if ($equipage === false) {
            sendError("Erreur lors de la récupération de l'équipage.", 500);
        }

        if (empty($equipage)) {
            sendError("Aucun équipage trouvé pour ce mouvement.", 404);
        }

        sendSuccess($equipage);
    }

    // PUT /api/updatePresence
    // Header : Authorization: Bearer <token>
    // Body JSON : { "id_mouvement": 1, "id_employer": 3, "presence": true }
    public function updatePresence() {
        checkToken();

        $body = json_decode(file_get_contents("php://input"), true);

        if (!isset($body['id_mouvement'], $body['id_employer'], $body['id_role'], $body['presence'])) {
            sendError("Paramètres manquants : id_mouvement, id_employer, id_role et presence requis.", 400);
        }

        $model   = new EquipageModel();
        $success = $model->updatePresence(
            $body['id_mouvement'],
            $body['id_employer'],
            $body['id_role'],
            $body['presence'] ? 1 : 0
        );

        if (!$success) {
            sendError("Erreur lors de la mise à jour de la présence.", 500);
        }

        sendSuccess(["message" => "Présence mise à jour avec succès."]);
    }

    // GET /api/verifierEquipage?id_mouvement=<num_Mouv>
    // Header : Authorization: Bearer <token>
    public function verifierEquipage() {
        checkToken();

        if (empty($_GET['id_mouvement'])) {
            sendError("Paramètre 'id_mouvement' manquant.", 400);
        }

        $numMouv  = (int)$_GET['id_mouvement'];
        $model    = new EquipageModel();
        $resultat = $model->verifierEquipage($numMouv);

        if ($resultat === false) {
            sendError("Erreur lors de la vérification de l'équipage.", 500);
        }

        sendSuccess($resultat);
    }
}