<?php
try {
    $stmt = $pdo->prepare('SELECT id, contenu, date FROM posts WHERE user_id = :user_id ORDER BY date DESC');
    $stmt->bindParam(':user_id', $user_id);
    $stmt->execute();

    while ($post = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo "<div class='post_item'>";                
        // Vérifie si le contenu est une image
        if (strpos($post['contenu'], 'uploads/') !== false) {
            echo "<img src='" . htmlspecialchars($post['contenu']) . "' alt='Image partagée' style='width:100%; max-width:300px; border-radius: 10px; margin-bottom: 10px;'>";
        } else {
            echo "<p>" . htmlspecialchars($post['contenu']) . "</p>";
        }

        echo "<small>Publié le : " . htmlspecialchars($post['date']) . "</small>";
        echo "</div>";
    }
} catch (PDOException $e) {
    echo "<p>Erreur lors de la récupération des publications.</p>";
}
?>
