<?php
session_start();
$id = $_SESSION["id"] ?? null;
$nom = $_SESSION["nom"] ?? null;
$statut = $_SESSION['statut'] ?? null;

?>

<?php
include("includes/head2.php");
?>
<body>
    <form action="sql/ajouter_user.php" method="POST">
        <div class="logo1">
            <img src="images/logo.jpg" alt="logo" width="70" height="70">
        </div>
        <?php
        if (!isset($nom)) {
        ?>
            <h2>S'identifier</h2>
            <label><input type="text" name="nom" placeholder="nom" required="required"></label>
            <br><br>
            <label><input type="password" name="mdp" placeholder="Mot de passe" required="required" maxlength="25"></label>
            <br><br>
            <label><input type="email" name="email" placeholder="Adresse email" required="required"></label>
            <br><br>
            <label><input name="button" type="submit" value="S'identifier"></label><br>
            <label><a href="login.php">Se connecter</a></label><br>
        <?php
        } else {
        ?>
            <h2>Vous êtes déjà connecté !</h2>
        <?php
        }
        ?>
        <a href='accueil.php'>Accueil</a><br>
    </form>
    <script src="js.js"></script>
</body>

</html>
