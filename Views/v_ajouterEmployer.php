<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Ajouter un Employé</title>
    <link rel="stylesheet" href="/mudry/Models/css/gestion.css">
</head>

<body>
<header>
   <?php //include("includes/navbar.php"); ?>  
</header>

<h2>Ajouter un employé : </h2>

<div class="employer-container">

<form method="POST" action="index.php?uc=ajouterEmployer&action=confirmAddEmployer">

    <label>Nom :</label>
    <input type="text" name="nom_Employer"><br>

    <label>Prénom :</label>
    <input type="text" name="prenom_Employer"><br>

    <label>Numéro de téléphone :</label>
    <input type="number" name="tel_Employer"><br>

    <!-- MENU DÉROULANT QUALIFICATION EMPLOYE -->
    <label for="">Sélectionner le type d'employé : </label><br>
    <label>
        <input type="radio" name="role" value="technicien">
        Technicien
    </label><br>

    <label>
        <input type="radio" name="role" value="commercial">
        Commercial
    </label><br>

    <!-- CHAMPS SUPPLÉMENTAIRE POUR TECHNICIEN -->
    <label>Nombre d'heures de vol (pour technicien) :</label>
    <input type="number" name="nb_Heures"><br>

    <!-- CHAMPS SUPPLÉMENTAIRE POUR COMMERCIAL -->
    <label>Langues parlées : </label>
    <?php foreach ($lesLangues as $langue): ?>
        <br>
        <label for="">
            <input type="checkbox" name="langues[]" value="<?= $langue["id_Langue"] ?>" class="choixUnique">
            <?= $langue["libelle_Langue"] ?>
        </label>
    <?php endforeach; ?>
    <br>

    
    <button type="submit" class="btn btn-add">Ajouter</button>

</form>

</div>
</body>
</html>