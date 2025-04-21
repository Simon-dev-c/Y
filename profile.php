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

    <br><br><br><br><br>

    <?php
    if (isset($nom)) {
    ?>
        <div class="contenu">
            <div class="gauche">
            </div>
            <div class="profile">
                <nav class="retour">
                    <a href="#"><img src="images/arrow-left.svg" alt="retour" width="40" height="40"></a>
                </nav>

                <div class="fond_profile">
                    <img src="images/fond_profile.jpeg" alt="fond_profile">
                </div>
                <div class="profile_img">
                    <img src="images/person-circle-outline.svg" alt="profile" width="70" height="70">
                </div>

                <div class="edit_button" align="right">
                    <button type="submit">Edit profile</button>
                </div>
                <br>
                <p class="name"><?php echo htmlspecialchars($nom); ?></p>
                <p> <b>0</b> Following <b>0</b> Followers</p>

                <h3>Bio :</h3>
                <p><?php echo htmlspecialchars($bio); ?></p>
                <br>



                <div class="last_info">
                    <div>Posts</div>
                    <div>Replies</div>
                    <div>Highlights</div>
                    <div>Media</div>
                    <div>Likes</div>
                </div>

                <div class="content_box">
                </div>

            </div>
            <div class="droite">
            </div>
        </div>
    <?php
    } else {
        NoConnect();
    }
    ?>

    <br><br><br><br><br><br><br><br><br><br><br>

    <?php
    include("includes/footer.php");
    ?>
