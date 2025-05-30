<?php
session_start();

// Utilisé dans register.php

if (isset($_POST['nom']) && isset($_POST['mdp']) && isset($_POST['email'])) {
    $nom = $_POST['nom'];
    $mdp = $_POST['mdp'];
    $email = $_POST['email'];
    $statut = 0;

    include('../includes/connexion_inc.php');
    $pdo = connexion('../Y_database.db');
    try {
        $stmt = $pdo->prepare('INSERT INTO users (nom, email, mot_de_passe, statut) VALUES (:nom, :email, :mot_de_passe, :statut)');
        $stmt->bindParam(':nom', $nom);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':mot_de_passe', $mdp);
        $stmt->bindParam(':statut', $statut);

        $stmt->execute();

        if ($stmt->rowCount() == 1) {
            echo '<p>Ajout effectué</p>';

            $stmt = $pdo->prepare('SELECT id FROM users
            WHERE nom == :nom');
            $stmt->bindParam(':nom', $nom);

            $stmt->execute();
            $requete = $stmt->fetch(PDO::FETCH_ASSOC);

            echo "<pre>";
            var_dump($requete);
            echo "</pre>";

            $_SESSION['id'] = $requete["id"];
            $_SESSION['nom'] = $nom;
            $_SESSION['statut'] = $statut;
        } else {
            echo '<p>Erreur</p>';
        }
    } catch (PDOException $e) {
        echo '<p>Problème PDO</p>';
        echo $e->getMessage();
    }
    $stmt->closeCursor();
    $pdo = null;
?>
    <a href='../accueil.php'>Accueil</a><br>
<?php
} else {
    echo "<p>Mauvais paramètres</p>";
}
?>
