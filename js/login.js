<?php
session_start();
require_once '../php/global.php';

?>
<html lang="fr">
<head>
	<meta charset="utf-8" ?>
	<link rel="stylesheet" type="text/css" href="styles.css">
	<title>Camagru</title>
</head>
	<title>Formulaire d'inscription</title>
<body>
	<form id= "form" action="#" method="post">
		Identifiant : <input type="text" name="login" placeholder="login">
		<br/>
		Mot de passe : <input type="password" name="passwd" placeholder="password">
		<br/>
		<input type="submit" name="submit" value="OK">
	</form>
</body>
</html>