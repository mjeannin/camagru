<?php 
	include_once "inc/global.php";
	$sth = $dbh->query('SELECT * FROM `gallery` ORDER BY `id` DESC');
	$photos = $sth->fetchAll();

	$page = htmlentities($_GET['page']);
	$pages = scandir('pages');

	if(!empty($page) && in_array($_GET['page'].".php",$pages)){
		$redirecturl = "/Camagru/pages/" . $_GET['page'] . ".php" . "?page=1";
		header("Location:" . $redirecturl);
	}
	else{
		header("Location:/Camagru/pages/gallery.php?page=1");
	}
?>