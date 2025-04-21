<?php
session_start();
$nom = $_SESSION["nom"] ?? null;
$statut = $_SESSION['statut'] ?? null;

function NoConnect()
{
    echo "Tu n'es pas connecté<br>";
    echo "<a href='register.php'>Connexion</a><br>";
    echo "<a href='login.php'>Inscription</a><br>";
}


?>
<?php
include("sql/recup_bio.php");

include("includes/head.php");
?>

<body>
    <div class="header">
        <nav class="profil">
            <a href="profile.php"><img src="images/person-circle-outline.svg" alt="profil" width="70" height="70"></a>
        </nav>
        <div class="logo">
            <img src="images/logo.jpg" alt="logo" width="70" height="70">
        </div>
        <?php
        if (isset($nom)) {
        ?>
            <div class="log-out">
                <a href="login.php"><img src="images/log-out.svg" alt="log-out" width="70" height="70"></a>
            </div>
        <?php
        }
        ?>

    </div>

    <br><br><br><br><br> <!-- Important pour ne pas mettre le contenu derrière le header -->
    <?php
    if (!isset($nom)) {
        NoConnect();
    } else {
    ?>

        <div class="contenu">
            <div class="gauche">
            </div>
            <div class="settings">
                <form action="sql/modif_bio.php" method="POST">
                    <label>Bio :<textarea name="bio" rows="5"><?php echo htmlspecialchars($bio); ?></textarea></label>
                    <br>
                    <label><input name="button" type="submit" value="Modifier"></label><br>
                </form>

                <!-- Si on veut pouvoir modifier d'autres choses : nom, email, mdp, photo -->

            </div>
            <div class="droite">
            </div>
        </div>
    <?php
    }
    ?>

    <?php
    include("includes/footer.php");
    ?>
