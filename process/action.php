<?php
	include_once "{$_SERVER['DOCUMENT_ROOT']}/Camagru/inc/global.php";
	include_once "likes.php";

	if(isset($_GET['t'], $_GET['id'])){
		$getid = (int) $_GET['id'];
		$gett = (int) $_GET['t'];
		$user_id = $_SESSION['user_id'];

		if (photo_is_liked($dbh, $user_id, $getid)){
			unlike_photo($dbh, $user_id, $getid);
		} else {
			like_photo($dbh, $user_id, $getid);
		}

	header('Location: http://localhost:8080/Camagru/pages/gallery.php?id= '.$getid);

	}else{
		exit('Erreur');
	}