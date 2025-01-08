<?php ob_start(); ?>
<h1>Contactez-nous</h1>
<form action="#" method="post">
    <label for="nom">Nom :</label>
    <input type="text" name="nom" id="nom"><br>
    
    <label for="email">Email :</label>
    <input type="email" name="email" id="email"><br>
    
    <label for="message">Message :</label>
    <textarea name="message" id="message"></textarea><br>
    
    <button type="submit">Envoyer</button>
</form>
<?php
$content = ob_get_clean();
require __DIR__ . '/layout.php';
