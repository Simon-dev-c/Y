<?php
include("includes/connexion_inc.php");
$pdo = connexion('Y_database.db');

// Utilisé dans accueil

try {
    $stmt = $pdo->query('SELECT posts.id, posts.contenu, posts.date, users.nom FROM posts INNER JOIN users ON posts.user_id = users.id ORDER BY posts.date DESC');
    while ($post = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo "<div class='post-item'>";
        echo "<h4>" . htmlspecialchars($post['nom']) . "</h4>";

        // Vérifie si le contenu est une image
        if (strpos($post['contenu'], 'uploads/') !== false) {
            echo "<img src='" . htmlspecialchars($post['contenu']) . "' alt='Image partagée' style='width:100%; max-width:300px; border-radius: 10px; margin-bottom: 10px;'>";
        } else {
            echo "<p>" . htmlspecialchars($post['contenu']) . "</p>";
        }

        echo "<small>Publié le : " . htmlspecialchars($post['date']) . "</small>";

        // Affichage Les Likes 
        $stmt_likes = $pdo->prepare('SELECT COUNT(*) AS nbr FROM likes WHERE likes.post_id = :post_id ');
        $stmt_likes->bindParam(':post_id', $post['id']);
        $stmt_likes->execute();
        $likes = $stmt_likes->fetch(PDO::FETCH_ASSOC);

        
        // Formulaire pour le like
        echo "<form action='./sql/like.php' method='POST' class='like-form'>";
        echo "<input type='hidden' name='post_id' value='" . $post['id'] . "'>";
        echo "<button type='submit'>Like</button>";
        echo "<p>like : ".$likes['nbr']."</p>";
        echo "</form>";

        // Formulaire pour ajouter un commentaire
        echo "<form action='./sql/commenter.php' method='POST' class='comment-form'>";
        echo "<input type='hidden' name='post_id' value='" . $post['id'] . "'>";
        echo "<textarea name='comment' rows='2' placeholder='Ajouter un commentaire'></textarea>";
        echo "<button type='submit'>Commenter</button>";
        echo "</form>";

        // Affichage des commentaires
        $stmt_comments = $pdo->prepare('SELECT comments.contenu, comments.date, users.nom FROM comments INNER JOIN users ON comments.user_id = users.id WHERE comments.post_id = :post_id ORDER BY comments.date ASC');
        $stmt_comments->bindParam(':post_id', $post['id']);
        $stmt_comments->execute();

        echo "<div class='comments'>";
        while ($comment = $stmt_comments->fetch(PDO::FETCH_ASSOC)) {
            echo "<div class='comment-item'>";
            echo "<strong>" . htmlspecialchars($comment['nom']) . " :</strong> " . htmlspecialchars($comment['contenu']) . "<br>";
            echo "<small>" . htmlspecialchars($comment['date']) . "</small>";
            echo "</div>";
        }
        echo "</div>";

        echo "</div>";
    }
} catch (PDOException $e) {
    echo "<p>Erreur lors de la récupération des posts : " . $e->getMessage() . "</p>";
}
?>
