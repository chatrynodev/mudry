<?php
function verifierTypeEmployer($pdo, $idEmployer)
{
    // Vérifier si technicien
    $sqlTech = "SELECT id_Employer FROM technicien WHERE id_Employer = :id";
    $stmtTech = $pdo->prepare($sqlTech);
    $stmtTech->execute([':id' => $idEmployer]);

    if ($stmtTech->fetch()) {
        return "technicien";
    }

    // Vérifier si commercial
    $sqlCom = "SELECT id_Employer FROM commercial WHERE id_Employer = :id";
    $stmtCom = $pdo->prepare($sqlCom);
    $stmtCom->execute([':id' => $idEmployer]);

    if ($stmtCom->fetch()) {
        return "commercial";
    }

    // Sinon aucun des deux
    return "aucun";
}


$type = verifierTypeEmployer($pdo, 3);
echo $type; // technicien, commercial ou aucun