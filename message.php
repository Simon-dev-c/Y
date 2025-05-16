<?php
session_start();
$id = $_SESSION['id'] ?? null;
$nom = $_SESSION['nom'] ?? null;
$statut = $_SESSION['statut'] ?? null;

function NoConnect()
{
    echo "Tu n'es pas connecté<br>";
    echo "<a href='login.php'>Connexion</a><br>";
    echo "<a href='register.php'>Inscription</a><br>";
}

?>
<?php
include("includes/head.php");
?>

<br><br><br><br><br>

<?php
if (!isset($nom)) {
    NoConnect();
} else {
?>
<div class="contenu">
    <div class="gauche">
    </div>
    <div class="messages">
        <h2>Messagerie</h2>

        <h3>Envoyer un message :</h3>
        <form action="envoyer_message.php" method="POST" class="message-form">
            <label>Destinataire (ID) :</label>
            <input type="number" name="receiver_id" required><br>
            <label>Message :</label>
            <textarea name="contenu" rows="4" required></textarea><br>
            <button type="submit">Envoyer</button>
        </form>

        <hr>
    <div class="messages-list">
        <h3>Messages reçus :</h3>
        <?php
        include("sql/recup_message_recus.php");
        ?>
    </div>
    <div class="messages-list">
        <h3>Messages envoyés :</h3>
        <?php
        include("sql/recup_message_envoyes.php");
        ?>
    </div>
    </div>
    <div class="droite">
    </div>
</div>
<?php
}
?>

<?php
include("includes/footer.php");
?>
