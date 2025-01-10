<?php ob_start(); ?>

<h1>Profil de <?= htmlspecialchars($user['prenom'] . ' ' . $user['nom']) ?></h1>

<p><strong>Nom :</strong> <?= htmlspecialchars($user['nom']) ?></p>
<p><strong>Prénom :</strong> <?= htmlspecialchars($user['prenom']) ?></p>
<p><strong>Région :</strong> <?= htmlspecialchars($user['region']) ?></p>
<p><strong>Email :</strong> <?= htmlspecialchars($user['email']) ?></p>

<a href="/">Retour à l'accueil</a>

<?php
$content = ob_get_clean();
require __DIR__ . '/layout.php';
