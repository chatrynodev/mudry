<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Modifier un Employé</title>
    <link rel="stylesheet" href="Models/css/gestion.css">
</head>

<body>
<header>
   <?php include("includes/navbar.php"); ?>      
</header>

<h2>Modifier un employé : </h2>

<div class="employer-container">

<form method="POST" action="index.php?uc=modifierEmployer&action=confirmUpdateEmployer">

    <label>Nom :</label>
    <input type="text" name="nom_Employer" value="<?= $employer['nom_Employer'] ?>"><br>

    <label>Prénom :</label>
    <input type="text" name="prenom_Employer" value="<?= $employer['prenom_Employer'] ?>"><br>

    <label>Numéro de téléphone :</label>
    <input type="number" name="tel_Employer" value="<?= $employer['tel_Employer'] ?>"><br>

    <!-- MENU DÉROULANT QUALIFICATION EMPLOYE -->
    <label for="">Type d'employé : </label>
    <input type="text" value="<?= $role ?>" disabled><br>


    <?php if ($role === 'technicien'): ?>
        <!-- CHAMPS SUPPLÉMENTAIRE POUR TECHNICIEN -->
        <label>Nombre d'heures de vol (pour technicien) :</label>
        <input type="number" name="nb_Heures" value="<?= $role === 'technicien' ? $employer['nb_Heures'] : '' ?>"><br>
    <?php endif; ?>

    <?php if ($role === 'commercial'): ?>
        <!-- CHAMPS SUPPLÉMENTAIRE POUR COMMERCIAL -->
        <label>Langues parlées : </label>
        <?php foreach ($lesLangues as $langue): ?>
            <br>
            <label for="">
                <input
                    type="checkbox"
                    name="langues[]"
                    value="<?= $langue["id_Langue"] ?>"
                    class="choixUnique"
                    <?= in_array($langue["id_Langue"], $employer['langues']) ? 'checked' : '' ?>
                >
                <?= $langue["libelle_Langue"] ?>
            </label>
        <?php endforeach; ?>
        <br>
    <?php endif; ?>

    <input type="hidden" name="id_Employer" value="<?= $employer['id_Employer'] ?>">
    <input type="hidden" name="role" value="<?= $role ?>">

    <button type="submit" class="btn btn-add">Modifier</button>

</form>

</div>
</body>
</html>