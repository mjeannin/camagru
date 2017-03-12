<?php
require_once 'inc/global.php';
require_once 'process/users.php';
?>

<html lang="fr">
<head>
	<meta charset="utf-8" ?>
	<link rel="stylesheet" type="text/css" href="../css/register.css">
	<title>Camagru</title>
</head>
	<title>Formulaire d'inscription</title>
<body>
	<form class="login_form" method="post">
        <div class="form_input">
                <label class="form_col" for="lastName">Nom :</label>
                <input name="lastName" id="lastName" type="text" />
                <span class="tooltip">Un nom ne peut pas faire moins de 2 caractères</span>
        </div>

        <div class="form_input">
                <label class="form_col" for="firstName">Prénom :</label>
                <input name="firstName" id="firstName" type="text" />
                <span class="tooltip">Un prénom ne peut pas faire moins de 2 caractères</span>
        </div>
	    
	<div class="form_input">
                <label class="form_col" for="login">Pseudo :</label>
                <input name="login" id="pseudo" type="text" />
                <span class="tooltip">Le pseudo ne peut pas faire moins de 4 caractères</span>
        <div class="form_input">

        <div class="form_input">
                <label class="form_col" for="pwd1">Mot de passe :</label>
                <input name="pwd1" id="pass" type="password" />
                <span class="tooltip">Le mot de passe ne doit pas faire moins de 6 caractères</span>
        </div>

        <label class="form_col" for="pwd2">Mot de passe (confirmation) :</label>
        <input name="pwd2" id="pass2" type="password" />
        <span class="tooltip">Le mot de passe de confirmation doit être identique à celui d'origine</span>
        <span class="form_col"></span>
        <br /><br />

        <label class="form_col" for="email">Adresse email :</label>
        <input name="email" id="email" type="text" />
        <span class="tooltip">L'adresse email doit être valide.</span>
        <span class="form_col"></span>
        <br /><br />

        <input type="submit" value="M'inscrire" name="send" /> <input type="reset" value="Réinitialiser le formulaire" />
        <br /><br />
	</form>
</body>
<script type="text/javascript" src="../js/register.js"></script>
</html>