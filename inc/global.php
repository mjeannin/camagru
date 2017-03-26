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

	$user['connected'] = false;
	if (isset($_SESSION['user_id']))
	{
		$_SESSION['user_id'] = intval($_SESSION['user_id']);
		$tmp = $dbh->query("SELECT * FROM `users` WHERE `id` = {$_SESSION['user_id']} ORDER BY `id` DESC");
		$user = $tmp->fetch(PDO::FETCH_ASSOC);
		$user['connected'] = true;
	}