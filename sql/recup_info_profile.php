<?php
include("includes/connexion_inc.php");
$pdo = connexion('Y_database.db');

// Récupération des informations de l'utilisateur du profil
$user_id = $_GET['user_id'] ?? $id;

// Récupération des informations utilisateur
$email = '';
$bio = '';
try {
    $stmt = $pdo->prepare('SELECT nom, email, bio FROM users WHERE id = :user_id');
    $stmt->bindParam(':user_id', $user_id);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user) {
        $nom = $user['nom'];
        $email = $user['email'];
        $bio = $user['bio'];
    }
} catch (PDOException $e) {
    echo "<p>Erreur lors de la récupération des informations utilisateur.</p>";
}

// Vérifier si l'utilisateur est déjà suivi
$is_following = false;
try {
    $stmt = $pdo->prepare('SELECT id FROM follows WHERE follower_id = :follower_id AND following_id = :following_id');
    $stmt->bindParam(':follower_id', $id);
    $stmt->bindParam(':following_id', $user_id);
    $stmt->execute();
    $is_following = $stmt->fetch(PDO::FETCH_ASSOC) ? true : false;
} catch (PDOException $e) {
    echo "<p>Erreur lors de la vérification du suivi.</p>";
}
?>