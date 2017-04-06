<?php 
	require_once '../inc/global.php';

	$token = $_GET["token"];
	$req = $dbh->prepare('SELECT id, pseudo FROM users WHERE token = :token');
	$req->execute(array(
		    'token' => $token));
	$resultat = $req->fetch();

	if (!$resultat){
		echo 'Erreur d\'identification';
	}

	else{
		$_SESSION['user_id'] = $resultat['id'];
		$req = $dbh->prepare('UPDATE users SET validation=1 WHERE id = :id');
		$req->execute(array(
		    'id' => $resultat['id']));
		$resultat = $req->execute();

		header("Refresh: 2;URL=main.php");

		echo 'Enregistrement confirmé !<br>';
		echo 'Vous allez être redirigé dans quelques secondes.';
	}