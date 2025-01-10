<?php ob_start(); ?>

<h1>Mes Messages</h1>
<p>En cours de développement</p>

<?php
$content = ob_get_clean();
require __DIR__ . '/layout.php';
