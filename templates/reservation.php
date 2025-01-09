<?php

use App\Models\AnnonceModel;

ob_start(); 

if (!isset($_SESSION['user_id'])) {
    header('Location: /connexion');
    exit;
}

$reservations = AnnonceModel::getReservationsByUser($_SESSION['user_id']);
?>

<h1>Vos réservations</h1>

<?php if (!empty($reservations)): ?>
    <ul>
        <?php foreach ($reservations as $reservation): ?>
            <li>
                <strong><?= htmlspecialchars($reservation['titre']) ?></strong><br>
                <?= nl2br(htmlspecialchars($reservation['description'])) ?><br>
                Prix : <?= htmlspecialchars($reservation['prix']) ?> €<br>
                Date de réservation : <?= htmlspecialchars($reservation['created_at']) ?><br>

                <?php if (!empty($reservation['image'])): ?>
                    <img src="/uploads/<?= htmlspecialchars($reservation['image']) ?>" alt="Image de l'annonce" style="max-width: 200px;">
                <?php endif; ?>
            </li>
            <hr>
        <?php endforeach; ?>
    </ul>
<?php else: ?>
    <p>Aucune réservation pour le moment.</p>
<?php endif; ?>

<?php
$content = ob_get_clean();
require __DIR__ . '/layout.php';
