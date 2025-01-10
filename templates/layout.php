<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mon mini-Airbnb</title>
    <link rel="stylesheet" href="/css/style.css">

    <style>
body {
    font-family: "Arial", sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f8f9fa;
    color: #484848;
}

h1, h2, h3, h4 {
    font-family: "Circular", "Arial", sans-serif;
    font-weight: 600;
}

a {
    text-decoration: none;
    color: #ff5a5f;
}

a:hover {
    text-decoration: underline;
}

nav {
    background-color: white;
    border-bottom: 1px solid #ebebeb;
    padding: 15px 30px;
    display: flex;
    justify-content: space-between;
    align-items: center;
    position: sticky;
    top: 0;
    z-index: 1000;
}

nav .logo img {
    height: 30px;
}

nav ul {
    list-style: none;
    display: flex;
    margin: 0;
    padding: 0;
}

nav ul li {
    margin-left: 20px;
}

nav ul li a {
    font-weight: 600;
    color: #484848;
    font-size: 14px;
    transition: color 0.2s;
}

nav ul li a:hover {
    color: #ff5a5f;
}

.user-menu {
    position: relative;
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
    border-radius: 8px;
    z-index: 10;
    padding: 10px;
}

.user-menu-content a {
    display: block;
    color: #484848;
    padding: 10px;
    font-size: 14px;
}

.user-menu-content a:hover {
    background-color: #f7f7f7;
}

.user-menu:hover .user-menu-content {
    display: block;
}

.banner {
    position: relative;
    background-image: url('/uploads/image.png');
    background-size: cover;   
    background-position: center;
    color: white;
    text-align: center;
    padding: 40px 20px;  
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    height: 250px;  
    width: 1160px; 
}

.banner::after {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: rgba(0, 0, 0, 0.5); 
    z-index: 1;
}

.banner h1,
.banner p {
    position: relative;
    z-index: 2;
    margin: 0;
    text-shadow: 2px 2px 10px rgba(0, 0, 0, 0.7);
}

.banner h1 {
    font-size: 48px;
    font-weight: bold;
}

.banner p {
    font-size: 18px;
    margin-top: 10px;
}

.banner .cta {
    margin-top: 20px;
    position: relative;
    z-index: 2;
}

.banner .cta a {
    background-color: #ff5a5f;
    color: white;
    padding: 10px 20px;
    font-size: 16px;
    font-weight: bold;
    border-radius: 5px;
    text-decoration: none;
    transition: background-color 0.3s ease;
}

.banner .cta a:hover {
    background-color: #e14c4c;
}

footer {
    background-color: white;
    padding: 20px;
    text-align: center;
    font-size: 12px;
    color: #767676;
    border-top: 1px solid #ebebeb;
}

footer a {
    color: #767676;
}

footer a:hover {
    text-decoration: underline;
}

main {
    max-width: 1200px;
    margin: 30px auto;
    padding: 0 15px;
}

.annonces {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(300px, 1fr)); 
    gap: 20px;
    padding: 20px 0;
}

.annonce-card {
    display: flex;
    flex-direction: column;
    background-color: white;
    border-radius: 15px;
    box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
    overflow: hidden;
    transition: transform 0.2s, box-shadow 0.2s;
}

.annonce-card:hover {
    transform: translateY(-5px);
    box-shadow: 0px 8px 20px rgba(0, 0, 0, 0.2);
}

.annonce-card img, .reservation-card img {
    width: 100%;
    height: 200px; 
    object-fit: cover; 
    border-radius: 8px;
    margin-bottom: 15px; 
}

.annonce-card-content {
    padding: 15px;
    display: flex;
    flex-direction: column;
    gap: 10px;
}

.annonce-card-title {
    font-size: 16px;
    font-weight: bold;
    color: #484848;
}

.annonce-card-location {
    font-size: 14px;
    color: #767676;
    line-height: 1.5;
}

.annonce-card-info {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-top: 10px;
}

.annonce-card-price {
    font-size: 16px;
    font-weight: bold;
    color: #ff5a5f;
}

.annonce-card-rating {
    display: flex;
    align-items: center;
    gap: 5px;
    font-size: 14px;
    color: #484848;
}

.annonce-card-rating span {
    font-size: 12px;
    color: #767676;
}

.annonce-card-footer {
    margin-top: 10px;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.annonce-card-footer a {
    font-size: 14px;
    font-weight: bold;
    color: #ff5a5f;
    transition: color 0.2s;
}

.annonce-card-footer a:hover {
    color: #e14c4c;
}

.annonce-card-footer .actions {
    display: flex;
    gap: 10px; 
}

.annonce-card-footer .created-by {
    font-size: 14px;
    color: #484848;
}


.annonce-card-footer .created-by {
    margin-right: 20px; 
}

form {
    background-color: white;
    border-radius: 8px;
    padding: 20px;
    box-shadow: 0 1px 6px rgba(0, 0, 0, 0.1);
    max-width: 500px;
    margin: 0 auto;
}

form label {
    display: block;
    font-weight: 600;
    margin-bottom: 5px;
}

form input, form textarea, form button {
    width: 100%;
    padding: 10px;
    margin-bottom: 15px;
    border: 1px solid #ebebeb;
    border-radius: 4px;
    font-size: 14px;
}

form input:focus, form textarea:focus {
    border-color: #ff5a5f;
    outline: none;
}

form button {
    background-color: #ff5a5f;
    color: white;
    font-weight: 600;
    border: none;
    cursor: pointer;
    transition: background-color 0.3s;
}

form button:hover {
    background-color: #e14c4c;
}

.reservation-card {
    display: flex;
    flex-direction: column;
    background-color: white;
    border-radius: 15px;
    box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
    overflow: hidden;
    transition: transform 0.2s, box-shadow 0.2s;
    margin-bottom: 20px;
    padding: 20px;
}

.reservation-card:hover {
    transform: translateY(-5px);
    box-shadow: 0px 8px 20px rgba(0, 0, 0, 0.2);
}

.reservation-card img {
    width: 100%;
    height: 200px;
    object-fit: cover;
    border-radius: 8px;
}

.reservation-card-content {
    display: flex;
    flex-direction: column;
    gap: 10px;
}

.reservation-card-title {
    font-size: 18px;
    font-weight: bold;
    color: #484848;
}

.reservation-card-description {
    font-size: 14px;
    color: #767676;
}

.reservation-card-info {
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.reservation-card-price {
    font-size: 16px;
    font-weight: bold;
    color: #ff5a5f;
}

.reservation-card-date {
    font-size: 14px;
    color: #484848;
}

.reservation-card-footer {
    margin-top: 15px;
    display: flex;
    justify-content: flex-start;
}

.reservation-card-footer a {
    font-size: 14px;
    font-weight: bold;
    color: #ff5a5f;
    transition: color 0.2s;
}

.reservation-card-footer a:hover {
    color: #e14c4c;
}
    </style>
</head>
<body>
    <nav>
        <div class="logo">
            <a href="/"><img src="https://www.airbnb.fr/favicon.ico" alt="Logo Airbnb" class="logo-img"></a>
        </div>
        <ul>
            <li><a href="/">Accueil</a></li>
            <li><a href="/reservation">Réservation</a></li>
            <li><a href="/creer-annonce">Mettre une annonce</a></li>
            <li><a href="/contact">Nous contacter</a></li>
        </ul>
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
    </nav>

    <main>
        <?= $content ?>
    </main>

    <footer>
    <p>&#169; 2025 Chakou, Inc. · <a href="/confidentialite">Confidentialité</a> | <a href="/conditions-generales">Conditions générales</a></p>
</footer>

</body>
</html>
