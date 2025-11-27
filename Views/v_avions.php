<!doctype html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Liste des Avions</title>
    <link rel="stylesheet" href="/Models/css/gestion.css">
</head>

<body>

<header>
    <?php include("includes/navbar.php"); ?>
</header>

<h2>Liste des Avions</h2>

<div class="mouvement-container">

    <div class="mouvement-header">
        <span>Liste des avions enregistrés</span>
        <a class="btn btn-add" href="index.php?uc=creerAvion&action=formAdd">
            + Ajouter un avion
        </a>
    </div>

    <table class="mouvement-table">
        <thead>
            <tr>
                <th>Numéro de Série</th>
                <th>Code Interne</th>
                <th>Modèle</th>
                <th colspan="2">Actions</th>
            </tr>
        </thead>

        <tbody>
            <?php foreach ($lesAvions as $unAvion): ?>
            <tr>
                <td><?= htmlspecialchars($unAvion['numSerie_Avion']) ?></td>
                <td><?= htmlspecialchars($unAvion['codeInterne_Avion']) ?></td>
                <td><?= htmlspecialchars($unAvion['id_Modele']) ?></td>

                <td class="mouvement-actions">
                    <a class="btn btn-update"
                        href="index.php?uc=modifierAvion&action=modifierAvion&id_Avion=<?= $unAvion['id_Avion'] ?>">
                        Modifier
                    </a>
                </td>

                <td class="mouvement-actions">
                    <a class="btn btn-delete"
                        href="index.php?uc=supprimerAvion&id_Avion=<?= $unAvion['id_Avion'] ?>"
                        onclick="return confirm('Supprimer cet avion ?');">
                        Supprimer
                    </a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <div class="actions-footer">
        <a class="btn btn-add" href="index.php?uc=creerAvion&action=formAdd">
            Créer un nouvel avion
        </a>

        <button type="button" class="btn"
            onclick="window.location.href='index.php?uc=voirModele&action=liste'">
            Voir les modèles
        </button>
    </div>

</div>

</body>
</html>
