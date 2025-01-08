<?php ob_start(); ?>
<h1>Inscription</h1>
<form action="/inscription" method="post">
    <label>Email :</label>
    <input type="email" name="email" required><br>
    
    <label>Mot de passe :</label>
    <input type="password" name="password" required><br>
    
    <label>Nom :</label>
    <input type="text" name="nom"><br>
    
    <label>Prénom :</label>
    <input type="text" name="prenom"><br>

    <label>Région :</label>
    <input type="text" name="region"><br>
    
    <button type="submit">S'inscrire</button>
</form>
<?php
$content = ob_get_clean();
require __DIR__ . '/layout.php';
