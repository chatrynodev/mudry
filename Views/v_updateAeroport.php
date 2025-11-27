<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Modifier un Aéroport</title>
    <link rel="stylesheet" href="/Models/css/gestion.css">
</head>
<body>
<header>
   <?php include("includes/navbar.php"); ?>      
</header>
<h1>Modifier l'Aéroport</h1>

<form method="POST" action="index.php?uc=modifierAeroport&action=confirmerModification">

    <input type="hidden" name="id" value="<?= $aeroport['id_Aeroport'] ?>">

    <p>
        <label>Nom :</label><br>
        <input type="text" name="nom" value="<?= htmlspecialchars($aeroport['nom_Aeroport']) ?>">
    </p>

    <p>
        <label>Latitude :</label><br>
        <input type="text" name="latitude" value="<?= htmlspecialchars($aeroport['latitude_Aeroport']) ?>">
    </p>

    <p>
        <label>Longitude :</label><br>
        <input type="text" name="longitude" value="<?= htmlspecialchars($aeroport['longitude_Aeroport']) ?>">
    </p>

    <p>
        <label>Code Commercial :</label><br>
        <input type="text" name="codeCommercial" value="<?= htmlspecialchars($aeroport['codeCommercial_Aeroport']) ?>">
    </p>

    <p>
        <button type="submit">Enregistrer</button>
        <button type="button" onclick="window.location.href='index.php?uc=voirAeroport&action=liste'">
            Annuler
        </button>
    </p>

</form>

</body>
</html>
