<?php

class AeroportModel {

    private $pdo;

    public function __construct() {
        // On récupère l’objet PDO depuis le singleton
        $this->pdo = PdoMudry::getPdoMudry()->getConnexion();
    }

    /* ------------------------------
       Nettoyage sécurisé d’une chaîne
       ------------------------------ */
    private function cleanString($value) {
        return htmlspecialchars(trim($value), ENT_QUOTES, 'UTF-8');
    }

    /* ------------------------------
       Récupération de tous les aéroports
       ------------------------------ */
    public function getAllAeroports() {
        try {
            $sql = "SELECT * FROM aeroport ORDER BY nom_Aeroport ASC";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();

            // ❗ IMPORTANT : retourner le résultat
            return $stmt->fetchAll(PDO::FETCH_ASSOC);

        } catch (Exception $e) {
            return ["error" => "Erreur interne lors de la récupération des aéroports."];
        }
    }

    /* ------------------------------
       Récupérer un aéroport par ID
       ------------------------------ */
    public function getAeroportById($id) {
        try {
            $id = (int)$id;

            $sql = "SELECT * FROM aeroport WHERE id_Aeroport = ?";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([$id]);

            return $stmt->fetch(PDO::FETCH_ASSOC);

        } catch (Exception $e) {
            return ["error" => "Erreur interne lors de la récupération d’un aéroport."];
        }
    }

    /* ------------------------------
       Ajouter un aéroport
       ------------------------------ */
    public function insertAeroport($nom, $latitude, $longitude, $codeCommercial) {
        try {
            $nom = $this->cleanString($nom);
            $latitude = (float)$latitude;
            $longitude = (float)$longitude;
            $codeCommercial = $this->cleanString($codeCommercial);

            $sql = "INSERT INTO aeroport 
                    (nom_Aeroport, latitude_Aeroport, longitude_Aeroport, codeCommercial_Aeroport)
                    VALUES (?, ?, ?, ?)";

            $stmt = $this->pdo->prepare($sql);

            return $stmt->execute([$nom, $latitude, $longitude, $codeCommercial]);

        } catch (Exception $e) {
            return ["error" => "Erreur interne lors de l’insertion."];
        }
    }

    /* ------------------------------
       Modifier un aéroport
       ------------------------------ */
    public function updateAeroport($id, $nom, $latitude, $longitude, $codeCommercial) {
        try {
            $id = (int)$id;
            $nom = $this->cleanString($nom);
            $latitude = (float)$latitude;
            $longitude = (float)$longitude;
            $codeCommercial = $this->cleanString($codeCommercial);

            $sql = "UPDATE aeroport
                    SET nom_Aeroport = ?, 
                        latitude_Aeroport = ?, 
                        longitude_Aeroport = ?, 
                        codeCommercial_Aeroport = ?
                    WHERE id_Aeroport = ?";

            $stmt = $this->pdo->prepare($sql);

            return $stmt->execute([$nom, $latitude, $longitude, $codeCommercial, $id]);

        } catch (Exception $e) {
            return ["error" => "Erreur interne lors de la modification."];
        }
    }

    /* ------------------------------
       Supprimer un aéroport
       ------------------------------ */
    public function deleteAeroport($id) {
        try {
            $id = (int)$id;

            $sql = "DELETE FROM aeroport WHERE id_Aeroport = ?";
            $stmt = $this->pdo->prepare($sql);

            return $stmt->execute([$id]);

        } catch (Exception $e) {
            return ["error" => "Erreur interne lors de la suppression."];
        }
    }
}
