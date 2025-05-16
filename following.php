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
    <div class="following">
        <h2>Abonnements de l'utilisateur <?php echo htmlspecialchars($user_id); ?></h2>
        <div class="following-list">
            <div class="following-item">
                <?php
                include("./sql/recup_following.php");
                ?>
            </div>
        </div>
    </div>
    <div class="droite"></div>
</div>

<?php
include("includes/footer.php");
?>
