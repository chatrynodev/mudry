<?php
// config/database.php
// Réutilise la même logique de connexion que le projet Web Mudry

class Database {

    private static $instance = null;
    private $pdo;

    private function __construct() {
        if ($_SERVER['SERVER_NAME'] == 'localhost' || $_SERVER['SERVER_NAME'] == '10.206.224.168') {
            $host   = "localhost";
            $dbname = "mudry";
            $user   = "root";
            $pass   = "";
        } else {
            $host   = "db672809001.db.1and1.com";
            $dbname = "db672809001";
            $user   = "dbo672809001";
            $pass   = "\$siQU3N9Lp2SiJKRX^";
        }

        $dsn = "mysql:host=$host;dbname=$dbname;charset=utf8mb4";

        $options = [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES   => false,
        ];

        try {
            $this->pdo = new PDO($dsn, $user, $pass, $options);
        } catch (Exception $e) {
            error_log("Erreur PDO API Mudry : " . $e->getMessage());
            http_response_code(500);
            die(json_encode(["success" => false, "message" => "Erreur de connexion à la base de données."]));
        }
    }

    public static function getInstance() {
        if (self::$instance === null) {
            self::$instance = new Database();
        }
        return self::$instance;
    }

    public function getConnexion() {
        return $this->pdo;
    }
}
