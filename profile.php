<?php

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
            <nav class="profile_img">
                <a href="profile.php"><img src="images/person-circle-outline.svg" alt="profile" width="70" height="70"></a>
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

        <br><br><br><br><br>

        <?php
        if (isset($pseudo)){
        ?>
            <div class="contenu">
                <div class="gauche">
                </div>
                <div class="profile">
                    <nav class="retour">
                        <a href="#"><img src="images/arrow-left.svg" alt="retour" width="40" height="40"></a>
                    </nav>

                    <div class="fond_profile">
                        <img src="images/fond_profile.jpeg" alt="fond_profile">
                    </div>
                    <div class="profile_img">
                        <img src="images/person-circle-outline.svg" alt="profile" width="70" height="70">
                    </div>

                    <div class="edit_button" align="right">
                        <button type="submit">Edit profile</button>
                    </div>

                    <p class="name">name</p>
                    <p> <b>0</b> Following  <b>0</b> Followers</p>


                    <div class="last_info">
                        <div>Posts</div>
                        <div>Replies</div>
                        <div>Highlights</div>
                        <div>Media</div>
                        <div>Likes</div>
                    </div>
                    
                    <div class="content_box">
                    </div>
                    
                </div>
                <div class="droite">
                </div>
            </div>
        <?php
        }
        ?>
        
        <div class="footer">
            <nav class="navigateur">
                <ol>
                    <li class="lien"><a href="accueil.php"><img src="images/home.svg" alt="profil" class="image" width="42" height="42"></a></li>
                    <li class="lien"><a href="#"><img src="images/settings.svg" alt="profil" class="image" width="42" height="42"></a></li>
                    <li class="lien"><a href="#"><img src="images/paper-plane.svg" alt="profil" class="image" width="42" height="42"></a></li>
                    <li class="lien"><a href="#"><img src="images/share.svg" alt="profil" class="image" width="42" height="42"></a></li>
                </ol>
            </nav>
        </div>
    </body>
</html>

