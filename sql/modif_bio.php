<?php
session_start();
$id = $_SESSION["id"] ?? null;
$nom = $_SESSION["nom"] ?? null;
$statut = $_SESSION['statut'] ?? null;

if (isset($_POST['bio'])) {
    $bio = $_POST['bio'];

    include('../includes/connexion_inc.php');
    $pdo = connexion('../Y_database.db');
    try {
        $stmt = $pdo->prepare('UPDATE users
        SET bio = :bio
        WHERE nom == :nom');
        $stmt->bindParam(':bio', $bio);
        $stmt->bindParam(':nom', $nom);

        $stmt->execute();
    } catch (PDOException $e) {
        echo '<p>Problème PDO</p>';
        echo $e->getMessage();
    }
    $stmt->closeCursor();
    $pdo = null;
}
header('Location: ../accueil.php')
?>
