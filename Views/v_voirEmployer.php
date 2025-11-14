<div id="employer">
<?php
if (isset($lesEmployers) && is_array($lesEmployers)) {
    foreach ($lesEmployers as $unEmployer)
    {
        $id     = $unEmployer['id_Employer'];
        $nom    = $unEmployer['nom_Employer'];
        $prenom = $unEmployer['prenom_Employer'];
        $tel    = $unEmployer['tel_Employer'];
        ?>
        
        <ul>
            <li><strong><?php echo $prenom . " " . $nom; ?></strong></li>
            <li><?php echo "Téléphone : " . $tel; ?></li>

            <li>
                <a href="index.php?uc=employer&action=voir&id=<?php echo $id; ?>">
                    <img src="images/loupe.png" title="Voir détails" />
                </a>
            </li>

            <li>
                <a href="index.php?uc=employer&action=modifier&id=<?php echo $id; ?>">
                    <img src="images/edit.png" title="Modifier l'employé" />
                </a>
            </li>

            <li>
                <a href="index.php?uc=employer&action=supprimer&id=<?php echo $id; ?>"
                   onclick="return confirm('Supprimer cet employé ?');">
                    <img src="images/delete.png" title="Supprimer" />
                </a>
            </li>

        </ul>
    
    <?php
    }
} else {
    echo "Aucun employé trouvé.";
}
?>
</div>
