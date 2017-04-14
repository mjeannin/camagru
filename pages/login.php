<?php
        include_once "{$_SERVER['DOCUMENT_ROOT']}/Camagru/inc/global.php";
?>

<html lang="fr">
<head>
	<meta charset="utf-8" ?>
	<link rel="stylesheet" type="text/css" href="/Camagru/css/login.css">
        <title>Formulaire de connexion</title>
</head>
<body>
        <div id="main">
                <div class="logo">
                   <a href="../pages/gallery.php"><img src="https://image.ibb.co/h1wigF/Screen_Shot_2017_02_06_at_9_59_41_PM.png" alt="logo" border="0" href="/Camagru/gallery.php"></a>
                </div>
                <div id="login_form">
                        <div>
                        	<form id= "form" action="/Camagru/process/log.php" method="post">
                                        <div class="form_input">
                                	        <label class="form_col" for="mail">
                                                        Email :
                                                </label>
                                                <input name="mail" id="mail" type="text"/>
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
                                </form>
                        </div>

                        <div class="form_input">
                                Mot de passe oublié?
                                <div>
                                        <a href="/Camagru/pages/forgotten_pwd.php">Envoyer un mail de récupération</a>
                                </div>
                        </div>

                        <div class="form_input">
                                Pas encore de compte ?
                                <div>
                                        <a href="/Camagru/pages/register.php">S'inscrire</a>
                                </div>
                        </div>
                </div>
                <div class="footer">created by @mjeannin</div> 
        </div>
</body>
<script type="text/javascript" src="js/register.js"></script>
</html>