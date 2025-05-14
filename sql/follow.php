<?php
session_start();
$id = $_SESSION['id'] ?? null;

if (!$id) {
    header('Location: login.php');
    exit();
}

include('includes/connexion_inc.php');
$pdo = connexion('Y_database.db');

$user_id = $_POST['user_id'] ?? null;
$action = $_POST['action'] ?? '';

if ($user_id && $user_id != $id) {
    try {
        if ($action === 'follow') {
            // Vérifier s'il ne suit pas déjà cet utilisateur
            $stmt = $pdo->prepare('SELECT id FROM follows WHERE follower_id = :follower_id AND following_id = :following_id');
            $stmt->bindParam(':follower_id', $id);
            $stmt->bindParam(':following_id', $user_id);
            $stmt->execute();
            $already_following = $stmt->fetch(PDO::FETCH_ASSOC);

            if (!$already_following) {
                $stmt = $pdo->prepare('INSERT INTO follows (follower_id, following_id) VALUES (:follower_id, :following_id)');
                $stmt->bindParam(':follower_id', $id);
                $stmt->bindParam(':following_id', $user_id);
                $stmt->execute();
            }
        } elseif ($action === 'unfollow') {
            $stmt = $pdo->prepare('DELETE FROM follows WHERE follower_id = :follower_id AND following_id = :following_id');
            $stmt->bindParam(':follower_id', $id);
            $stmt->bindParam(':following_id', $user_id);
            $stmt->execute();
        }
    } catch (PDOException $e) {
        echo "<p>Erreur lors de la gestion du suivi.</p>";
    }
}

header('Location: ../profile.php?user_id=' . $user_id);
exit();
?>
