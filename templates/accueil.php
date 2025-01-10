<?php  
ob_start(); 
?>

<div class="banner">
    <h1>Bienvenue sur Chakou</h1>
    <p>Naviguez parmi les différentes annonces</p>
    <div class="cta">
        <a href="/creer-annonce">Mettre une annonce</a>
    </div>
</div>

<?php if (!isset($annonce)): // Afficher les annonces uniquement si on n'est pas en mode modification ?>
    <h2>Toutes les annonces :</h2>
    <?php if (!empty($annonces)): ?>
        <div class="annonces">
            <?php foreach ($annonces as $annonceItem): ?>
                <div class="annonce-card">
                    <?php if (!empty($annonceItem['image'])): ?>
                        <img src="/uploads/<?= htmlspecialchars($annonceItem['image']) ?>" alt="Image de l'annonce">
                    <?php endif; ?>
                    <div class="annonce-card-content">
                        <div class="annonce-card-title"><?= htmlspecialchars($annonceItem['titre']) ?></div>
                        <div class="annonce-card-location">
                            <?= nl2br(htmlspecialchars($annonceItem['description'])) ?>
                        </div>
                        <div class="annonce-card-info">
                            <div class="annonce-card-price"><?= htmlspecialchars($annonceItem['prix']) ?> € / nuit</div>
                            <div class="annonce-card-rating">
                                <span>★ 4,9</span>
                            </div>
                        </div>
                        <div class="annonce-card-footer">
                            <div class="created-by">
                                <a href="/profil?id=<?= htmlspecialchars($annonceItem['user_id']) ?>">
                                    Créé par : <?= htmlspecialchars($annonceItem['prenom'] . ' ' . $annonceItem['nom']) ?>
                                </a>
                            </div>
                            <div class="actions">
                                <?php if (isset($_SESSION['user_id'])): ?>
                                    <?php if ($_SESSION['user_id'] == $annonceItem['user_id']): ?>
                                        <a href="/modifier-annonce?id=<?= $annonceItem['id'] ?>">Modifier</a> | 
                                        <a href="/supprimer-annonce?id=<?= $annonceItem['id'] ?>" onclick="return confirm('Supprimer cette annonce ?')">Supprimer</a> |
                                    <?php endif; ?>
                                    <a href="/reserver-annonce?id=<?= $annonceItem['id'] ?>">Réserver</a>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php else: ?>
        <p>Aucune annonce disponible.</p>
    <?php endif; ?>
<?php endif; ?>

<?php
$content = ob_get_clean();
require __DIR__ . '/layout.php';
