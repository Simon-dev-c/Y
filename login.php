<?php
session_start();
$pseudo = $_SESSION["pseudo"] ?? null;
$mdp = $_SESSION["mdp"] ?? null;
$statut = $_SESSION['statut'] ?? null;

?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <title>login</title>
        <link rel="stylesheet" href="s.css">
    </head>
    <body>       
        <form>
            <div class="logo1">
                <img src="images/logo.jpg" alt="logo" width="70" height="70">
            </div>
            <h2>Se connecter</h2>           
            <label class="input_box"><input name="identifiant" placeholder="Identiant"></label><br><br>
            <label class="input_box"><input name="password" type="password" placeholder="password" maxlength="25"></label><br><br>
            <label><input name="button" type="button" value="Se connecter"></label><br>
            <label><a href="register.php">S'identifier</a></label><br>
            <label><a href="accueil.php">Accueil</a></label>
            <label class="mots_passe"><a href="">Mots de passe oublier</a></label><br>        
        </form>    
    </body>
</html>
