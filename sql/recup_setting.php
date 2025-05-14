<?php
include("includes/connexion_inc.php");
$pdo = connexion('Y_database.db');

// Récupération des informations utilisateur
$email = '';
$bio = '';
try {
    $stmt = $pdo->prepare('SELECT email, bio FROM users WHERE id = :id');
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    $email = $result['email'] ?? '';
    $bio = $result['bio'] ?? '';
} catch (PDOException $e) {
    echo "<p>Erreur lors de la récupération des informations utilisateur.</p>";
}
?>