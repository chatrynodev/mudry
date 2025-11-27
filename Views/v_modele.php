<!doctype html>
<html>

<head>
    <title>Liste des Modèles</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <link rel="stylesheet" href="/Models/css/gestion.css">

</head>
<body>
    <form action="index.php?uc=creerModele&action=creerModele" method="post">
        <div class="mouvement-header">
        <p><h2>Liste des Modèles</h2></p>
        </div>

        <table class="mouvement-table" border=3 cellspacing=1>
            <tr>
                <th>Nom du modèle</th>
                <th>Nombre de sièges maximum</th>
                <th colspan="2">Actions</th>
            </tr>
            <?php

                foreach ($lesModeles as $unModele) 
                {
                    $nom = $unModele['libelle_Modele'];
                    $nbSieges = $unModele['nbSiegeMax_Modele'];
            ?>
                <tr>
                        <td width=150><?php echo $nom ?></td>
                        <td width=150><?php echo $nbSieges ?></td>
                    <?php

                    ?>
                        <td class="mouvement-actions">
                            <a class="btn btn-update"
                                href="index.php?uc=modifierModele&action=modifierModele&id_Modele=<?php echo $unModele['id_Modele'] ?>">Modifier</a></td>

                        <td class="mouvement-actions">
                            <a class="btn btn-delete"
                                href="index.php?uc=supprimerModele&id_Modele=<?php echo $unModele['id_Modele'] ?>">Supprimer</a></td>
                </tr>
                <?php
            }
            ?>
            </table>
            </br>

            <input class="btn" type="submit" value="Créer un nouveau modèle">
            
    </form>
        </br>
    <button type="button" class="btn" onclick="window.location.href='index.php?uc=voirAvion&action=liste'">
        Voir les avions
    </button>
</body>
</html>
