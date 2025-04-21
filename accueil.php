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
        <div class="contenu">
            <div class="gauche">
            </div>
            <div class="post">
                <form action="ajouter_post.php" method="POST">
                    <label>Message :<textarea name="post" rows="5"></textarea></label>
                    <br>
                    <label><input name="button" type="submit" value="Envoyer"></label><br>
                </form>
                <table class="posts_other">

                </table>
            </div>
            <div class="droite">
            </div>
        </div>
        <?php
        }
        ?>
        <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>fgdgfdgfdgd<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
        

        <?php
        include("includes/footer.php");
?>
