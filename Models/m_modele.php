<?php
class ModeleModel
{
    private $pdo;

    public function __construct()
    {
        // On récupère l’instance PDO
        $this->pdo = PdoMudry::getPdoMudry()->getConnexion();
    }

    public function getAllModeles()
    {
        $sql = "SELECT * FROM modele ORDER BY id_Modele ASC";
        $req = $this->pdo->query($sql);
        return $req->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getAllRoles()
    {
        $sql = "SELECT id_Role, libelle_Role FROM role ORDER BY libelle_Role";
        $req = $this->pdo->query($sql);
        return $req->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getModeleById($id)
    {
        // 🟢 Correction IONOS : table en minuscules
        $sql = "SELECT * FROM modele WHERE id_Modele = ?";
        $req = $this->pdo->prepare($sql);
        $req->execute([$id]);
        return $req->fetch(PDO::FETCH_ASSOC);
    }

    /**
     * Retourne les rôles associés à un modèle.
     */
    public function getRoleForModele($id_Modele)
    {
        // Si id_Modele invalide -> renvoyer tableau vide
        if (empty($id_Modele) || !is_numeric($id_Modele)) {
            return [];
        }

        $sql = "SELECT r.id_Role, r.libelle_Role, a.nbMin_Role
                FROM role r
                INNER JOIN assigner a ON a.id_Role = r.id_Role
                WHERE a.id_Modele = ?
                ORDER BY r.libelle_Role";
        $req = $this->pdo->prepare($sql);
        $req->execute([$id_Modele]);
        return $req->fetchAll(PDO::FETCH_ASSOC);
    }

    public function creerModele($libelle_Modele, $nbSiegeMax_Modele) {
        $sql = 'INSERT INTO modele (libelle_Modele, nbSiegeMax_Modele)
                VALUES (:libelle, :nbSiegeMax)';
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            ':libelle' => $libelle_Modele,
            ':nbSiegeMax' => $nbSiegeMax_Modele
        ]);
        return $this->pdo->lastInsertId();
    }

    /**
     * Assigne un ou plusieurs roles à un modèle avec leurs quantités.
     * Remplace les assignations existantes pour éviter les doublons.
     * @param int $id_Modele
     * @param array $rolesAvecQte Format: ['id_role' => quantite, ...]
     */
    public function assignRolesToModele($id_Modele, $rolesAvecQte) {
        if (empty($id_Modele)) return;

        // Supprimer les anciennes assignations
        $sqlDel = 'DELETE FROM assigner WHERE id_Modele = :id_Modele';
        $stmtDel = $this->pdo->prepare($sqlDel);
        $stmtDel->execute([':id_Modele' => $id_Modele]);

        // Insérer les nouvelles assignations avec quantités
        $sqlIns = 'INSERT INTO assigner (id_Modele, id_Role, nbMin_Role) VALUES (:id_Modele, :id_Role, :nbMin_Role)';
        $stmtIns = $this->pdo->prepare($sqlIns);
        foreach ($rolesAvecQte as $idRole => $quantite) {
            if (!is_numeric($idRole)) continue;
            $stmtIns->execute([
                ':id_Modele' => $id_Modele,
                ':id_Role' => intval($idRole),
                ':nbMin_Role' => intval($quantite)
            ]);
        }
    }

    public function modifierModele($id_Modele, $libelle_Modele, $nbSiegeMax_Modele) {
        $sql = 'UPDATE modele
                SET libelle_Modele = :libelle_Modele,
                    nbSiegeMax_Modele = :nbSiegeMax_Modele
                WHERE id_Modele = :id_Modele';
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            ':libelle_Modele' => $libelle_Modele,
            ':nbSiegeMax_Modele' => $nbSiegeMax_Modele,
            ':id_Modele' => $id_Modele,
        ]);
    }

    public function supprimerModele($id_Modele)
    {
        // 🟢 Correction IONOS : table en minuscules
        $sql = 'DELETE FROM modele WHERE id_Modele = :id_Modele';
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            ':id_Modele' => $id_Modele
        ]);
    }
}
