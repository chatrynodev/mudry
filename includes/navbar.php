<style>
/* NAVBAR */
nav {
    background-color: #0054a6;
    padding: 10px 20px;

    display: flex;
    justify-content: space-between; /* Logo à gauche, menu à droite */
    align-items: center;

    height: 90px; /* fixe la hauteur de la barre */
}

/* Logo */
.logoNav {
    height: 60px;
}

/* Liste des liens */
.listeNav {
    display: flex;
    gap: 40px;
    list-style: none;
    margin: 0;
    padding: 0;
}

/* Style des liens */
.listeNav li {
    text-align: center;
}

.listeNav li a {
    color: white;
    text-decoration: none;
    font-family: 'Chewy', sans-serif;
    font-weight: 700;
    line-height: 18px; /* pour les textes sur 2 lignes */
    font-size: 19px;
}
</style>

<nav>
    <img src="images/logo.png" alt="Logo de la compagnie aérienne" class="logoNav">
    <ul class="listeNav">
        <li><a href="index.php?uc=voirAvion&action=liste">Nos<br>Avions</a></li>
        <li><a href="index.php?uc=voirMouvement&action=liste">Nos<br>Vols</a></li>
        <li><a href="index.php?uc=voirAeroport&action=liste">Nos<br>Aéroports</a></li>
        <li><a href="index.php?uc=voirEmployer&action=liste">Nos<br>Employés</a></li>
        <li><a href="index.php?uc=deconnexion">Déconnexion</a></li>
    </ul>
</nav>
