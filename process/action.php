<?php
	include_once "{$_SERVER['DOCUMENT_ROOT']}/Camagru/inc/global.php";
	include_once "likes.php";

	if ($user['connected'] === false){
		echo("Action impossible hors connexion");
	}
	
	else{
		if(isset($_GET['t'], $_GET['id'])){
			$getid = (int) $_GET['id'];
			$gett = (int) $_GET['t'];
			$user_id = $_SESSION['user_id'];

			if (photo_is_liked($dbh, $user_id, $getid)){
				unlike_photo($dbh, $user_id, $getid);
			} else {
				like_photo($dbh, $user_id, $getid);
			}

		$url = "http://localhost:8080/Camagru/pages/gallery.php";
		if(isset($_GET['page'])){
			$url .= "?page={$_GET['page']}";
		}
		
		header("Location: $url");

		}else{
			exit('Erreur');
		}
	}