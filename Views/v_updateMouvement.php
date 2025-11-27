<header>
    <?php include("includes/navbar.php"); ?>      
</header>

<h2>Modifier un mouvement</h2>

<div class="mouvement-container">

<form method="POST" action="index.php?uc=updateMouvement&action=confirmUpdate">

    <input type="hidden" name="num_Mouv" value="<?= $unMouv['num_Mouv'] ?>">

    <label>Numéro de vol :</label>
    <input type="text" name="num_Vol" value="<?= $unMouv['num_Vol'] ?>" required><br>

    <label>Distance :</label>
    <input type="number" step="0.01" name="distance" value="<?= $unMouv['distance_Mouv'] ?>"><br>

    <label>Nombre de passagers :</label>
    <input type="number" name="nbPassager" value="<?= $unMouv['nb_PassagerMouv'] ?>"><br>

    <label>Date départ :</label>
    <input type="date" name="date_Depart" value="<?= $unMouv['date_Depart'] ?>"><br>

    <label>Date arrivée :</label>
    <input type="date" name="date_Arrive" value="<?= $unMouv['date_Arrive'] ?>"><br>

    <label>Durée :</label>
    <input type="text" name="duree" value="<?= $unMouv['duree'] ?>"><br>

    <!-- AVION -->
    <label>Avion :</label>
    <select name="id_Avion" required>
        <?php foreach ($lesAvions as $avion): ?>
            <option value="<?= $avion['id_Avion'] ?>"
                <?= ($avion['id_Avion'] == $unMouv['id_Avion']) ? 'selected' : '' ?>>
                <?= $avion['id_Avion'] ?> — <?= htmlspecialchars($avion['codeInterne_Avion']) ?>
            </option>
        <?php endforeach; ?>
    </select><br>

    <!-- ARRIVÉE -->
    <label>Aéroport Arrivée :</label>
    <select name="id_Aeroport_Arrivee" required>
        <?php foreach ($lesAeroports as $aero): ?>
            <option value="<?= $aero['id_Aeroport'] ?>"
                <?= ($aero['id_Aeroport'] == $unMouv['id_Aeroport_Arrivee']) ? 'selected' : '' ?>>
                <?= htmlspecialchars($aero['nom_Aeroport']) ?> (<?= $aero['codeCommercial_Aeroport'] ?>)
            </option>
        <?php endforeach; ?>
    </select><br>

    <!-- DÉPART -->
    <label>Aéroport Départ :</label>
    <select name="id_Aeroport_Depart" required>
        <?php foreach ($lesAeroports as $aero): ?>
            <option value="<?= $aero['id_Aeroport'] ?>"
                <?= ($aero['id_Aeroport'] == $unMouv['id_Aeroport_Depart']) ? 'selected' : '' ?>>
                <?= htmlspecialchars($aero['nom_Aeroport']) ?> (<?= $aero['codeCommercial_Aeroport'] ?>)
            </option>
        <?php endforeach; ?>
    </select><br>

    <button type="submit" class="btn btn-update">Mettre à jour</button>

</form>

</div>
