<?php
session_start();
$id = $_SESSION['id'] ?? null;

// Utilisé dans accueil.php

if ($id && isset($_POST['post']) && !empty(trim($_POST['post']))) {
    $contenu = trim($_POST['post']);
    $date = date('Y-m-d H:i:s');

    include('../includes/connexion_inc.php');
    $pdo = connexion('../Y_database.db');

    try {
        $stmt = $pdo->prepare('INSERT INTO posts (user_id, contenu, date) VALUES (:user_id, :contenu, :date)');
        $stmt->bindParam(':user_id', $id);
        $stmt->bindParam(':contenu', $contenu);
        $stmt->bindParam(':date', $date);
        $stmt->execute();
        echo '<p>Post ajouté avec succès !</p>';
    } catch (PDOException $e) {
        echo "<p>Erreur lors de l'ajout du post.</p>";
        echo $e->getMessage();
    }

    $stmt->closeCursor();
    $pdo = null;
} else {
    echo '<p>Erreur : Veuillez saisir un contenu pour le post.</p>';
}

header('Location: ../accueil.php');
exit();
?>
