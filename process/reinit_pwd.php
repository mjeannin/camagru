<?php

	require_once "{$_SERVER['DOCUMENT_ROOT']}/Camagru/inc/global.php";

	if(isset($_POST['pwd1']) && isset($_POST['pwd2']) && isset($_POST['token'])){
		$req = $dbh->prepare('SELECT user FROM tokens WHERE token = ?');
		$req->execute(array($_POST['token']));
		$count = $req->rowCount();

		if ($count < 1){
			die('Erreur');
		}
		
		else {
			$id = $req->fetch(PDO::FETCH_ASSOC)['user'];

	        $pass_hache = password_hash($_POST['pwd1'], PASSWORD_BCRYPT);        
	        $req = $dbh->prepare('UPDATE users SET pass = ? WHERE id = ?');
	        $req->execute(array($pass_hache, $id));

	        header("Refresh: 2;URL=/Camagru/pages/gallery.php");
		    echo 'Mot de passe modifié !';
	    }
	}
	else die('Erreur');