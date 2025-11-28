<!doctype html>
<html>

<head>
    <title>Gestion employés</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <link rel="stylesheet" href="Models/css/gestion.css">

</head>
<body>

<header>
   <?php include("includes/navbar.php"); ?>      
</header>
<div id="ajoutEmployer">
<form method="POST" action="index.php?uc=gererEmployer&action=confirmerEmployer">
   <fieldset>
     <legend>Ajout d'un employer</legend>
		<p>
			<label for="nom">Nom*</label>
			<input id="nom" type="text" name="nom" value="<?php echo $nom ?>" size="30" maxlength="45">
		</p>
        <p>
			<label for="nom">Prénom*</label>
			<input id="nom" type="text" name="nom" value="<?php echo $nom ?>" size="30" maxlength="45">
		</p>
		<p>
			<label for="rue">Numéro de téléphone*</label>
		    <input id="rue" type="text" name="tel" value="<?php echo $tel ?>" size="15" maxlength="15">
		</p>
	  	<p>
         <input type="submit" value="Valider" name="valider">
         <input type="reset" value="Annuler" name="annuler"> 
      </p>
</form>
</div>