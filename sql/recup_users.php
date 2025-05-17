<?php
include("includes/connexion_inc.php");
$pdo = connexion('Y_database.db');

// Utilisé dans accueil

try {
    $stmt = $pdo->query('SELECT users.id, users.nom FROM users');
    $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $i = 0;
    /*
    echo "<pre>";
    var_dump($users);
    echo "</pre>";
    */

    while (isset($users[$i])) {

        echo "<li><a href='view_profile.php?user_id=" . $users[$i]['id'] . "' class='user-link'>" . htmlspecialchars($users[$i]['nom']) . "</a></li>";
        $i++;
    }
} catch (PDOException $e) {
    echo "<p>Erreur lors de la récupération des utilisateurs : " . $e->getMessage() . "</p>";
}
?>
