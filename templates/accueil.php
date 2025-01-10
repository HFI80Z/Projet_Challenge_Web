<?php  
ob_start(); 
?>

<?php if (!isset($annonce)): // Afficher ce texte uniquement si on n'est pas en mode modification ?>
    <h1>Bienvenue sur notre site type Airbnb</h1>
    <p>Ceci est la page d’accueil</p>
<?php endif; ?>

<hr>

<?php if (!isset($annonce)): // Afficher les annonces uniquement si on n'est pas en mode modification ?>
    <h2>Toutes les annonces :</h2>
    <?php if (!empty($annonces)): ?>
        <ul>
        <?php foreach ($annonces as $annonceItem): ?>
            <li>
                <strong><?= htmlspecialchars($annonceItem['titre']) ?></strong><br>
                <?= nl2br(htmlspecialchars($annonceItem['description'])) ?><br>
                Prix : <?= htmlspecialchars($annonceItem['prix']) ?> €<br>
                Créé par : 
                <a href="/profil?id=<?= htmlspecialchars($annonceItem['user_id']) ?>">
                    <?= htmlspecialchars($annonceItem['prenom'] . ' ' . $annonceItem['nom']) ?>
                </a><br>

                <?php if (!empty($annonceItem['image'])): ?>
                    <img src="/uploads/<?= htmlspecialchars($annonceItem['image']) ?>" alt="Annonce" style="max-width: 200px;">
                <?php endif; ?>

                <?php if (isset($_SESSION['user_id'])): ?>
                    <br>
                    <!-- Vérifier si l'utilisateur connecté est l'auteur de l'annonce -->
                    <?php if ($_SESSION['user_id'] == $annonceItem['user_id']): ?>
                        <a href="/modifier-annonce?id=<?= $annonceItem['id'] ?>">Modifier</a> | 
                        <a href="/supprimer-annonce?id=<?= $annonceItem['id'] ?>" onclick="return confirm('Supprimer cette annonce ?')">Supprimer</a> |
                    <?php endif; ?>
                    
                    <!-- Tous les utilisateurs peuvent réserver -->
                    <a href="/reserver-annonce?id=<?= $annonceItem['id'] ?>">Réserver</a>
                <?php endif; ?>
            </li>
            <hr>
        <?php endforeach; ?>
        </ul>
    <?php else: ?>
        <p>Aucune annonce disponible.</p>
    <?php endif; ?>
<?php endif; ?>

<?php
$content = ob_get_clean();
require __DIR__ . '/layout.php';
