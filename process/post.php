<?php
	include_once "{$_SERVER['DOCUMENT_ROOT']}/Camagru/inc/global.php";
	include_once "comment.php";

	if(isset($_GET['id'], $_POST['comment'])){
		$getid = (int) $_GET['id'];
		$user_id = $_SESSION['user_id'];

		post_comment($dbh, $user_id, $img_id);

	// header('Location: http://localhost:8080/Camagru/pages/gallery.php?id= '.$getid);

	}else{
		exit('Erreur');
	}