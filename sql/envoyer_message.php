<?php
session_start();
$id = $_SESSION['id'] ?? null;

if (!$id) {
    header('Location: login.php');
    exit();
}

include('../includes/connexion_inc.php');
$pdo = connexion('../Y_database.db');

$receiver_id = $_POST['receiver_id'] ?? null;
$contenu = trim($_POST['contenu']) ?? '';
$date = date('Y-m-d H:i:s');

if ($receiver_id && !empty($contenu)) {
    try {
        $stmt = $pdo->prepare('INSERT INTO messages (sender_id, receiver_id, contenu, date) VALUES (:sender_id, :receiver_id, :contenu, :date)');
        $stmt->bindParam(':sender_id', $id);
        $stmt->bindParam(':receiver_id', $receiver_id);
        $stmt->bindParam(':contenu', $contenu);
        $stmt->bindParam(':date', $date);
        $stmt->execute();

        echo '<p>Message envoyé avec succès !</p>';
    } catch (PDOException $e) {
        echo "<p>Erreur lors de l'envoi du message.</p>";
        echo $e->getMessage();
    }
} else {
    echo '<p>Erreur : Veuillez remplir tous les champs.</p>';
}

header('Location: ../message.php');
exit();
?>
