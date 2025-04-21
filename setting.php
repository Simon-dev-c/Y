<?php
session_start();
$id = $_SESSION["id"] ?? null;
$nom = $_SESSION["nom"] ?? null;
$statut = $_SESSION['statut'] ?? null;
$bio = "";

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
