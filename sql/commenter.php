<?php
session_start();
$id = $_SESSION['id'] ?? null;

// Utilisé dans recup_post -> utilisé dans accueil

if ($id && isset($_POST['post_id']) && isset($_POST['comment']) && !empty(trim($_POST['comment']))) {
    $post_id = $_POST['post_id'];
    $comment = trim($_POST['comment']);
    $date = date('Y-m-d H:i:s');

    include('../includes/connexion_inc.php');
    $pdo = connexion('../Y_database.db');

    try {
        $stmt = $pdo->prepare('INSERT INTO comments (post_id, user_id, contenu, date) VALUES (:post_id, :user_id, :contenu, :date)');
        $stmt->bindParam(':post_id', $post_id);
        $stmt->bindParam(':user_id', $id);
        $stmt->bindParam(':contenu', $comment);
        $stmt->bindParam(':date', $date);
        $stmt->execute();
        echo '<p>Commentaire ajouté avec succès !</p>';
    } catch (PDOException $e) {
        echo "<p>Erreur lors de l'ajout du commentaire.</p>";
        echo $e->getMessage();
    }

    $stmt->closeCursor();
    $pdo = null;
} else {
    echo '<p>Erreur : Veuillez saisir un commentaire.</p>';
}

header('Location: ../accueil.php');
exit();
?>
