<?php
	include_once "{$_SERVER['DOCUMENT_ROOT']}/Camagru/inc/global.php";
	include_once "delete_img.php";

	if ($user['connected'] === false){
		echo("Action impossible hors connexion");
	}
	
	else{
		if(isset($_GET['id'])){
			$img_id =  intval($_GET['id']);

			delete_image($dbh, $img_id);

		$url = "http://localhost:8080/Camagru/pages/gallery.php";
		if(isset($_GET['page'])){
			$url .= "?page={$_GET['page']}";
		}
		
		header("Location: $url");

		}else exit('Erreur');
	}