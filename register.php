<?php
session_start();
$pseudo = $_SESSION["pseudo"] ?? null;
$mdp = $_SESSION["mdp"] ?? null;
$statut = $_SESSION['statut'] ?? null;

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>register</title>
        <link rel="stylesheet" href="s.css">
    </head>
    <body>
        <form id="form1" onsubmit="return verifierDonnees()">
            <div class="logo1">
                <img src="images/logo.jpg" alt="logo" width="70" height="70">
            </div>
            <h2>S'identifier</h2>
            
            <label class="civilite">Civilité :<input type="radio" name="civilite" value="mme">Madame</label>
            <label><input type="radio" name="civilite" value="m">Monsieur</label>
            <br>
            <label><input type="text" name="identifiant" placeholder="identifiant" required="required"></label><br>
            <br>
            <label><input type="email" name="email" placeholder="Adresse email" required="required"></label><br><br>
            <label class="date">Date de naissance</label>
            <select id="jour" name="jour"></select>
            <select id="mois" name="mois"></select>
            <select id="annee" name="annee"></select><br>
            <label><input type="password" name="mdp" placeholder="Mot de passe" required="required" maxlength="25"></label><br><br>          
            <label><input name="button" type="button" value="S'identifier"></label><br>
            <label><a href="login.php">Se connecter</a></label><br>
        </form>
        <script src="js.js"></script>
    </body>
</html>
