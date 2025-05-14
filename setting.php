<?php
session_start();
$id = $_SESSION['id'] ?? null;
$nom = $_SESSION['nom'] ?? null;
$statut = $_SESSION['statut'] ?? null;

function NoConnect()
{
    echo "Tu n'es pas connecté<br>";
    echo "<a href='register.php'>Connexion</a><br>";
    echo "<a href='login.php'>Inscription</a><br>";
}

include("sql/recup_setting.php");

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
    <div class="settings">
        <h2>Modifier votre profil</h2>
        <form action="modif_profile.php" method="POST" class="settings-form" enctype="multipart/form-data">
            <label>Email :</label>
            <input type="email" name="email" placeholder="Entrez votre email" value="<?php echo htmlspecialchars($email); ?>" required><br>

            <label>Mot de passe :</label>
            <input type="password" name="password" placeholder="Laissez vide pour ne pas changer"><br>

            <label>Photo de profil :</label>
            <input type="file" name="photo"><br>

            <label>Biographie :</label>
            <textarea name="bio" placeholder="Votre biographie" rows="5"><?php echo htmlspecialchars($bio); ?></textarea><br>

            <button type="submit">Mettre à jour</button>
        </form>
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
