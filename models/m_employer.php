<?php

class ModelEmployer {

    private $pdo;

    public function __construct()
    {
        $this->pdo = PdoMudry::getPdoMudry()->getConnexion();
    }

    private function cleanString($value) {
        return htmlspecialchars(trim($value), ENT_QUOTES, 'UTF-8');
    }

    public function getAllEmployers() {
        try {
            $sql = "SELECT * FROM employer ORDER BY nom_Employer ASC";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);

        } catch (Exception $e) {
            return ["error" => "Erreur interne."];
        }
    }
    /* ------------------------------
       Récupérer un Employé par ID
       ------------------------------ */
    public function getEmployerById($id) {
        try {
            $id = (int)$id;

            $sql = "SELECT * FROM employer WHERE id_Employer = ?";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([$id]);

            return $stmt->fetch(PDO::FETCH_ASSOC);

        } catch (Exception $e) {
            return ["error" => "Erreur interne lors de la récupération d’un employer."];
        }
    }

    public function ajouterEmployer($tel, $nom, $prenom) {
        try {
            $tel = (int)$tel;
            $nom = $this->cleanString($nom);
            $prenom = $this->cleanString($prenom);

            $sql = "INSERT INTO employer (tel_Employer, nom_Employer, prenom_Employer)
                    VALUES (?, ?, ?)";
            $stmt = $this->pdo->prepare($sql);
            return $stmt->execute([$tel, $nom, $prenom]);

        } catch (Exception $e) {
            return ["error" => "Erreur interne."];
        }
    }

    public function modifierEmployer($id, $tel, $nom, $prenom) {
        try {
            $id = (int)$id;
            $tel = (int)$tel;
            $nom = $this->cleanString($nom);
            $prenom = $this->cleanString($prenom);

            $sql = "UPDATE employer
                    SET tel_Employer = ?, nom_Employer = ?, prenom_Employer = ?
                    WHERE id_Employer = ?";
            $stmt = $this->pdo->prepare($sql);
            return $stmt->execute([$tel, $nom, $prenom, $id]);

        } catch (Exception $e) {
            return ["error" => "Erreur interne."];
        }
    }

    public function supprimerEmployer($id) {
        try {
            $id = (int)$id;

            $sql = "DELETE FROM employer WHERE id_Employer = ?";
            $stmt = $this->pdo->prepare($sql);
            return $stmt->execute([$id]);

        } catch (Exception $e) {
            return ["error" => "Erreur interne."];
        }
    }

    // Retourne l'ID inséré en dernier par la connexion PDO
    public function getLastInsertedId() {
        try {
            return $this->pdo->lastInsertId();
        } catch (Exception $e) {
            return false;
        }
    }

    public function getEmployeExistInEquipage($id) {
        try {
            $id = (int)$id;

            $sql = "SELECT COUNT(*) AS count FROM equipage WHERE id_Employer = ?";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([$id]);
            $result = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($result['count'] > 0) {
                return true; // L'employé existe dans equipage
            } else {
                return false; // L'employé n'existe pas dans equipage
            }

        } catch (Exception $e) {
            return ["error" => "Erreur interne."];
        }
    }
}
