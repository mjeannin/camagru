<?php
        include_once "{$_SERVER['DOCUMENT_ROOT']}/Camagru/inc/global.php";
        include_once "{$_SERVER['DOCUMENT_ROOT']}/Camagru/process/users.php";
?>

<html lang="fr">
<head>
	<meta charset="utf-8" ?>
	<link rel="stylesheet" type="text/css" href="../css/register.css">
	<title>Formulaire d'inscription</title>
</head>
<body>
        <div id="main">
                <div class="logo">
                   <a href="../pages/gallery.php"><img src="../img/elephant.png" alt="logo" border="0" href="/Camagru/gallery.php"></a>
                </div>

                <form id= "form" method="post">
        	
        	<label class="form_col" for="login">Pseudo :</label>
                <input name="login" id="pseudo" type="text" />
                <br /><br />

                <label class="form_col" for="pwd1">Mot de passe :</label>
                <input name="pwd1" id="pass" type="password" />
                <br /><br />

                <label class="form_col" for="pwd2">Confirmer :</label>
                <input name="pwd2" id="pass2" type="password" />
                <span class="form_col"></span>
                <br /><br />

                <label class="form_col" for="email">Adresse email :</label>
                <input name="email" id="email" type="text" />
                <span class="form_col"></span>
                <br /><br />

                <input type="submit" value="M'inscrire" name="send" /> <input type="reset" value="Réinitialiser le formulaire" />
                <br /><br />
        	</form>

                <div class="footer">created by @mjeannin</div>
        </div>
</body>
<script type="text/javascript" src="../js/register.js"></script>
</html>