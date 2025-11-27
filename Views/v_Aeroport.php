<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des Aéroports</title>
    <link rel="stylesheet" href="Models/css/gestion.css">
</head>

<body>
    <header>
        <?php include("includes/navbar.php"); ?>
    </header>

    <h2>Liste des Aéroports</h2>

    <div class="mouvement-container">

        <div class="mouvement-header">
            <span>Liste des aéroports enregistrés</span>
            <a class="btn btn-add" href="index.php?uc=creerAeroport">
                + Ajouter un aéroport
            </a>
        </div>

        <table class="mouvement-table">
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Latitude</th>
                    <th>Longitude</th>
                    <th>Code</th>
                    <th>Actions</th>
                </tr>
            </thead>

            <tbody>
                <?php if (!empty($aeroports)): ?>
                    <?php foreach ($aeroports as $aeroport): ?>
                        <tr>
                            <td><?= htmlspecialchars($aeroport['nom_Aeroport']) ?></td>
                            <td><?= htmlspecialchars($aeroport['latitude_Aeroport']) ?></td>
                            <td><?= htmlspecialchars($aeroport['longitude_Aeroport']) ?></td>
                            <td><?= htmlspecialchars($aeroport['codeCommercial_Aeroport']) ?></td>

                            <td class="mouvement-actions">
                                <a class="btn btn-update"
                                   href="index.php?uc=modifierAeroport&id=<?= $aeroport['id_Aeroport'] ?>">
                                    Update
                                </a>

                                <a class="btn btn-delete"
                                   href="index.php?uc=deleteAeroport&id=<?= $aeroport['id_Aeroport'] ?>">
                                    Delete
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>

                <?php else: ?>
                    <tr>
                        <td colspan="5" style="text-align:center; padding:15px;">
                            Aucun aéroport enregistré.
                        </td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>

    </div>
</body>
</html>