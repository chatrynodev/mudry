<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter Mouvement</title>
    <link rel="stylesheet" href="Models/css/gestion.css">
</head>
<body>
<header>
   <?php include("includes/navbar.php"); ?>      
</header>

<h2>Créer un mouvement</h2>

<div class="mouvement-container">

<form method="POST" action="index.php?uc=addMouvement&action=confirmAdd">

    <label>Numéro de vol :</label>
    <input type="text" name="num_Vol" required><br>

    <label>Distance :</label>
    <input type="number" step="0.01" name="distance"><br>

    <label>Nombre de passagers :</label>
    <input type="number" name="nbPassager"><br>

    <label>Date départ :</label>
    <input type="date" name="date_Depart"><br>

    <label>Date arrivée :</label>
    <input type="date" name="date_Arrive"><br>

    <label>Durée :</label>
    <input type="text" name="duree"><br>

    <!-- MENU DÉROULANT DES AVIONS -->
    <label>Avion (modèle & numéro de série) :</label>
    <select name="id_Avion" required>
        <option value="">-- Sélectionner un avion --</option>
        <?php foreach ($lesAvions as $avion): ?>
            <option value="<?= $avion['id_Avion'] ?>">
                <?= $avion['id_Avion'] ?> — <?= htmlspecialchars($avion['codeInterne_Avion']) ?>
            </option>
        <?php endforeach; ?>
    </select><br>

    <!-- MENU DÉROULANT AÉROPORT ARRIVÉE -->
    <label>Aéroport Arrivée :</label>
    <select name="id_Aeroport_Arrivee" required>
        <option value="">-- Sélectionner un aéroport --</option>
        <?php foreach ($lesAeroports as $aero): ?>
            <option value="<?= $aero['id_Aeroport'] ?>">
                <?= htmlspecialchars($aero['nom_Aeroport']) ?> (<?= $aero['codeCommercial_Aeroport'] ?>)
            </option>
        <?php endforeach; ?>
    </select><br>

    <!-- MENU DÉROULANT AÉROPORT DÉPART -->
    <label>Aéroport Départ :</label>
    <select name="id_Aeroport_Depart" required>
        <option value="">-- Sélectionner un aéroport --</option>
        <?php foreach ($lesAeroports as $aero): ?>
            <option value="<?= $aero['id_Aeroport'] ?>">
                <?= htmlspecialchars($aero['nom_Aeroport']) ?> (<?= $aero['codeCommercial_Aeroport'] ?>)
            </option>
        <?php endforeach; ?>
    </select><br>
    <button type="submit" class="btn btn-add">Ajouter</button>

</form>

</div>
</body>
</html>