<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Supprimer un employé</title>
    <link rel="stylesheet" href="/mudry/Models/css/gestion.css">
</head>
<body>
<header>
   <?php //include("includes/navbar.php"); ?>      
</header>

<h1>Supprimer un employé</h1>

<p>Es-tu sûr de vouloir supprimer l'employé suivant :</p>

<ul>
    <li>
        <strong>Nom : </strong> 
        <?= htmlspecialchars($employer['nom_Employer']) ?>
    </li>
    <li>
        <strong>Prénom : </strong> 
        <?= htmlspecialchars($employer['prenom_Employer']) ?>
    </li>
    <li>
        <strong>Numéro de téléphone : </strong> 
        <?= htmlspecialchars($employer['tel_Employer']) ?>
    </li>
</ul>

<form method="POST" action="index.php?uc=supprimerEmployer&action=confirmer">
    <input type="hidden" name="id" value="<?= $employer['id_Employer'] ?>">

    <p>Voulez-vous vraiment supprimer cet employé ?</p>

    <button type="submit">Oui</button>
    <button href="index.php?uc=voirEmployer&action=liste">Non</button>
</form>

</body>
</html>
