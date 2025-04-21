<?php
session_start();
$id = $_SESSION["id"] ?? null;
$nom = $_SESSION["nom"] ?? null;
$statut = $_SESSION['statut'] ?? null;

function NoConnect(){
    echo "Tu n'es pas connecté<br>";
    echo "<a href='login.php'>Connexion</a><br>";
    echo "<a href='register.php'>Inscription</a><br>";
}


?>
<?php
include("includes/head.php");
?>

        <br><br><br><br><br> <!-- Important pour ne pas mettre le contenu derrière le header -->
        <?php
        if (!isset($nom)){
            NoConnect();
        }else{
        ?>

        <?php
        }
        ?>
        <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>fgdgfdgfdgd<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
        

        <?php
        include("includes/footer.php");
?>
