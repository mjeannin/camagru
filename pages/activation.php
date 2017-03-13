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
		session_start();
		$_SESSION['id'] = $resultat['id'];
		$_SESSION['pseudo'] = $resultat['pseudo'];

		$req = $dbh->prepare('UPDATE users SET validation=1 WHERE id = :id');

		$req->execute(array(
		    'id' => $resultat['id']));

		$resultat = $req->execute();

		header("Refresh: 5;URL=main.php");

		echo 'Enregistrement confirmé !'
		echo 'Vous allez être redirigé dans quelques secondes.';
	}

