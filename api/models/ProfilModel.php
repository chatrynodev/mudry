<?php
// models/ProfilModel.php
// Repris depuis le projet Web Mudry (m_profil.php)

require_once __DIR__ . "/../config/database.php";

class ProfilModel {

    private $pdo;

    public function __construct() {
        $this->pdo = Database::getInstance()->getConnexion();
    }

    private function clean($v) {
        return htmlspecialchars(trim($v), ENT_QUOTES, 'UTF-8');
    }

    // Récupère un profil par identifiant (utilisé pour la connexion)
    public function getByIdentifiant($identifiant) {
        try {
            $sql  = "SELECT * FROM profil WHERE identifiant = ?";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([$this->clean($identifiant)]);
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            return false;
        }
    }

    // Récupère le nom et prénom du pilote connecté via son id_Employer
    public function getPiloteInfo($idEmployer) {
        try {
            $sql = "
                SELECT e.nom_Employer, e.prenom_Employer, e.tel_Employer
                FROM employer e
                WHERE e.id_Employer = ?
            ";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([(int)$idEmployer]);
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            return false;
        }
    }
}