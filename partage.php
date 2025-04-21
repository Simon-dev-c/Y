<?php
session_start();
$id = $_SESSION["id"] ?? null;
$nom = $_SESSION["nom"] ?? null;
$statut = $_SESSION['statut'] ?? null;

function NoConnect(){
    echo "Tu n'es pas connecté<br>";
    echo "<a href='register.php'>Connexion</a><br>";
    echo "<a href='login.php'>Inscription</a><br>";
}


?>
<?php
include("includes/head.php");
?>

        <br><br><br><br><br> <!-- Important pour ne pas mettre le contenu derrière le header -->
        <?php
        if (!isset($nom)){
            NoConnect();
        }
        ?>

<?php
        include("includes/footer.php");
?>
