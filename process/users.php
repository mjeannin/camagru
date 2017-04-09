<?php

if ($_POST['send'])
{
	if (isset($_POST['lastName']) &&
		isset($_POST['firstName']) &&
		isset($_POST['login']) &&
		isset($_POST['pwd1']) &&
		isset($_POST['pwd2']) &&
		isset($_POST['email']) &&
		!empty($_POST['lastName']) &&
		!empty($_POST['firstName']) &&
		!empty($_POST['login']) &&
		!empty($_POST['pwd1']) &&
		!empty($_POST['pwd2']) &&
		!empty($_POST['email']))
	{
		$lastName = $_POST['lastName'];
		$firstName = $_POST['firstName'];
		$email = $_POST['email'];
		$pass = $_POST['pwd1'];
		$pass2 = $_POST['pwd2'];

		if (!preg_match('/^\w{2,42}$/i', $lastName))
			echo "Vérifier l'orthographe du nom.";

		else if (!preg_match('/^\w{2,42}$/i', $firstName))
			echo "Vérifier l'orthographe du prénom.";

		else if(filter_var($email, FILTER_VALIDATE_EMAIL) === false)
			echo "Adresse mail invalide.";

		else if ($pass != $pass2)
			echo "Les mots de passe ne correspondent pas.";

		else{
			$req = $dbh->prepare('SELECT email FROM users WHERE email = ?');
			$req->execute(array($email));
			$count = $req->rowCount();

			if ($count > 0){
		    	die ('Adresse email déjà utilisée');
			}

			$pass_hache = password_hash($pass, PASSWORD_BCRYPT);
			$email = $_POST['email'];
			$login = $_POST['login'];
			$token = bin2hex(random_bytes(42));

			$req = $dbh->prepare('INSERT INTO users (pseudo, pass, email, date_inscription, token) VALUES(?, ?, ?, CURDATE(), ?)');
			$req->execute(array($login, $pass_hache, $email, $token));
			 
			$destinataire = $email;
			$sujet = "Activer votre compte" ;
			        $headers  = 'MIME-Version: 1.0' . "\r\n";
			        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
			        $headers .= 'From: Camagru <admin@camagru.fr>' ;
			 
			$message = 'Bienvenue sur Camagru,
			 
			Pour activer votre compte, veuillez cliquer sur le lien ci-dessous
			ou le copier/coller dans votre navigateur internet.
			 
			http://localhost:8080/Camagru/pages/activation.php?token='.urlencode($token).'
			 
			 
			---------------
			Ceci est un mail automatique, Merci de ne pas y répondre.';
			 
			 
			mail($destinataire, $sujet, $message, $entete) ;

			echo "Veuillez valider votre adresse email.";			 
		}
	}
	else
		echo "Merci de remplir tous les champs.";
}