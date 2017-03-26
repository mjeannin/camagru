<?php
require_once '../inc/global.php';
?>

<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="utf-8">
		<title>Camagru</title>
		<link rel="stylesheet" href="../css/index.css">
	</head>
	<body>
		<div class="header"><?php include_once '../inc/header.php'; ?></div>
		<div class="middle">
			<div class="frame">
				<h3>Calques</h3>
				<div class="gallery">
						<div class="pic">
						   <label>
								<img id="apple" src="/Camagru/img/apple.png" alt="apple" border="0" width="150">
								<input type="radio" name="pic" value="apple">
						   </label>
						</div>
						<div class="pic">
							<label>
								<img id="beer" src="/Camagru/img/beer.png" alt="beer" border="0" width="150">
								<input type="radio" name="pic" value="beer">
						   </label>
						</div>
						<div class="pic">
						   <label>
								<img id="frame" src="/Camagru/img/frame.png" alt="frame" border="0" width="150">
								<input type="radio" name="pic" value="frame">
						   </label>
						</div>
						<div class="pic">
							<label>
								<img id="hand" src="/Camagru/img/hand.png" alt="hand" border="0" width="150">
								<input type="radio" name="pic" value="hand">
						   </label>
						</div>
						<div class="pic">
							<label>
								<img id="mask" src="/Camagru/img/mask.png" alt="mask" border="0" width="150">
								<input type="radio" name="pic" value="mask">
						   </label>
						</div>
						<div>
							<span class="pic" id="clear">#nofilter</span>
						</div>
				</div>
			</div>
			<div class="main">
				<h3>Publier une nouvelle photo</h3>
				<div>
					<canvas id="canvas" width="426" height="320" style="position: absolute;"></canvas>
					<video id="video" width="426" height="320" autoplay></video>
				</div>

				<div>
					<span class="button" id="snap">Prendre une photo</span>
				</div>
				<div>
					<form method="post" action="/process/upload.php" enctype="multipart/form-data">
						<input type="file" name="nom" id="upload_picture"/>
					</form>
				</div>
				<div>
					<canvas id="canevase" width="426" height="320"></canvas>
				</div>
				<div>
					<input id="send" class="button" type="submit" name="Publier" value="Publier">
				</div>
			</div>
			<div class="side">
				<div class="gallery">
					<h3>Mes photos</h3>
					<div id="result"></div>
					<?php

						$req = $dbh->prepare('SELECT img, authorid FROM gallery WHERE authorid = :id');

						$req->execute(array(
						    'id' => $_SESSION['id']));

						while ($photos = $req->fetch()){
							?>
					<div class="">
						<div>
							<img src="<?= $photos['img'] ?>" alt="ex1" border="0" height="250">
						</div>
					</div>
					<?php }?>
				</div>
			</div>
		</div>
		<div class="footer">
			created by @mjeannin
		</div>     
	</body>
	<script type="text/javascript" src="/Camagru/js/ajax.js"></script>
	<script type="text/javascript" src="/Camagru/js/camera.js"></script>
</html>