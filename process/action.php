<?php
	include_once "{$_SERVER['DOCUMENT_ROOT']}/Camagru/inc/global.php";

	if(isset($_GET['t'], $_GET['id']) AND !empty($_GET['t']) AND !empty($_GET['id'])){
		$getid = (int) $_GET['id'];
		$gett = (int) $_GET['t'];

		$check = $dbh->prepare("SELECT if FROM gallery WHERE id = ?");
		$check->execute(array($getid));

		if($check->rowCount() == 1){
			if($gett == 0){
				$ins = $dbh->prepare('INSERT INTO gallery(likes) VALUES(?)');
				$ins->execute(array($getid));
			}
			header('Location: http://localhost:8080/Camagru/pages/gallery.php?id= '.$getid);
		}else{
			exit('Erreur');
		}
	}else{
		exit('Erreur');
	}