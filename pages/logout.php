<?php

	include_once "{$_SERVER['DOCUMENT_ROOT']}/Camagru/inc/global.php";
	session_destroy();

	header("Refresh: 3;URL=gallery.php");

	echo 'Déconnexion en cours, veuillez patienter...';