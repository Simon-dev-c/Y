<?php
try {
    $stmt = $pdo->prepare('SELECT id, contenu, date FROM posts WHERE user_id = :user_id ORDER BY date DESC');
    $stmt->bindParam(':user_id', $user_id);
    $stmt->execute();

    while ($post = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo "<div class='post_item'>";
        echo "<p>" . htmlspecialchars($post['contenu']) . "</p>";
        echo "<small>Publié le : " . htmlspecialchars($post['date']) . "</small>";
        echo "</div>";
    }
} catch (PDOException $e) {
    echo "<p>Erreur lors de la récupération des publications.</p>";
}
?>
