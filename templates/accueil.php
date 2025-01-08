<?php 
ob_start(); 
?>
<h1>Bienvenue sur notre site type Airbnb</h1>
<p>Ceci est la page d’accueil</p>
<?php
$content = ob_get_clean();
require __DIR__ . '/layout.php';
