<!doctype html>
<html>

<head>
    <title>Liste des Avions</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <link rel="stylesheet" href="styles.css">

</head>
<body>
    <form action="index.php?uc=creerAvion&action=creationAvion" method="post">
        <p><H1>Liste des Avions</H1></p>

        <table border=3 cellspacing=1>
            <tr>
                <td>Numéro de Série</td>
                <td>Code Interne</td>
            </tr>
            <?php

                foreach ($lesAvions as $unAvion) {
                    $num = $unAvion['numSerie_Avion'];
                    $code = $unAvion['codeInterne_Avion'];
            ?>
                <tr>
                        <td width=150><?php echo $num ?></td>
                        <td width=150><?php echo $code ?></td>
                    <?php

                    ?>
                        <td width=30><a href="index.php?uc=modifierAvion&action=modificationAvion&numSerie=<?php echo $num ?>">Modifier</a></td>
                        <td width=30><a href="index.php?uc=supprimerAvion&action=suppressionAvion&numSerie=<?php echo $num ?>">Supprimer</a></td>
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