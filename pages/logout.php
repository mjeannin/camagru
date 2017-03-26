<?php
	require_once '../inc/global.php';
	session_destroy();

	header("Refresh: 3;URL=gallery.php");

	echo 'Votre session a bien été fermée.<br>';
	echo 'Vous allez être redirigé dans quelques secondes.';
?>