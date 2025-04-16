<?php
session_start();
$pseudo=$_SESSION["pseudo"];
$mdp=$_SESSION["mdp"];
$statut=$_SESSION["statut"];

function NoConnect(){
    echo "Tu n'es pas connecté<br>";
    echo "<a href='register.php'>Connexion</a><br>";
    echo "<a href='login.php'>Inscription</a><br>";
}


?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <title>Project Y</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <div class="header">
            <nav class="profil">
                <a href="profile.php"><img src="images/person-circle-outline.svg" alt="profil" width="70" height="70"></a>
            </nav>
            <div class="logo">
                <img src="images/logo.jpg" alt="logo" width="70" height="70">
            </div>
            <?php
            if (isset($pseudo)){
            ?>
                <div class="log-out">
                    <a href="login.php"><img src="images/log-out.svg" alt="log-out" width="70" height="70"></a>
                </div>
            <?php
            }
            ?>
            
        </div>

        <br><br><br><br> <!-- Important pour ne pas mettre le contenu derrière le header -->

        <?php
        if (!isset($pseudo)){
            return NoConnect();
        }
        ?>
        <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>fgdgfdgfdgd<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
        
        <div class="footer">
            <nav class="navigateur">
                <ol>
                    <li class="lien"><a href="#"><img src="images/home.svg" alt="profil" class="image" width="42" height="42"></a></li>
                    <li class="lien"><a href="#"><img src="images/settings.svg" alt="profil" class="image" width="42" height="42"></a></li>
                    <li class="lien"><a href="#"><img src="images/paper-plane.svg" alt="profil" class="image" width="42" height="42"></a></li>
                    <li class="lien"><a href="#"><img src="images/share.svg" alt="profil" class="image" width="42" height="42"></a></li>
                </ol>
            </nav>
        </div>
    </body>
</html>

