<?php
session_start();

if (!isset($_SESSION['id'])) {
    header('Location: login.php');
    exit();
}

include('includes/connexion_inc.php');
$pdo = connexion('Y_database.db');

if (!isset($_GET['user_id'])) {
    echo "Utilisateur inconnu.";
    exit();
}

$user_id = (int) $_GET['user_id'];
$current_user_id = $_SESSION['id'];

if ($user_id === $current_user_id) {
    header('Location: profile.php');
    exit();
}

// Récupération des informations du profil
try {
    $stmt = $pdo->prepare('SELECT nom, email, photo, bio FROM users WHERE id = :id');
    $stmt->bindParam(':id', $user_id);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$user) {
        echo "Utilisateur introuvable.";
        exit();
    }

    $nom = $user['nom'];
    $email = $user['email'];
    $photo = $user['photo'];
    $bio = $user['bio'] ?? '';
} catch (PDOException $e) {
    echo "<p>Erreur lors de la récupération du profil.</p>";
    exit();
}

// Vérification du suivi
$is_following = false;
try {
    $stmt = $pdo->prepare('SELECT id FROM follows WHERE follower_id = :follower AND following_id = :following');
    $stmt->bindParam(':follower', $current_user_id);
    $stmt->bindParam(':following', $user_id);
    $stmt->execute();
    $is_following = $stmt->fetch(PDO::FETCH_ASSOC) ? true : false;
} catch (PDOException $e) {
    echo "<p>Erreur lors de la vérification du suivi.</p>";
}

include("includes/head.php");
?>

<div class="contenu">
    <div class="profile">
        <img src="images/person-circle-outline.svg" alt="Profile" class="profile_img">
        <h2><?php echo htmlspecialchars($nom); ?></h2>
        <p>Email : <?php echo htmlspecialchars($email); ?></p>
        <p>Biographie : <?php echo htmlspecialchars($bio); ?></p>

        <?php if ($user_id != $current_user_id) { ?>
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
            $_GET['user_id'] = $user_id; // pour recup_publications.php
            include("sql/recup_publications.php");
            ?>
        </div>
    </div>
</div>

<?php include("includes/footer.php"); ?>
