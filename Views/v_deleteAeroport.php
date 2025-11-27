<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Supprimer un Aéroport</title>
    <link rel="stylesheet" href="Models/css/gestion.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
<header>
   <?php include("includes/navbar.php"); ?>      
</header>
<h1>Supprimer un Aéroport</h1>

<p>Es-tu sûr de vouloir supprimer l'aéroport suivant :</p>

<ul>
    <li><strong>Nom :</strong> <?= htmlspecialchars($aeroport['nom_Aeroport']) ?></li>
    <li><strong>Latitude :</strong> <?= htmlspecialchars($aeroport['latitude_Aeroport']) ?></li>
    <li><strong>Longitude :</strong> <?= htmlspecialchars($aeroport['longitude_Aeroport']) ?></li>
    <li><strong>Code Commercial :</strong> <?= htmlspecialchars($aeroport['codeCommercial_Aeroport']) ?></li>
</ul>

<form method="POST" action="index.php?uc=deleteAeroport&action=supprimer">

    <input type="hidden" name="id" value="<?= $aeroport['id_Aeroport'] ?>">

    <button type="submit" style="color: white; background:red;">Supprimer définitivement</button>

    <button type="button" onclick="window.location.href='index.php?uc=voirAeroport&action=liste'">
        Annuler
    </button>

</form>

</body>
</html>
