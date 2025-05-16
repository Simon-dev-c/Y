<?php
include('includes/connexion_inc.php');
$pdo = connexion('Y_database.db');

// Utilisé dans following

try {
    $stmt = $pdo->prepare('SELECT follows.following_id, users.nom FROM follows INNER JOIN users ON follows.following_id = users.id WHERE follows.follower_id = :user_id');
    $stmt->bindParam(':user_id', $user_id);
    $stmt->execute();

    while ($following = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo "<div class='following_item'>";
        echo "<a href='profile.php?user_id=" . $following['following_id'] . "'>" . htmlspecialchars($following['nom']) . "</a>";
        echo "</div>";
    }
} catch (PDOException $e) {
    echo "<p>Erreur lors de la récupération des abonnements.</p>";
}
?>
