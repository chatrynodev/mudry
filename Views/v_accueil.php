<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mudry</title>
    <link rel="stylesheet" href="/Models/css/style.css">
</head>

<body>

    <!-- HEADER -->
    <header>
        <?php include("includes/navbar.php"); ?>
        
        <h1>MUDRY</h1>
        <img src="/Models/images/avion fond accueil.png" class="header-img" alt="">
    </header>

    <!-- PRESENTATION -->
    <section class="presentation">
        <h2>PRÉSENTATION DE MUDRY</h2>

        <div class="text-img">
            <p>
                Mudry est une entreprise aéronautique reconnue à l’échelle internationale.
                Depuis sa création, elle se distingue par son innovation et sa fiabilité.
                La société exploite plusieurs aéroports dans le monde et propose un large choix
                d’avions modernes. Grâce à l’expertise de ses équipes, Mudry fait partie des leaders
                du secteur aérien et garantit des vols toujours plus confortables et sécurisés.
            </p>

            <img src="aeroport.jpg" alt="">
        </div>

        <button class="btn">En savoir plus</button>
    </section>

    <!-- SERVICES -->
    <section class="services">
        <div class="services-content">

            <img src="fiche.jpg" class="left-img" alt="">

            <div class="right-text">
                <p>
                    L’entreprise Mudry possède une gamme d’avions conçus pour les performances,
                    fiabilité et élégance :
                </p>
                <ul>
                    <li>Mudry Air 200</li>
                    <li>Mudry Falcon 95</li>
                    <li>Mudry C-47</li>
                    <li>Mudry Sky 220</li>
                </ul>

                <p>
                    Ces avions performants permettent à la compagnie Mudry
                    d’assurer la sécurité maximale,
                    l’innovation et l’excellence technique.
                </p>

                <button class="btn-dark">En savoir plus</button>
            </div>
        </div>
    </section>

    <!-- FOOTER -->
    <footer>

        <div class="footer-columns">

            <div>
                <h3>Contactez-nous</h3>
                <p>Entreprise Mudry</p>
                <p>01 23 45 67 89</p>
                <p>contact@mudry.fr</p>
            </div>

            <div>
                <h3>Plan du site</h3>
                <p>Nos avions</p>
                <p>Nos vols</p>
                <p>Nos aéroports</p>
                <p>Notre compagnie</p>
            </div>

            <div>
                <h3>Nos prestations</h3>
                <p>Vols internationaux</p>
                <p>Locations de hangars</p>
                <p>Maintenance technique</p>
            </div>
        </div>

        <p class="copy">© 2025 • Compagnie Mudry. Tous droits réservés.</p>

    </footer>

</body>
</html>
