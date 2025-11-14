<?php

class PdoMudry {

    private static $instance = null;
    private $pdo;

    /* ----------------------------------------------------------
       Constructeur privé → empêche toute instanciation externe
       ---------------------------------------------------------- */
    private function __construct() {

        $host    = "localhost";
        $dbname  = "mudry";   // adapte selon ton nom de base
        $user    = "root";
        $pass    = "";
        $charset = "utf8mb4";

        $dsn = "mysql:host=$host;dbname=$dbname;charset=$charset";

        $options = [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES   => false,
        ];

        try {
            $this->pdo = new PDO($dsn, $user, $pass, $options);
        }
        catch (Exception $e) {

            // 🔐 Aucune fuite d'information sensible
            error_log("Erreur PDO Mudry : " . $e->getMessage());

            die("Une erreur interne est survenue.");
        }
    }

    /* ----------------------------------------------------------
       Singleton : une seule instance partagée dans tout le site
       ---------------------------------------------------------- */
    public static function getPdoMudry() {
        if (self::$instance === null) {
            self::$instance = new PdoMudry();
        }
        return self::$instance;
    }

    /* ----------------------------------------------------------
       Renvoie la connexion PDO sécurisée
       ---------------------------------------------------------- */
    public function getConnexion() {
        return $this->pdo;
    }
}
