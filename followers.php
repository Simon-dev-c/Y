<?php
session_start();
$id = $_SESSION['id'] ?? null;

// Récupération de l'utilisateur cible
$user_id = $_GET['user_id'] ?? $id;

?>
<?php
include("includes/head.php");
?>

<br><br><br><br><br>

<div class="contenu">
    <div class="gauche"></div>
    <div class="followers">
        <h2>Abonnés de l'utilisateur <?php echo htmlspecialchars($user_id); ?></h2>
        <div class="followers-list">
            <div class="follower-item">
                <?php
                include("./sql/recup_followers.php");
                ?>
            </div>
        </div>
    </div>
    <div class="droite"></div>
</div>

<?php
include("includes/footer.php");
?>
