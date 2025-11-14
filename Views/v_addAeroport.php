<div id="creationAeroport">
<form method="POST" action="index.php?uc=creerAeroport&action=confirmCreationAeroport">
   <fieldset>
     <legend>Création d'un nouvel aéroport</legend>
		<p>
			<label for="nom">Nom Aéroport*</label>
			<input id="nom" type="text" name="nom" size="30" maxlength="45" required>
		</p>
		<p>
			<label for="latitude">latitude*</label>
		    <input id="latitude" type="text" name="latitude" size="30" maxlength="45" required>
		</p>
		<p>
         <label for="longitude">longitude* </label>
         <input id="longitude" type="text" name="longitude" size="10" maxlength="10" required>
      </p>
      <p>
         <label for="codeCommercial_Aeroport">Code Commercial de l'aeroport</label>
         <input id="codeCommercial_Aeroport" type="text" name="codeCommecial_Aeroport"  size="40" maxlength="40" required>
      </p> 
	  	<p>
         <input type="submit" value="Valider" name="valider">
         <input type="reset" value="Annuler" name="annuler"> 
      </p>
</form>
</div>
