<?php
include('includes/connexion_inc.php');
$pdo = connexion('Y_database.db');

try {
    $stmt = $pdo->prepare('SELECT follows.follower_id, users.nom FROM follows INNER JOIN users ON follows.follower_id = users.id WHERE follows.following_id = :user_id');
    $stmt->bindParam(':user_id', $user_id);
    $stmt->execute();

    while ($follower = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo "<div class='follower_item'>";
        echo "<a href='profile.php?user_id=" . $follower['follower_id'] . "'>" . htmlspecialchars($follower['nom']) . "</a>";
        echo "</div>";
    }
} catch (PDOException $e) {
    echo "<p>Erreur lors de la récupération des abonnés.</p>";
}
?>
