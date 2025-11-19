<h2>Modifier un mouvement</h2>

<form method="POST" action="index.php?uc=mouvement&action=confirmUpdate">

<input type="hidden" name="num_Mouv" value="<?= $unMouv['num_Mouv'] ?>">

<label>Numéro de vol :</label>
<input type="text" name="num_Vol" value="<?= $unMouv['num_Vol'] ?>"><br>

<label>Distance :</label>
<input type="number" step="0.01" name="distance" value="<?= $unMouv['distance_Mouv'] ?>"><br>

<label>Passagers :</label>
<input type="number" name="nbPassager" value="<?= $unMouv['nb_PassagerMouv'] ?>"><br>

<label>Date départ :</label>
<input type="date" name="date_Depart" value="<?= $unMouv['date_Depart'] ?>"><br>

<label>Date arrivée :</label>
<input type="date" name="date_Arrive" value="<?= $unMouv['date_Arrive'] ?>"><br>

<label>Durée :</label>
<input type="text" name="duree" value="<?= $unMouv['duree'] ?>"><br>

<label>ID Avion :</label>
<input type="number" name="id_Avion" value="<?= $unMouv['id_Avion'] ?>"><br>

<label>Aéroport Arrivée :</label>
<input type="number" name="id_Aeroport_Arrivee" value="<?= $unMouv['id_Aeroport_Arrivee'] ?>"><br>

<label>Aéroport Départ :</label>
<input type="number" name="id_Aeroport_Depart" value="<?= $unMouv['id_Aeroport_Depart'] ?>"><br>

<button type="submit">Modifier</button>
</form>
