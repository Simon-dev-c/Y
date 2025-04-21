<?php
session_start();
$nom = $_SESSION["nom"] ?? null;
$statut = $_SESSION['statut'] ?? null;
$bio = "";

function NoConnect()
{
    echo "Tu n'es pas connecté<br>";
    echo "<a href='register.php'>Connexion</a><br>";
    echo "<a href='login.php'>Inscription</a><br>";
}


include('includes/connexion_inc.php');
$pdo = connexion('Y_database.db');
try {
    $stmt = $pdo->prepare('SELECT bio FROM users
        WHERE nom == :nom');
    $stmt->bindParam(':nom', $nom);

    $stmt->execute();
    $requete = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($requete['bio'] !== null) {
        $bio = $requete['bio'];
    }
} catch (PDOException $e) {
    echo '<p>Problème PDO</p>';
    echo $e->getMessage();
}
$stmt->closeCursor();
$pdo = null;



?>
<?php
include("includes/head.php");
?>

<body>
    <div class="header">
        <nav class="profile_img">
            <a href="profile.php"><img src="images/person-circle-outline.svg" alt="profile" width="70" height="70"></a>
        </nav>
        <div class="logo">
            <img src="images/logo.jpg" alt="logo" width="70" height="70">
        </div>
        <?php
        if (isset($nom)) {
        ?>
            <div class="log-out">
                <a href="logout.php"><img src="images/log-out.svg" alt="log-out" width="70" height="70"></a>
            </div>
        <?php
        }
        ?>
    </div>

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
                <p class="name">name</p>
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
