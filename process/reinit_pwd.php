<?php

require_once "{$_SERVER['DOCUMENT_ROOT']}/Camagru/inc/global.php";

if ($_POST['send'] && $_GET['token'])
{
	$req = $dbh->prepare('UPDATE users SET pass = ? WHERE id = ?');
	$req->execute(array());

	$req = $dbh->prepare('SELECT token FROM tokens WHERE user = ?');
	$req->execute(array($_SESSION['user_id']));
	$count = $req->rowCount();

	if($count != 1){
		echo "Erreur";
		header("Location: http://localhost:8080/Camagru/pages/gallery.php");
	}

	else {
	}
}