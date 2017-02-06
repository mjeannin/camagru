<?php 
  session_start();
?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <title>Test Camagru</title>
        <link rel="stylesheet" href="css/index.css">
    </head>
    <body>
        <div class="header"><?php include_once 'inc/header.php'; ?></div>
        <div class="middle">
        <div class="main">
            <video id="video" width="426" height="320" autoplay></video>
            <button id="snap">Prendre une photo</button>
            <canvas id="canvas" width="426" height="320"></canvas>
        </div>
        <div class="side">
                pics
        </div>
        </div>
        <div class="footer">
            footer
        </div>     
    </body>
<script type="text/javascript" src="js/camera.js"></script>
</html>