<?php
require_once 'inc/global.php';
?>

<html lang="fr">
<head>
	<meta charset="utf-8" ?>
	<link rel="stylesheet" type="text/css" href="css/form.css">
	<title>Camagru</title>
</head>
	<title>Formulaire de connexion</title>
<body>
	<form id= "form" action="process/log.php" method="post">

	       <label class="form_col" for="login">
                        Pseudo :
                </label>
                <input name="login" id="login" type="text"/>
                <br /><br />
                <label class="form_col" for="pwd1">
                        Mot de passe :
                </label>
                <input name="pwd1" id="pwd1" type="password"/>
                <br /><br />

        <input type="submit" value="Connexion" name="submit"/>
        <br /><br />

<!--         Mot de passe oublié?
        <br /><br />
        <input type="submit" value="Envoyer un mail de récupération"/>
        <br /><br />

        Pas encore de compte ?
        <br /><br />
        <input type="submit" href="register.php" value="S'inscrire"/> -->
	</form>
</body>
<script type="text/javascript" src="js/register.js"></script>
</html>