<?php

class EmployerModel {

    private $pdo;

    public function __construct(PDO $pdo) {
        $this->pdo = $pdo;
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

    public function insertEmployer($tel, $nom, $prenom) {
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

    public function updateEmployer($id, $tel, $nom, $prenom) {
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

    public function deleteEmployer($id) {
        try {
            $id = (int)$id;

            $sql = "DELETE FROM employer WHERE id_Employer = ?";
            $stmt = $this->pdo->prepare($sql);
            return $stmt->execute([$id]);

        } catch (Exception $e) {
            return ["error" => "Erreur interne."];
        }
    }
}
