<?php
	include_once "{$_SERVER['DOCUMENT_ROOT']}/Camagru/inc/global.php";

	function photo_is_liked($dbh, $user_id, $img_id){
		$check = $dbh->prepare("SELECT likes_id FROM likes WHERE user_id = ? AND img_id = ?");
		$check->execute(array($user_id, $img_id));

		if ($check->rowCount() > 0){
			return true;
		} else {
			return false;
		}
	}

	function like_photo($dbh, $user_id, $img_id){
		$query = $dbh->prepare("INSERT INTO likes VALUES(?, ?, NULL)");
		$query->execute(array($img_id, $user_id));

		$increment = $dbh->prepare("UPDATE gallery SET likes = likes + 1 WHERE id = ?");
		$increment->execute(array($img_id));
	}

	function unlike_photo($dbh, $user_id, $img_id){
		$query = $dbh->prepare('DELETE FROM likes WHERE img_id = ? AND user_id = ?');
		$query->execute(array($img_id, $user_id));

		$decrement = $dbh->prepare("UPDATE gallery SET likes = likes - 1 WHERE id = ?");
		$decrement->execute(array($img_id));
	}

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