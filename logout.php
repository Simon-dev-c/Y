<?php
session_start();
$id = $_SESSION["id"] ?? null;
$nom = $_SESSION["nom"] ?? null;
$statut = $_SESSION['statut'] ?? null;

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['logout'])) {
    session_unset();
    session_destroy();
    header('Location: accueil.php');
    $nom = null;
    $mdp = null;
    $statut = null;
    exit();
}


include("includes/head2.php");
?>

<body>
    <form method="POST">
        <div class="logo1">
            <img src="images/logo.jpg" alt="logo" width="70" height="70">
        </div>
        <?php
        if (!isset($nom)) {
        ?>
            <h2>Vous n'êtes pas connecté !</h2>
            <label><a href="login.php">Se connecter</a></label><br>
            <label><a href="register.php">Pas de compte ?</a></label><br>
            <label><a href="accueil.php">Accueil</a></label>
        <?php
        } else {
        ?>
            <h2>Se déconnecter</h2>
            <button type="submit" name="logout">Se déconnecter</button>
            <br><br>
            <label><a href="accueil.php">Accueil</a></label>
        <?php
        }
        ?>
    </form>
</body>

</html>
