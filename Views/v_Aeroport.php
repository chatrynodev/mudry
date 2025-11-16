<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Aéroports</title>

    <style>
        table {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid #444;
            padding: 10px;
            text-align: center;
        }

        th {
            background-color: #eee;
        }

        button {
            padding: 5px 10px;
            margin: 2px;
            cursor: pointer;
        }
        .update {
            background-color: #ED7E55;
            width: 154px;
            height: 54px;
            border: none;
            border-radius: 55%;
        }
        .delete {
            background-color: #ED0055;
            width: 154px;
            height: 54px;
            border: none;
            border-radius: 55%;
        }
    </style>

</head>
<body>

    <h1 style="text-align:center;">Gestion des Aéroports</h1>

    <table>
        <thead>
            <tr>
                <th>Nom</th>
                <th>Latitude</th>
                <th>Longitude</th>
                <th>Code Commercial</th>
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

                        <td>
                            <button class="update" onclick="window.location.href='index.php?uc=modifierAeroport&id=<?= $aeroport['id_Aeroport'] ?>'">
                                UPDATE
                            </button>

                            <button class="delete" onclick="window.location.href='index.php?uc=supprimerAeroport&id=<?= $aeroport['id_Aeroport'] ?>'">
                                DELETE
                            </button>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="5">Aucun aéroport enregistré.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>

    <div style="text-align:center;">
        <button onclick="window.location.href='index.php?uc=creerAeroport'">
            Créer un nouvel aéroport
        </button>
    </div>

</body>
</html>
