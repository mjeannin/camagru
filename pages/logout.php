<?php
	require_once '../inc/global.php';
	session_destroy();

	header("Refresh: 5;URL=gallery.php");

	echo 'Votre session a bien été fermée.';
	echo 'Vous allez être redirigé dans quelques secondes.';
?>