<?php

class ModeleModel {

    private $pdo;

    public function __construct(PDO $pdo) {
        $this->pdo = $pdo;
    }

    private function cleanString($v) {
        return htmlspecialchars(trim($v), ENT_QUOTES, 'UTF-8');
    }

    public function getAll() {
        try {
            $sql = "SELECT * FROM modele ORDER BY libelle_Modele ASC";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch(Exception $e) { return ["error"=>"Erreur interne."]; }
    }

    public function insert($libelle, $nbSiege) {
        try {
            $libelle = $this->cleanString($libelle);
            $nbSiege = (int)$nbSiege;

            $sql = "INSERT INTO modele (libelle_Modele, nbSiegeMax_Modele) VALUES (?,?)";
            $stmt = $this->pdo->prepare($sql);
            return $stmt->execute([$libelle,$nbSiege]);

        } catch(Exception $e){ return ["error"=>"Erreur interne."]; }
    }

    public function update($id, $libelle, $nbSiege) {
        try {
            $id = (int)$id;
            $libelle = $this->cleanString($libelle);
            $nbSiege = (int)$nbSiege;

            $sql = "UPDATE modele SET libelle_Modele=?, nbSiegeMax_Modele=? WHERE id_Modele=?";
            $stmt = $this->pdo->prepare($sql);
            return $stmt->execute([$libelle,$nbSiege,$id]);

        } catch(Exception $e){ return ["error"=>"Erreur interne."]; }
    }

    public function delete($id) {
        try {
            $id = (int)$id;
            $sql = "DELETE FROM modele WHERE id_Modele=?";
            $stmt = $this->pdo->prepare($sql);
            return $stmt->execute([$id]);

        } catch(Exception $e){ return ["error"=>"Erreur interne."]; }
    }
}
