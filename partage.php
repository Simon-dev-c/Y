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
include("includes/connexion_inc.php");
$pdo = connexion('Y_database.db');
echo "<br><br><br><br><br>";
include("includes/head.php");
?>
<?php
if (!isset($id)) {
    NoConnect();
} else {
?>
<div class="contenu">
    <div class="partage">
        <h2>Partager une photo</h2>
        <form action="sql/upload_photo.php" method="POST" enctype="multipart/form-data" class="partage-form">
            <label>Choisissez une photo :</label>
            <input type="file" id="photoInput" name="photo" accept="image/*" required>

            <label>Légende :</label>
            <textarea name="caption" rows="3" placeholder="Ajouter une légende..."></textarea>

            <button type="submit">Partager</button>
        </form>
    </div>
</div>
<?php
}
?>
<?php
include("includes/footer.php");
?>
