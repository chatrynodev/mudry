<header>
   <?php //include("includes/navbar.php"); ?>      
</header>

<h2>Ajouter un employé : </h2>

<div class="employer-container">

<form method="POST" action="index.php?uc=ajouterEmployer&action=confirmAddTechnicien">

    <label>Nom :</label>
    <input type="text" name="nom_Employer"><br>

    <label>Prénom :</label>
    <input type="text" name="prenom_Employer"><br>

    <label>Numéro de téléphone :</label>
    <input type="number" name="tel_Employer"><br>

    <!-- MENU DÉROULANT QUALIFICATION EMPLOYE -->
    <label>Type d'employé :</label>
    <select name="id_Employer" required>
        <option value="">-- Sélectionner un type --</option>
        <option value="commercial">Commercial</option>
        <option value="technicien">Technicien</option>
    </select><br>

    <!-- CHAMPS SUPPLÉMENTAIRE POUR TECHNICIEN -->
    <label>Nombre d'heures de vol (pour technicien) :</label>
    <input type="number" name="nb_Heures"><br>




    <!-- MENU DÉROULANT AÉROPORT ARRIVÉE 
    <label>Aéroport Arrivée :</label>
    <select name="id_Aeroport_Arrivee" required>
        <option value="">-- Sélectionner un aéroport --</option>
        <//?php foreach ($lesAeroports as $aero): ?>
            <option value="<//?= $aero['id_Aeroport'] ?>">
                <//?= htmlspecialchars($aero['nom_Aeroport']) ?> (<//?= $aero['codeCommercial_Aeroport'] ?>)
            </option>
        <//?php endforeach; ?>
    </select><br>

     MENU DÉROULANT AÉROPORT DÉPART 
    <label>Aéroport Départ :</label>
    <select name="id_Aeroport_Depart" required>
        <option value="">-- Sélectionner un aéroport --</option>
        <//?php foreach ($lesAeroports as $aero): ?>
            <option value="<//?= $aero['id_Aeroport'] ?>">
                <//?= htmlspecialchars($aero['nom_Aeroport']) ?> (<//?= $aero['codeCommercial_Aeroport'] ?>)
            </option>
        <//?php endforeach; ?>
    </select><br>-->
    <button type="submit" class="btn btn-add" onclick="validateAeroports()">Ajouter</button>

</form>

</div>
<script src="/mudry/Models/js/script_aeroportMouv.js"></script>