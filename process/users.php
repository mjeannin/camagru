<?php

// Hachage du mot de passe
if ($_POST['send'])
{
	if (isset($_POST['lastName']) &&
		isset($_POST['firstName']) &&
		isset($_POST['email']) &&
		isset($_POST['pass']) &&
		isset($_POST['pass2']) &&
		!empty($_POST['lastName']) &&
		!empty($_POST['firstName']) &&
		!empty($_POST['email']) &&
		!empty($_POST['pass']) &&
		!empty($_POST['pass2']))
	{
		$lastName = $_POST['lastName'];
		$firstName = $_POST['firstName'];
		$email = $_POST['email'];
		$pass = $_POST['pass'];
		$pass2 = $_POST['pass2'];

		if (!preg_match('/^[a-zA-Z0-9áàâäãåçéèêëíìîïñóòôöõúùûüýÿæœÁÀÂÄÃÅÇÉÈÊËÍÌÎÏÑÓÒÔÖÕÚÙÛÜÝŸÆŒ._-\\s-]{2,}$/i', $lastName))
			echo "Vérifier l'orthographe du nom.";

		else if (!preg_match('/^[a-zA-Z0-9áàâäãåçéèêëíìîïñóòôöõúùûüýÿæœÁÀÂÄÃÅÇÉÈÊËÍÌÎÏÑÓÒÔÖÕÚÙÛÜÝŸÆŒ._-\\s-]{2,}$/i', $firstName))
			echo "Vérifier l'orthographe du prénom.";

		else if(filter_var($email, FILTER_VALIDATE_EMAIL) === false)
			echo "Adresse mail invalide.";

		else if ($pass != $pass2)
			echo "Les mots de passe ne correspondent pas.";

		else{

			$pass_hache = password_hash($_POST['pass'], PASSWORD_BCRYPT);
			$email = $_POST['email'];
			$login = $_POST['login'];

			$req = $dbh->prepare('INSERT INTO users (pseudo, pass, email, date_inscription) VALUES(?, ?, ?, CURDATE())');
			$req->execute(array($login, $pass_hache, $email));
			 
			$destinataire = $email;
			$sujet = "Activer votre compte" ;
			        $headers  = 'MIME-Version: 1.0' . "\r\n";
			        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
			        $headers .= 'From: Camagru <admin@camagru.fr>' ;
			 
			// Le lien d'activation est composé du login(log) et de la clé(cle)
			$message = 'Bienvenue sur Camagru,
			 
			Pour activer votre compte, veuillez cliquer sur le lien ci-dessous
			ou le copier/coller dans votre navigateur internet.
			 
			http://votresite.com/activation.php?log='.urlencode($login).'
			 
			 
			---------------
			Ceci est un mail automatique, Merci de ne pas y répondre.';
			 
			 
			mail($destinataire, $sujet, $message, $entete) ;			 
		}
	}
	else
		echo "Merci de remplir tous les champs.";
}