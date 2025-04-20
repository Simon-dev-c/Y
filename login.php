<?php
session_start();
$nom = $_SESSION["nom"] ?? null;
$statut = $_SESSION['statut'] ?? null;


include("includes/head2.php");
?>

<body>
    <form action="sql/connexion.php" method="POST">
        <div class="logo1">
            <img src="images/logo.jpg" alt="logo" width="70" height="70">
        </div>
        <?php
        if (!isset($nom)) {
        ?>
            <h2>Se connecter</h2>

            <label><input type="text" name="nom" placeholder="nom" required="required"></label>
            <br><br>
            <label><input type="password" name="mdp" placeholder="Mot de passe" required="required" maxlength="25"></label>
            <br><br>
            <label><input name="button" type="submit" value="Se connecter"></label><br>
            <label><a href="register.php">Pas de compte ?</a></label><br>

        <?php
        } else {
        ?>
            <h2>Vous êtes déjà connecté !</h2>

        <?php
        }
        ?>
        <a href='accueil.php'>Accueil</a><br>
    </form>
</body>

</html>
