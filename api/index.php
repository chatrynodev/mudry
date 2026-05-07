<?php
// index.php — Point d'entrée unique de l'API Mudry
// Toutes les requêtes passent par ici grâce au .htaccess

// --- En-têtes CORS (pour autoriser les requêtes depuis Android) ---
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Authorization");

// Répondre immédiatement aux requêtes OPTIONS (pre-flight CORS)
if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(200);
    exit();
}

// --- Chargement des dépendances ---
require_once __DIR__ . "/utils/response.php";
require_once __DIR__ . "/controllers/AuthController.php";
require_once __DIR__ . "/controllers/MouvementController.php";
require_once __DIR__ . "/controllers/EquipageController.php";

// --- Lecture de la route depuis l'URL ---
$requestUri    = $_SERVER['REQUEST_URI'];
$scriptName    = dirname($_SERVER['SCRIPT_NAME']);
$route         = str_replace($scriptName, '', $requestUri);
$route         = strtok(trim($route, '/'), '?');
$method        = $_SERVER['REQUEST_METHOD'];

// --- Routeur ---
switch ($route) {

    // AUTH
    case 'connectePilote':
        if ($method === 'POST') {
            (new AuthController())->connecter();
        } else {
            sendError("Méthode non autorisée.", 405);
        }
        break;

    case 'deconnectePilote':
        if ($method === 'GET') {
            (new AuthController())->deconnecter();
        } else {
            sendError("Méthode non autorisée.", 405);
        }
        break;

    case 'getProfil':
        if ($method === 'GET') {
            (new AuthController())->getProfil();
        } else {
            sendError("Méthode non autorisée.", 405);
        }
        break;

    // MOUVEMENTS
    case 'getVolsDuJour':
        if ($method === 'GET') {
            (new MouvementController())->getVolsDuJour();
        } else {
            sendError("Méthode non autorisée.", 405);
        }
        break;

    case 'getDetailsMouvement':
        if ($method === 'GET') {
            (new MouvementController())->getDetailsMouvement();
        } else {
            sendError("Méthode non autorisée.", 405);
        }
        break;

    // EQUIPAGE
    case 'getEquipage':
        if ($method === 'GET') {
            (new EquipageController())->getEquipage();
        } else {
            sendError("Méthode non autorisée.", 405);
        }
        break;

    case 'updatePresence':
        if ($method === 'PUT') {
            (new EquipageController())->updatePresence();
        } else {
            sendError("Méthode non autorisée.", 405);
        }
        break;

    case 'verifierEquipage':
        if ($method === 'GET') {
            (new EquipageController())->verifierEquipage();
        } else {
            sendError("Méthode non autorisée.", 405);
        }
        break;

    // Route inconnue
    default:
        sendError("Route '$route' introuvable.", 404);
        break;
}