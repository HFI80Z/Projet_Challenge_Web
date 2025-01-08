<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mon mini-Airbnb</title>
    <link rel="stylesheet" href="/css/style.css">
    <style>
        /* Style du menu utilisateur */
        .user-menu {
            position: relative;
            display: inline-block;
        }

        .user-menu img {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            cursor: pointer;
        }

        .user-menu-content {
            display: none;
            position: absolute;
            right: 0;
            background-color: white;
            box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.2);
            padding: 10px;
            border-radius: 5px;
            z-index: 1;
        }

        .user-menu-content a {
            display: block;
            text-decoration: none;
            color: black;
            padding: 8px;
            margin: 5px 0;
        }

        .user-menu-content a:hover {
            background-color: #f1f1f1;
        }

        .user-menu:hover .user-menu-content {
            display: block;
        }
    </style>
</head>
<body>
    <nav>
        <a href="/">Accueil</a>
        <a href="/reservation">Réservation</a>
        <a href="/categorie">Catégorie</a>
        <a href="/contact">Nous contacter</a>

        <div style="float: right;">
            <div class="user-menu">
                <img src="/images/user-icon.png" alt="Compte">
                <div class="user-menu-content">
                    <?php if (isset($_SESSION['user_id'])): ?>
                        <a href="/modifier-compte">Compte</a>
                        <a href="/messages">Messages</a>
                        <a href="/deconnexion">Déconnexion</a>
                    <?php else: ?>
                        <a href="/connexion">Connexion</a>
                        <a href="/inscription">Inscription</a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </nav>

    <main>
        <?= $content ?>
    </main>
</body>
</html>
