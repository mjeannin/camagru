<?php
	session_start();
	
	define('ROOT', $_SERVER['DOCUMENT_ROOT'].'/Camagru');
	include_once ROOT."/inc/config/database.php";

	try {
	    $dbh = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
	    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	} catch (PDOException $e) {
	    die ('Connexion échouée : ' . $e->getMessage());
	}