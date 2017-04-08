<?php
	include_once "{$_SERVER['DOCUMENT_ROOT']}/Camagru/inc/global.php";
	include_once "delete_comm.php";

	if ($user['connected'] === false){
		echo("Action impossible hors connexion");
	}
	
	else{
		if(isset($_GET['id'])){
			$comm_id = (int) $_GET['id'];

			delete_comment($dbh, $comm_id);

		header('Location: http://localhost:8080/Camagru/pages/gallery.php?id= '.$getid);

		}else{
			exit('Erreur');
		}
	}