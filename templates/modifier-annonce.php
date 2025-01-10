<?php ob_start(); ?>

<h1>Modifier l'annonce</h1>
<form action="/modifier-annonce?id=<?= htmlspecialchars($annonce['id']) ?>" method="POST" enctype="multipart/form-data">
    <label>Titre :</label>
    <input type="text" name="titre" value="<?= htmlspecialchars($annonce['titre']) ?>" required>
    <br>
    <label>Description :</label>
    <textarea name="description" required><?= htmlspecialchars($annonce['description']) ?></textarea>
    <br>
    <label>Prix :</label>
    <input type="number" name="prix" value="<?= htmlspecialchars($annonce['prix']) ?>" step="0.01" required>
    <br>
    <label>Image :</label>
    <input type="file" name="image" accept="image/*">
    <?php if (!empty($annonce['image'])): ?>
        <br><img src="/uploads/<?= htmlspecialchars($annonce['image']) ?>" alt="Image actuelle" style="max-width: 200px;">
        <input type="hidden" name="current_image" value="<?= htmlspecialchars($annonce['image']) ?>">
    <?php endif; ?>
    <br>
    <button type="submit">Modifier</button>
</form>

<?php
$content = ob_get_clean();
require __DIR__ . '/layout.php';
