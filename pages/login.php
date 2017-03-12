<?php
require_once '../inc/global.php';
?>

<html lang="fr">
<head>
	<meta charset="utf-8" ?>
	<link rel="stylesheet" type="text/css" href="css/login.css">
        <title>Formulaire de connexion</title>
</head>
<body>
        <div id="logo">
                <a>
                        <img src="https://image.ibb.co/h1wigF/Screen_Shot_2017_02_06_at_9_59_41_PM.png" alt="logo" border="0">
                </a>
        </div>
        <div id="login_form">
                <div>
                	<form id= "form" action="process/log.php" method="post">
                                <div class="form_input">
                        	        <label class="form_col" for="login">
                                                Pseudo :
                                        </label>
                                        <input name="login" id="login" type="text"/>
                                </div>
                                <div class="form_input">
                                        <label class="form_col" for="pwd1">
                                                Mot de passe :
                                        </label>
                                        <input name="pwd1" id="pwd1" type="password"/>
                                </div>

                                <div class="form_input">
                                        <input type="submit" value="Connexion" name="submit"/>
                                </div>

                                <div class="form_input">
                                        Mot de passe oublié?
                                        <input type="submit" value="Envoyer un mail de récupération"/>
                                </div>
                        </form>
                </div>

                <div class="form_input">
                        Pas encore de compte ?
                        <div>
                                <a href="register.php">S'inscrire</a>
                        </div>
                </div>
        </div>
</body>
<script type="text/javascript" src="js/register.js"></script>
</html>