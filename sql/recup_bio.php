<?php
include('includes/connexion_inc.php');
$pdo = connexion('Y_database.db');
try {
    $stmt = $pdo->prepare('SELECT bio FROM users
        WHERE nom == :nom');
    $stmt->bindParam(':nom', $nom);

    $stmt->execute();
    $requete = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($requete['bio'] !== null) {
        $bio = $requete['bio'];
    }
} catch (PDOException $e) {
    echo '<p>Problème PDO</p>';
    echo $e->getMessage();
}
$stmt->closeCursor();
$pdo = null;
?>