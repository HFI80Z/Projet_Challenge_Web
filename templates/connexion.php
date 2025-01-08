<?php ob_start(); ?>
<h1>Connexion</h1>
<?php if (isset($error)) echo "<p style='color:red;'>$error</p>"; ?>
<form action="/connexion" method="post">
    <label>Email :</label>
    <input type="email" name="email" required><br>
    <label>Mot de passe :</label>
    <input type="password" name="password" required><br>
    <button type="submit">Se connecter</button>
</form>
<?php
$content = ob_get_clean();
require __DIR__ . '/layout.php';
