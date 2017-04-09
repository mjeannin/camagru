<?php
	include_once "{$_SERVER['DOCUMENT_ROOT']}/Camagru/inc/global.php";
	include_once "comment.php";

	if ($user['connected'] === false){
		echo("Action impossible hors connexion");
	}
	
	else{
		if(isset($_GET['id'], $_POST['comment'])){
			$img_id = (int) $_GET['id'];
			$user_id = $_SESSION['user_id'];
			$text = $_POST['comment'];

			post_comment($dbh, $user_id, $img_id, $text);

		$url = "http://localhost:8080/Camagru/pages/gallery.php";
		if(isset($_GET['page'])){
			$url .= "?page={$_GET['page']}";
		}
		
		header("Location: $url");

		}else{
			exit('Erreur');
		}
	}