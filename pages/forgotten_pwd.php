<?php
        require_once '../inc/global.php';
?>

<html lang="fr">

<head>
	<meta charset="utf-8" ?>
	<link rel="stylesheet" type="text/css" href="/Camagru/css/login.css">
        <title>Formulaire de connexion</title>
</head>

<title>Mot de passe oublié</title>

<body>

	<div id="logo">
        <a>
            <img src="https://image.ibb.co/h1wigF/Screen_Shot_2017_02_06_at_9_59_41_PM.png" alt="logo" border="0">
    	</a>
    </div>

	<div id="login_form">
		<div id="for_pwd">
		<form id= "form" action="/Camagru/process/mail_recup.php" method="post">

	        <label class="form_col" for="email">Adresse email :</label>
	        <input name="email" id="email" type="text" />
	        <span class="form_col"></span>
	        <br /><br />

	        <input type="submit" value="Envoyer un e-mail de récupération" name="mail" />
	        <br /><br />
		</form>
		</div>
	</div>

</body>

</html>