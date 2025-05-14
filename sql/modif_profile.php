<?php
session_start();
$id = $_SESSION['id'] ?? null;

if (!$id) {
    header('Location: login.php');
    exit();
}

include('includes/connexion_inc.php');
$pdo = connexion('Y_database.db');

// Récupération des données
$email = $_POST['email'] ?? '';
$password = $_POST['password'] ?? '';
$bio = $_POST['bio'] ?? '';
$photo = $_FILES['photo']['tmp_name'] ?? '';

try {
    $stmt = $pdo->prepare('UPDATE users SET email = :email, bio = :bio WHERE id = :id');
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':bio', $bio);
    $stmt->bindParam(':id', $id);
    $stmt->execute();

    // Mise à jour du mot de passe si fourni
    if (!empty($password)) {
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $stmt = $pdo->prepare('UPDATE users SET mot_de_passe = :password WHERE id = :id');
        $stmt->bindParam(':password', $hashed_password);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    }

    // Gestion de la photo de profil
    if ($photo) {
        $photo_data = file_get_contents($photo);
        $stmt = $pdo->prepare('UPDATE users SET photo = :photo WHERE id = :id');
        $stmt->bindParam(':photo', $photo_data, PDO::PARAM_LOB);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    }

    echo '<p>Profil mis à jour avec succès !</p>';
} catch (PDOException $e) {
    echo '<p>Erreur lors de la mise à jour du profil.</p>';
    echo $e->getMessage();
}

header('Location: ../profile.php');
exit();
?>