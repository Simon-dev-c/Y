<?php
session_start();
$id = $_SESSION['id'] ?? null;

if ($id && isset($_POST['post_id'])) {
    $post_id = $_POST['post_id'];

    include('../includes/connexion_inc.php');
    $pdo = connexion('../Y_database.db');

    try {
        // Vérifier si l'utilisateur a déjà liké ce post
        $stmt = $pdo->prepare('SELECT id FROM likes WHERE post_id = :post_id AND user_id = :user_id');
        $stmt->bindParam(':post_id', $post_id);
        $stmt->bindParam(':user_id', $id);
        $stmt->execute();
        $like = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($like) {
            // Supprimer le like
            $stmt = $pdo->prepare('DELETE FROM likes WHERE id = :id');
            $stmt->bindParam(':id', $like['id']);
            $stmt->execute();
            echo '<p>Like retiré.</p>';
        } else {
            // Ajouter le like
            $stmt = $pdo->prepare('INSERT INTO likes (post_id, user_id) VALUES (:post_id, :user_id)');
            $stmt->bindParam(':post_id', $post_id);
            $stmt->bindParam(':user_id', $id);
            $stmt->execute();
            echo '<p>Like ajouté.</p>';
        }
    } catch (PDOException $e) {
        echo '<p>Erreur lors de la gestion du like.</p>';
        echo $e->getMessage();
    }

    $stmt->closeCursor();
    $pdo = null;
}

header('Location: ../accueil.php');
exit();
?>
