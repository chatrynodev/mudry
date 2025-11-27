<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employés</title>
    <link rel="stylesheet" href="/mudry/Models/css/gestion.css">
</head>

<body>
<header>
   <?php //include("includes/navbar.php"); ?>      
</header>
<h2>Liste des employés</h2>

<?php
    if (isset($_SESSION['message'])){
        echo "<div class='message'><p>" . htmlspecialchars($_SESSION['message']) . "</p></div>";
        unset($_SESSION['message']);
    }
?>

<div class="employer-container">
    <div class="employer-header">
        <span>Liste des employés enregistrés</span>
        <a class="btn btn-add" href="index.php?uc=ajouterEmployer&action=formAdd">
            + Ajouter un employé
        </a>
    </div>

    <table class="employer-table">
        <tr>
            <th>ID</th>
            <th>Nom</th>
            <th>Prénom</th>
            <th>Numéro de téléphone</th>
        </tr>

        <?php if (!empty($lesEmployers) && is_array($lesEmployers)) : ?>
            <?php foreach($lesEmployers as $employer) : ?>
            <tr>
                <td><?= $employer['id_Employer'] ?></td>
                <td><?= $employer['nom_Employer'] ?></td>
                <td><?= $employer['prenom_Employer'] ?></td>
                <td><?= $employer['tel_Employer'] ?></td>

                <td class="employer-actions">
                    <a class="btn btn-update"
                       href="index.php?uc=modifierEmployer&action=formUpdate&id_Employer=<?= $employer['id_Employer'] ?>">
                        Modifier
                    </a>
                    <a class="btn btn-delete"
                       href="index.php?uc=supprimerEmployer&action=supprimer&id_Employer=<?= $employer['id_Employer'] ?>">
                        Supprimer
                    </a>
                </td>
            </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr><td colspan="5">Aucun employé trouvé.</td></tr>
        <?php endif; ?>
    </table>

</div>
