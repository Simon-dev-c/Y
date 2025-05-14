<?php
session_start();
$id = $_SESSION['id'] ?? null;

if (!$id) {
    header('Location: login.php');
    exit();
}

include('includes/connexion_inc.php');
$pdo = connexion('Y_database.db');

if (isset($_FILES['photo']) && $_FILES['photo']['error'] === 0) {
    $caption = $_POST['caption'] ?? '';
    $photo = $_FILES['photo'];

    // Vérifier le type de fichier
    $allowed_types = ['image/jpeg', 'image/png', 'image/gif'];
    if (in_array($photo['type'], $allowed_types)) {
        $file_path = 'uploads/' . uniqid() . '_' . basename($photo['name']);

        if (move_uploaded_file($photo['tmp_name'], $file_path)) {
            try {
                $stmt = $pdo->prepare('INSERT INTO posts (user_id, contenu, date) VALUES (:user_id, :contenu, :date)');
                $stmt->bindParam(':user_id', $id);
                $stmt->bindParam(':contenu', $file_path);
                $stmt->bindParam(':date', date('Y-m-d H:i:s'));
                $stmt->execute();
                echo '<p>Photo partagée avec succès !</p>';
            } catch (PDOException $e) {
                echo '<p>Erreur lors du partage de la photo : ' . $e->getMessage() . '</p>';
            }
        } else {
            echo '<p>Erreur lors du téléchargement de la photo.</p>';
        }
    } else {
        echo '<p>Type de fichier non autorisé. Seuls JPEG, PNG et GIF sont acceptés.</p>';
    }
} else {
    echo '<p>Aucun fichier sélectionné ou erreur lors du téléchargement.</p>';
}

header('Location: ../accueil.php');
exit();
?>