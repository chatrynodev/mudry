<?php

class AeroportModel {

    private $pdo;

    public function __construct(PDO $pdo) {
        $this->pdo = $pdo;
    }

    /* ------------------------------
       Nettoyage sécurisée d’une chaîne
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

        } catch (Exception $e) {
            return ["error" => "Erreur interne."];
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
            return ["error" => "Erreur interne."];
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
            return ["error" => "Erreur interne."];
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
            return ["error" => "Erreur interne."];
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
            return ["error" => "Erreur interne."];
        }
    }
}
