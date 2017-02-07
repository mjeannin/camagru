<?php
	session_start();
	
	define('ROOT', $_SERVER['DOCUMENT_ROOT'].'/Camagru');
	include_once ROOT."/inc/config/database.php";

	try {
	    $dbh = new PDO($dsn, $user, $password);
	} catch (PDOException $e) {
	    echo 'Connexion échouée : ' . $e->getMessage();
	}