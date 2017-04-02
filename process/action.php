<?php
	include_once "{$_SERVER['DOCUMENT_ROOT']}/Camagru/inc/global.php";

	if(isset($_GET['t'], $_GET['id']) AND !empty($_GET['t']) AND !empty($_GET['id'])){
		$getid = (int) $_GET['id'];
		$gett = (int) $_GET['t'];

		$sessionid = $_SESSION['id'];

		$check = $dbh->prepare("SELECT id FROM gallery WHERE like_id = ?");
		$check->execute(array($getid));

		if($check->rowCount() == 1){
			if($gett == 0){
				$check_like = $dbh->prepare('SELECT id FROM gallery WHERE likes = ? AND like_id = ?');
				$check_like->execute(array($getid, $sessionid));

				if($check_like->rowCount() == 1){
					$del_like = $dbh->prepare('DELETE FROM gallery WHERE likes = ? AND like_id = ?');
					$del_like->execute(array($getid, $sessionid));
				}
				else {
					$ins = $dbh->prepare('INSERT INTO gallery(likes, like_id) VALUES(?, ?)');
					$ins->execute(array($getid, $sessionid));
				}
			}
			header('Location: http://localhost:8080/Camagru/pages/gallery.php?id= '.$getid);
		}else{
			exit('Erreur');
		}
	}else{
		exit('Erreur');
	}