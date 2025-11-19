<h2>Créer un mouvement</h2>

<form method="POST" action="index.php?uc=mouvement&action=confirmAdd">

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

    <label>ID Avion :</label>
    <input type="number" name="id_Avion" required><br>

    <label>Aéroport Arrivée :</label>
    <input type="number" name="id_Aeroport_Arrivee" required><br>

    <label>Aéroport Départ :</label>
    <input type="number" name="id_Aeroport_Depart" required><br>

    <button type="submit">Ajouter</button>
</form>
