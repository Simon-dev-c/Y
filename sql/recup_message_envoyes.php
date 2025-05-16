<?php

// Utilisé dans message

/*
On devrait le mettre mais on l'a déjà dans message.php car on inclu recup_message_recus.php
include("includes/connexion_inc.php");
$pdo = connexion('Y_database.db');
*/

try {
    $stmt = $pdo->prepare('SELECT messages.id, messages.contenu, messages.date, users.nom AS receiver_name FROM messages INNER JOIN users ON messages.receiver_id = users.id WHERE messages.sender_id = :id ORDER BY messages.date DESC');
    $stmt->bindParam(':id', $id);
    $stmt->execute();

    while ($message = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo "<div class='message_item'>";
        echo "<strong>À " . htmlspecialchars($message['receiver_name']) . " :</strong> " . htmlspecialchars($message['contenu']) . "<br>";
        echo "<small>Envoyé le : " . htmlspecialchars($message['date']) . "</small>";
        echo "</div>";
        echo "<hr>";
    }
} catch (PDOException $e) {
    echo "<p>Erreur lors de la récupération des messages envoyés.</p>";
}
?>
