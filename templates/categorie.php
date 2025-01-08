<?php ob_start(); ?>
<h1>Page Catégorie</h1>
<p>Ici, vous pouvez lister ou filtrer par catégories.</p>
<?php
$content = ob_get_clean();
require __DIR__ . '/layout.php';
