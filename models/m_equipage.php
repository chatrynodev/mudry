<?php

class EquipageModel {
    private $pdo;

    public function __construct()
    {
        // ✔ On récupère l’instance — puis la connexion PDO
        $this->pdo = PdoMudry::getPdoMudry()->getConnexion();
    }
    public function getAllEquipages() {
        return $this->pdo->query("SELECT * FROM equipage")->fetchAll();
    }
    public function deleteRoleFromMouvement($numMouv, $idRole)
{
    $sql = "DELETE FROM equipage WHERE num_Mouv = :mouv AND id_Role = :role";
    $req = $this->pdo->prepare($sql);
    return $req->execute([
        'mouv' => $numMouv,
        'role' => $idRole
    ]);
}
public function deleteAllFromMouvement($numMouv)
{
    $req = $this->pdo->prepare("DELETE FROM equipage WHERE num_Mouv = :num");
    $req->execute(['num' => $numMouv]);
}
    public function getRequiredRolesForMouvement($numMouv) {
        $sql = "
            SELECT r.id_Role, r.libelle_Role, a.nbMin_Role
            FROM mouvement m
            JOIN avion av ON av.id_Avion = m.id_Avion
            JOIN assigner a ON a.id_Modele = av.id_Modele
            JOIN role r ON r.id_Role = a.id_Role
            WHERE m.num_Mouv = :num
        ";

        $req = $this->pdo->prepare($sql);
        $req->execute(['num' => $numMouv]);
        return $req->fetchAll();
    }

    public function getEquipageByMouv($numMouv) {
        $req = $this->pdo->prepare("
            SELECT e.*, r.libelle_Role, em.nom_Employer, em.prenom_Employer
            FROM equipage e
            JOIN role r ON r.id_Role = e.id_Role
            JOIN employer em ON em.id_Employer = e.id_Employer
            WHERE num_Mouv = :num
        ");
        $req->execute(['num' => $numMouv]);
        return $req->fetchAll();
    }

    public function addEquipage($numMouv, $idRole, $idEmployer, $presence) {
        $req = $this->pdo->prepare("
            INSERT INTO equipage (num_Mouv, id_Role, id_Employer, presence)
            VALUES (:mouv, :role, :emp, :presence)
        ");
        return $req->execute([
            'mouv' => $numMouv,
            'role' => $idRole,
            'emp' => $idEmployer,
            'presence' => $presence
        ]);
    }

    public function deleteEquipage($numMouv, $idRole, $idEmployer) {
        $req = $this->pdo->prepare("
            DELETE FROM equipage
            WHERE num_Mouv = :mouv AND id_Role = :role AND id_Employer = :emp
        ");
        return $req->execute([
            'mouv' => $numMouv,
            'role' => $idRole,
            'emp' => $idEmployer
        ]);
    }

    public function getRoles() {
        return $this->pdo->query("SELECT * FROM role")->fetchAll();
    }

    public function getEmployers() {
        return $this->pdo->query("SELECT * FROM employer")->fetchAll();
    }

}
