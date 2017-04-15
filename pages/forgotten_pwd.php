<?php
        include_once "{$_SERVER['DOCUMENT_ROOT']}/Camagru/inc/global.php";
?>

<html lang="fr">
<head>
	<meta charset="utf-8" ?>
	<link rel="stylesheet" type="text/css" href="/Camagru/css/login.css">
        <title>Mot de passe oublié</title>
</head>
<body>
	<div id="main">
		<div class="logo">
            <a href="../pages/gallery.php"><img src="../img/elephant.png" alt="logo" border="0" href="/Camagru/gallery.php"></a>
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
		<div class="footer">created by @mjeannin</div>
	</div> 
</body>
</html>