<?php
use App\Models\AnnonceModel;

ob_start();

if (!isset($_SESSION['user_id'])) {
    header('Location: /connexion');
    exit;
}

// Récupérer les réservations de l'utilisateur
$reservations = AnnonceModel::getReservationsByUser($_SESSION['user_id']);
?>

<h1>Vos réservations</h1>

<?php if (!empty($reservations)): ?>
    <div class="annonces">
        <?php foreach ($reservations as $reservation): ?>
            <div class="reservation-card">
                <?php if (!empty($reservation['image'])): ?>
                    <img src="/uploads/<?= htmlspecialchars($reservation['image']) ?>" alt="Image de la réservation">
                <?php endif; ?>
                <div class="reservation-card-content">
                    <div class="reservation-card-title"><?= htmlspecialchars($reservation['titre']) ?></div>
                    <div class="reservation-card-description">
                        <?= nl2br(htmlspecialchars($reservation['description'])) ?>
                    </div>
                    <div class="reservation-card-info">
                        <div class="reservation-card-price"><?= htmlspecialchars($reservation['prix']) ?> € / nuit</div>
                        <div class="reservation-card-date">
                            Date de réservation : <?= htmlspecialchars($reservation['created_at']) ?>
                        </div>
                    </div>
                    <div class="reservation-card-footer">
                        <div class="actions">
                            <a href="/supprimer-reservation?id=<?= $reservation['id'] ?>" 
                               onclick="return confirm('Voulez-vous vraiment supprimer cette réservation ?')">Supprimer</a>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
<?php else: ?>
    <p>Aucune réservation pour le moment.</p>
<?php endif; ?>

<?php
$content = ob_get_clean();
require __DIR__ . '/layout.php';
