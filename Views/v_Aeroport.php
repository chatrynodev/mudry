<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aeroport</title>
</head>
<body>
    <h1>Détails des Aéroports</h1>

    <?php foreach ($aeroports as $aeroport): ?>
        <p><strong>Nom :</strong> <?= htmlspecialchars($aeroport['nom_Aeroport']) ?></p>
        <p><strong>Latitude :</strong> <?= htmlspecialchars($aeroport['latitude_Aeroport']) ?></p>
        <p><strong>Longitude :</strong> <?= htmlspecialchars($aeroport['longitude_Aeroport']) ?></p>
        <p><strong>Code Commercial :</strong> <?= htmlspecialchars($aeroport['codeCommercial_Aeroport']) ?></p>
    <?php endforeach; ?>
    <button onclick="window.location.href='index.php?uc=cAeroport'">Créer un nouvel Aéroport</button>
</body>
</html>