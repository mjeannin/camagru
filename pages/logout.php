<?php
	require_once '../inc/global.php';
	session_destroy();

	header("Refresh: 3;URL=gallery.php");

	echo 'Déconnexion en cours, veuillez patienter...';
?>