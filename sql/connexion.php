<?php
session_start();

// Utilisé dans login

if (isset($_POST['nom']) && isset($_POST['mdp']) ) {
    $nom = $_POST['nom'];
    $mdp = $_POST['mdp'];

    include('../includes/connexion_inc.php');
    $pdo = connexion('../Y_database.db');
    try {
        $stmt = $pdo->prepare('SELECT id,nom,statut FROM users
        WHERE nom == :nom
        AND mot_de_passe == :mot_de_passe');
        $stmt->bindParam(':nom', $nom);
        $stmt->bindParam(':mot_de_passe', $mdp);

        $stmt->execute();
        $requete = $stmt->fetch(PDO::FETCH_ASSOC);

        echo "<pre>";
        var_dump($requete);
        echo "</pre>";

        if (isset($requete['nom']) && isset($requete['statut'])) {
            echo '<p>Connexion effectué</p>';
            
            $_SESSION['id'] = $requete['id'];
            $_SESSION['user_id'] = $requete['id'];
            $_SESSION['nom'] = $nom;
            $_SESSION['statut'] = $requete["statut"];
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
