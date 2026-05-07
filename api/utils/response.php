<?php
// utils/response.php
// Fonctions utilitaires pour envoyer des réponses JSON standardisées

function sendSuccess($data = [], $code = 200) {
    http_response_code($code);
    echo json_encode([
        "success" => true,
        "data"    => $data
    ]);
    exit();
}

function sendError($message, $code = 400) {
    http_response_code($code);
    echo json_encode([
        "success" => false,
        "message" => $message
    ]);
    exit();
}

// Génère un token simple basé sur les données du profil
function generateToken($identifiant, $type) {
    $payload = $identifiant . "|" . $type . "|" . time();
    return base64_encode(hash_hmac('sha256', $payload, 'mudry_secret_key_2025', true));
}

// Vérifie le token dans le header Authorization
function checkToken() {
    // Méthode robuste pour récupérer le header Authorization
    $authHeader = null;
    if (isset($_SERVER['Authorization'])) {
        $authHeader = $_SERVER['Authorization'];
    } elseif (isset($_SERVER['HTTP_AUTHORIZATION'])) {
        $authHeader = $_SERVER['HTTP_AUTHORIZATION'];
    } elseif (function_exists('getallheaders')) {
        $headers = getallheaders();
        if (isset($headers['Authorization'])) {
            $authHeader = $headers['Authorization'];
        }
    }

    if (!$authHeader) {
        sendError("Token manquant. Veuillez vous connecter.", 401);
    }

    $token = str_replace("Bearer ", "", $authHeader);
    if (empty($token)) {
        sendError("Token invalide.", 401);
    }

    $tokensFile = __DIR__ . "/../tokens.json";
    if (!file_exists($tokensFile)) {
        sendError("Non autorisé.", 401);
    }

    $tokens = json_decode(file_get_contents($tokensFile), true);
    if (!isset($tokens[$token])) {
        sendError("Token expiré ou invalide. Veuillez vous reconnecter.", 401);
    }

    return $tokens[$token];
}

// Sauvegarde un token actif — on stocke aussi id_Employer pour les requêtes suivantes
function saveToken($token, $profilData) {
    $tokensFile = __DIR__ . "/../tokens.json";
    $tokens = file_exists($tokensFile) ? json_decode(file_get_contents($tokensFile), true) : [];
    $tokens[$token] = [
        "identifiant" => $profilData['identifiant'],
        "type"        => $profilData['type'],
        "id_Employer" => $profilData['id_Employer'], // ← ajouté pour filtrer les vols
        "created_at"  => time()
    ];
    file_put_contents($tokensFile, json_encode($tokens));
}

// Supprime un token (déconnexion)
function deleteToken($token) {
    $tokensFile = __DIR__ . "/../tokens.json";
    if (!file_exists($tokensFile)) return;
    $tokens = json_decode(file_get_contents($tokensFile), true);
    unset($tokens[$token]);
    file_put_contents($tokensFile, json_encode($tokens));
}