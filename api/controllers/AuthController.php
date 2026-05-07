<?php
// controllers/AuthController.php

require_once __DIR__ . "/../models/ProfilModel.php";
require_once __DIR__ . "/../utils/response.php";

class AuthController {

    // POST /api/connectePilote
    // Body JSON : { "identifiant": "...", "password": "..." }
    public function connecter() {
        $body = json_decode(file_get_contents("php://input"), true);

        if (empty($body['identifiant']) || empty($body['password'])) {
            sendError("Identifiant et mot de passe requis.", 400);
        }

        $model  = new ProfilModel();
        $profil = $model->getByIdentifiant($body['identifiant']);

        if (!$profil) {
            sendError("Identifiant ou mot de passe incorrect.", 401);
        }

        // Vérification du mot de passe (stocké en clair dans la BDD Mudry)
        if ($profil['password'] !== $body['password']) {
            sendError("Identifiant ou mot de passe incorrect.", 401);
        }

        // Seuls les Pilotes peuvent se connecter à l'appli Android
        if ($profil['type'] !== 'Pilote') {
            sendError("Accès refusé. Cette application est réservée aux pilotes.", 403);
        }

        // Récupération du nom/prénom du pilote via id_Employer
        $piloteInfo = $model->getPiloteInfo($profil['id_Employer']);

        // Génération et sauvegarde du token (avec id_Employer pour les requêtes suivantes)
        $token = generateToken($profil['identifiant'], $profil['type']);
        saveToken($token, $profil);

        sendSuccess([
            "token"        => $token,
            "identifiant"  => $profil['identifiant'],
            "type"         => $profil['type'],
            "id_Employer"  => $profil['id_Employer'],
            "nom"          => $piloteInfo['nom_Employer'],
            "prenom"       => $piloteInfo['prenom_Employer'],
            "tel"          => $piloteInfo['tel_Employer']
        ], 200);
    }

    // GET /api/deconnectePilote
    // Header : Authorization: Bearer <token>
    public function deconnecter() {
        $headers = getallheaders();
        if (!empty($headers['Authorization'])) {
            $token = str_replace("Bearer ", "", $headers['Authorization']);
            deleteToken($token);
        }
        sendSuccess(["message" => "Déconnexion réussie."], 200);
    }

    // GET /api/getProfil
    // Header : Authorization: Bearer <token>
    public function getProfil() {
        $user = checkToken();

        $model      = new ProfilModel();
        $piloteInfo = $model->getPiloteInfo($user['id_Employer']);

        if (!$piloteInfo) {
            sendError("Profil introuvable.", 404);
        }

        sendSuccess([
            "identifiant" => $user['identifiant'],
            "nom"         => $piloteInfo['nom_Employer'],
            "prenom"      => $piloteInfo['prenom_Employer'],
            "tel"         => $piloteInfo['tel_Employer']
        ]);
    }
}