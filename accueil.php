<?php
session_start();
$id = $_SESSION['id'] ?? null;
$nom = $_SESSION['nom'] ?? null;
$statut = $_SESSION['statut'] ?? null;

function NoConnect()
{
    echo "Tu n'es pas connecté<br>";
    echo "<a href='login.php'>Connexion</a><br>";
    echo "<a href='register.php'>Inscription</a><br>";
}

?>
<?php
include("includes/head.php");
?>

<div class="contenu">
    <div class="gauche">
        <?php
        if (isset($nom)) {
        ?>
            <input type="text" id="search" placeholder="Rechercher...">
            <ul id="menu">
                <?php
                include("sql/recup_users.php");
                ?>
            </ul>
        <?php
        }
        ?>
    </div>
    <div class="post">
        <?php
        if (!isset($nom)) {
            NoConnect();
        } else {
        ?>
            <h2>Fil d'actualité</h2>
            <form action="sql/ajouter_post.php" method="POST" class="post-form">
                <textarea name="post" rows="4" placeholder="Quoi de neuf ?"></textarea>
                <button type="submit">Publier</button>
            </form>
            <div class="posts">
                <h3>Publications récentes :</h3>
                <?php
                include("sql/recup_post.php");
                ?>
            </div>
        <?php
        }
        ?>
    </div>
    <div class="droite">

    </div>
</div>

<?php
include("includes/footer.php");
?>
