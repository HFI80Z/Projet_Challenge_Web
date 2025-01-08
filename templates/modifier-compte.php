<?php ob_start(); ?>

<h1>Modifier mon compte</h1>

<form action="/modifier-compte" method="POST">
    <label>Nom :</label>
    <input type="text" name="nom" value="<?= htmlspecialchars($user['nom']) ?>" required>
    <br>
    <label>Prénom :</label>
    <input type="text" name="prenom" value="<?= htmlspecialchars($user['prenom']) ?>" required>
    <br>
    <label>Région :</label>
    <input type="text" name="region" value="<?= htmlspecialchars($user['region']) ?>" required>
    <br>
    <label>Email :</label>
    <input type="email" name="email" value="<?= htmlspecialchars($user['email']) ?>" required>
    <br>
    <button type="submit">Enregistrer</button>
</form>

<?php
$content = ob_get_clean();
require __DIR__ . '/layout.php';
