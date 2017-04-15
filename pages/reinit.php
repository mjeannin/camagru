<?php
        require_once "{$_SERVER['DOCUMENT_ROOT']}/Camagru/inc/global.php";

        if(isset($_GET['token'])){
                $req = $dbh->prepare('SELECT id FROM tokens WHERE token = ?');
                $req->execute(array($_GET['token']));
                $count = $req->rowCount();

                if ($count < 1){
                        die('Erreur');
                }
        }

        else{
                header("Location: http://localhost:8080/Camagru/pages/gallery.php");
                exit;
        }
?>

<html lang="fr">
<head>
	<meta charset="utf-8" ?>
	<link rel="stylesheet" type="text/css" href="/Camagru/css/register.css">
	<title>Réinitialiser mon mot de passe</title>
</head>
<body>
        <div class="logo">
                <a href="../pages/gallery.php"><img src="../img/elephant.png" alt="logo" border="0" href="/Camagru/gallery.php"></a>
        </div>
	<form id= "form" action="/Camagru/process/reinit_pwd.php" method="post">

        <label class="form_col" for="pwd1">Nouveau mot de passe :</label>
        <input name="pwd1" id="pass" type="password" />
        <br /><br />

        <label class="form_col" for="pwd2">Confirmer :</label>
        <input name="pwd2" id="pass2" type="password" />
        <span class="form_col"></span>
        <br /><br />

        <input name="token" type="hidden" value="<?= $_GET['token']?>"/>

        <input type="submit" value="Enregistrer" name="send" />
        <br /><br />
        
	</form>
        <div class="footer">created by @mjeannin</div> 
</body>
<script type="text/javascript" src="../js/register.js"></script>
</html>