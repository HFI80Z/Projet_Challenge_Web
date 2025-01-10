<?php ob_start(); ?>

<h1>Créer une annonce</h1>
<form action="/creer-annonce" method="POST" enctype="multipart/form-data">
    <label>Titre :</label>
    <input type="text" name="titre" required>
    <br>
    <label>Description :</label>
    <textarea name="description" required></textarea>
    <br>
    <label>Prix :</label>
    <input type="number" name="prix" step="0.01" max="99999999.99" required>
    <br>
    <label>Image :</label>
    <input type="file" name="image" accept="image/*">
    <br>
    <button type="submit">Ajouter</button>
</form>

<?php
$content = ob_get_clean();
require __DIR__ . '/layout.php';
