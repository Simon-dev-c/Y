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

include("sql/recup_info_profile.php");

?>
<br><br><br><br><br>
<?php
include("includes/head.php");
?>
<?php
if (!isset($id)) {
    NoConnect();
} else {
?>
<div class="contenu">
    <div class="profile">
        <img src="images/person-circle-outline.svg" alt="Profile" class="profile_img">
        <h2><?php echo htmlspecialchars($nom); ?></h2>
        <p>Email : <?php echo htmlspecialchars($email); ?></p>
        <p>Biographie : <?php echo htmlspecialchars($bio); ?></p>

        <?php if ($user_id != $id) { ?>
            <form action="sql/follow.php" method="POST">
                <input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
                <?php if ($is_following) { ?>
                    <button type="submit" name="action" value="unfollow">Se désabonner</button>
                <?php } else { ?>
                    <button type="submit" name="action" value="follow">Suivre</button>
                <?php } ?>
            </form>
        <?php } ?>

        <div class="links">
            <a href="followers.php?user_id=<?php echo $user_id; ?>">Voir les abonnés</a>
            |
            <a href="following.php?user_id=<?php echo $user_id; ?>">Voir les abonnements</a>
        </div>

        <h3>Publications :</h3>
        <div class="posts">
        <?php
        include("sql/recup_publications.php");
        ?>
        </div>
    </div>
</div>
<?php
}
?>
<?php
include("includes/footer.php");
?>
