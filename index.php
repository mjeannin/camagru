<?php 
  include_once "inc/global.php";
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <title>Camagru</title>
        <link rel="stylesheet" href="css/index.css">
    </head>
    <body>
        <div class="header"><?php include_once 'inc/header.php'; ?></div>
        <div class="middle">
        <div class="frame">
            <h3>Calques</h3>
            <div class="gallery">
                    <div class="pic">
                        <img src="img/apple.png" alt="apple" border="0" width="150">
                    </div>
                    <div class="pic">
                        <img src="img/beer.png" alt="beer" border="0" width="150">
                    </div>
                    <div class="pic">
                        <img src="img/frame.png" alt="frame" border="0" width="150">
                    </div>
                    <div class="pic">
                        <img src="img/hand.png" alt="hand" border="0" width="150">
                    </div>
                    <div class="pic">
                        <img src="img/mask.png" alt="mask" border="0" width="150">
                    </div>
            </div>
        </div>
        <div class="main">
            <h3>Publier une nouvelle photo</h3>
            <div>
                <video id="video" width="426" height="320" autoplay></video>
            </div>
            <div>
                <span class="button" id="snap">Prendre une photo</span>
            </div>
            <div>
                <canvas id="canvas" width="426" height="320"></canvas>
            </div>
            <div>
                <span class="button" id="post">Publier</span>
            </div>
        </div>
        <div class="side">
            <div class="gallery">
                <h3>Galerie</h3>
                <div class="pic">
                    <img src="img/ex1.png" alt="ex1" border="0" height="250">
                </div>
                <div class="pic">
                    <img src="img/ex2.png" alt="ex2" border="0" height="250">
                </div>
                <div class="pic">
                    <img src="img/ex3.png" alt="ex3" border="0" height="250">
                </div>
            </div>
        </div>
        </div>
        <div class="footer">
            created by @mjeannin
        </div>     
    </body>
<script type="text/javascript" src="js/camera.js"></script>
</html>