<!doctype html>
<html>

<head>
    <title>Liste des Avions</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <link rel="stylesheet" href="styles.css">

</head>
<body>
    <form action="index.php?uc=creerAvion&action=creerAvion" method="post">
        <p><H1>Liste des Avions</H1></p>

        <table border=3 cellspacing=1>
            <tr>
                <td>Numéro de Série</td>
                <td>Code Interne</td>
                <td>Modèle</td>
                <td colspan="2">Actions</td>
            </tr>
            <?php

                foreach ($lesAvions as $unAvion) 
                {
                    $num = $unAvion['numSerie_Avion'];
                    $code = $unAvion['codeInterne_Avion'];
                    $modele = $unAvion['id_Modele'];
            ?>
                <tr>
                        <td width=150><?php echo $num ?></td>
                        <td width=150><?php echo $code ?></td>
                        <td width=150><?php echo $modele ?></td>
                    <?php

                    ?>
                        <td width=30><a href="index.php?uc=modifierAvion&action=modifierAvion&id_Avion=<?php echo $unAvion['id_Avion'] ?>">Modifier</a></td>
                        <td width=30><a href="index.php?uc=supprimerAvion&action=supprimerAvion&id_Avion=<?php echo $unAvion['id_Avion'] ?>">Supprimer</a></td>
                </tr>
                <?php
            }
            ?>
            </table>
            </br>

            <input type="submit" value="Créer un nouvel avion">
    </form>
</body>
</html>