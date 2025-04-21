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
        if (isset($nom)) {
        ?>
            <div class="log-out">
                <a href="logout.php"><img src="images/log-out.svg" alt="log-out" width="70" height="70"></a>
            </div>
        <?php
        }
        ?>

    </div>
