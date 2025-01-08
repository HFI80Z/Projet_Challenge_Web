<?php ob_start(); ?>

<h1>Page Réservation (Liste d'annonces)</h1>

<form action="<?= isset($annonce) ? "/modifier-annonce?id={$annonce['id']}" : "/ajouter-annonce" ?>" method="POST" enctype="multipart/form-data">
    <h3><?= isset($annonce) ? "Modifier l'annonce" : "Ajouter une annonce" ?></h3>
    <label>Titre :</label>
    <input type="text" name="titre" value="<?= isset($annonce) ? htmlspecialchars($annonce['titre']) : '' ?>" required>
    <br>
    <label>Description :</label>
    <textarea name="description" required><?= isset($annonce) ? htmlspecialchars($annonce['description']) : '' ?></textarea>
    <br>
    <label>Prix :</label>
    <input type="number" name="prix" value="<?= isset($annonce) ? htmlspecialchars($annonce['prix']) : '' ?>" step="0.01">
    <br>
    <label>Image :</label>
    <input type="file" name="image" accept="image/*">
    <?php if (isset($annonce) && !empty($annonce['image'])): ?>
        <br><img src="/uploads/<?= htmlspecialchars($annonce['image']) ?>" alt="Image de l'annonce" style="max-width: 200px;">
    <?php endif; ?>
    <br>
    <button type="submit"><?= isset($annonce) ? "Confirmer" : "Ajouter" ?></button>
</form>

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

                <?php if (!empty($annonceItem['image'])): ?>
                    <img src="/uploads/<?= htmlspecialchars($annonceItem['image']) ?>" alt="Annonce" style="max-width: 200px; max-height: 200px;">
                <?php endif; ?>

                <?php if (isset($_SESSION['user_id']) && $_SESSION['user_id'] == $annonceItem['user_id']): ?>
                    <br>
                    <a href="/modifier-annonce?id=<?= $annonceItem['id'] ?>">Modifier</a> | 
                    <a href="/supprimer-annonce?id=<?= $annonceItem['id'] ?>" onclick="return confirm('Supprimer cette annonce ?')">Supprimer</a>
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
