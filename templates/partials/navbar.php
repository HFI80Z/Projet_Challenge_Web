<nav>
    <ul>
        <li><a href="/">Accueil</a></li>
        <li><a href="/reservation">Réservation</a></li>
        <li><a href="/categorie">Catégorie</a></li>
        <li><a href="/contact">Nous contacter</a></li>
        <?php if (isset($_SESSION['user_id'])): ?>
            <li><a href="/deconnexion">Déconnexion</a></li>
        <?php else: ?>
            <li><a href="/connexion">Connexion</a></li>
            <li><a href="/inscription">Inscription</a></li>
        <?php endif; ?>
    </ul>
</nav>
