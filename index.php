<?php 
  session_start();
  include_once('verif.php');
  include_once 'php/global.php';
?>

<!DOCTYPE html>
<html lang="fr">
<head>
  	<meta charset="utf-8" ?>
  	<link rel="stylesheet" type="text/css" href="styles.css">
  	<title>Michael Bay in da place</title>
</head>
<body>
    <div id="global">
        <?php include_once 'php/header.php'; ?>
          <div id="main">
              <div id="overview">
                  <video id="video" width="640" height="480" autoplay></video>
                  <button id="snap">Snap Photo</button>
                  <canvas id="canvas" width="640" height="480"></canvas>
              </div>
              <div id="list">
                  Liste des images superposables
              </div>
          </div>
          <div id="side">
              Section latérale, affichant les miniatures de toutes les photos prises précedemment.
          </div>
        <?php include_once 'php/footer.php'; ?>
    </div>
</body>
<script type="text/javascript" src="js/camera.js"></script>
</html>