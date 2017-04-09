<?php
require_once '../inc/global.php';
?>
<html lang="fr">
<head>
	<meta charset="utf-8" ?>
	<link rel="stylesheet" type="text/css" href="/Camagru/css/register.css">
	<title>Réinitialiser mon mot de passe</title>
</head>
<body>
	<form id= "form" action="/Camagru/process/reinit_pwd.php" method="post">

        <label class="form_col" for="pwd1">Nouveau mot de passe :</label>
        <input name="pwd1" id="pass" type="password" />
        <br /><br />

        <label class="form_col" for="pwd2">Nouveau mot de passe (confirmation) :</label>
        <input name="pwd2" id="pass2" type="password" />
        <span class="form_col"></span>
        <br /><br />

        <input type="submit" value="Enregistrer" name="send" />
        <br /><br />
        
	</form>
</body>
<script type="text/javascript" src="../js/register.js"></script>
</html>