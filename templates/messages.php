<?php ob_start(); ?>

<h1>Mes Messages</h1>
<p>Cette fonctionnalité est encore à implémenter.</p>

<?php
$content = ob_get_clean();
require __DIR__ . '/layout.php';
