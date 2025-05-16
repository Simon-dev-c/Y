<?php
include("includes/connexion_inc.php");
$pdo = connexion('Y_database.db');

// Utilisé dans message

try {
$stmt = $pdo->prepare('SELECT messages.id, messages.contenu, messages.date, users.nom AS sender_name FROM messages INNER JOIN users ON messages.sender_id = users.id WHERE messages.receiver_id = :id ORDER BY messages.date DESC');
$stmt->bindParam(':id', $id);
$stmt->execute();

while ($message = $stmt->fetch(PDO::FETCH_ASSOC)) {
echo "<div class='message_item'>";
    echo "<strong>" . htmlspecialchars($message['sender_name']) . " :</strong> " . htmlspecialchars($message['contenu']) . "<br>";
    echo "<small>Reçu le : " . htmlspecialchars($message['date']) . "</small>";
    echo "</div>";
echo "
<hr>";
}
} catch (PDOException $e) {
echo "<p>Erreur lors de la récupération des messages reçus.</p>";
}
?>
