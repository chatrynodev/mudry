<?php
// models/MouvementModel.php
// Repris et adapté depuis le projet Web Mudry (m_mouvement.php)

require_once __DIR__ . "/../config/database.php";

class MouvementModel {

    private $pdo;

    public function __construct() {
        $this->pdo = Database::getInstance()->getConnexion();
    }

    // Récupère uniquement les mouvements du pilote connecté pour une date donnée
    // Filtre sur id_Employer ET id_Role = 1 (Pilote) via la table equipage
    public function getMouvementsByDate($date, $idEmployer) {
        try {
            $sql = "
                SELECT m.*, 
                       ad.nom_Aeroport AS nom_depart,
                       ad.codeCommercial_Aeroport AS code_depart,
                       aa.nom_Aeroport AS nom_arrivee,
                       aa.codeCommercial_Aeroport AS code_arrivee,
                       av.numSerie_Avion,
                       av.codeInterne_Avion,
                       mo.libelle_Modele,
                       mo.nbSiegeMax_Modele
                FROM mouvement m
                JOIN aeroport ad ON ad.id_Aeroport = m.id_Aeroport_Depart
                JOIN aeroport aa ON aa.id_Aeroport = m.id_Aeroport_Arrivee
                JOIN avion av ON av.id_Avion = m.id_Avion
                JOIN modele mo ON mo.id_Modele = av.id_Modele
                JOIN equipage e ON e.num_Mouv = m.num_Mouv
                WHERE DATE(m.date_Depart) = :date
                AND e.id_Employer = :idEmployer
                AND e.id_Role = 1
                ORDER BY m.date_Depart ASC
            ";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([
                'date'       => $date,
                'idEmployer' => (int)$idEmployer
            ]);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            return false;
        }
    }

    // Récupère le détail d'un mouvement par son ID
    public function getMouvementById($id) {
        try {
            $sql = "
                SELECT m.*, 
                       ad.nom_Aeroport AS nom_depart,
                       ad.codeCommercial_Aeroport AS code_depart,
                       aa.nom_Aeroport AS nom_arrivee,
                       aa.codeCommercial_Aeroport AS code_arrivee,
                       av.numSerie_Avion,
                       av.codeInterne_Avion,
                       mo.libelle_Modele,
                       mo.nbSiegeMax_Modele
                FROM mouvement m
                JOIN aeroport ad ON ad.id_Aeroport = m.id_Aeroport_Depart
                JOIN aeroport aa ON aa.id_Aeroport = m.id_Aeroport_Arrivee
                JOIN avion av ON av.id_Avion = m.id_Avion
                JOIN modele mo ON mo.id_Modele = av.id_Modele
                WHERE m.num_Mouv = :id
            ";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute(['id' => (int)$id]);
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            return false;
        }
    }
}