<?php

	require_once "{$_SERVER['DOCUMENT_ROOT']}/Camagru/inc/global.php";

	if ($_POST['mail'])
	{
		$email = $_POST['email'];

		$req = $dbh->prepare('SELECT id FROM users WHERE email = ?');
		$req->execute(array($email));
		$count = $req->rowCount();

		if ($count < 1){
			echo 'Erreur d\'adresse email';
		}
		
		else {
			$token = md5(time().md5($email).uniqid(time()));

			$req = $req->fetch(PDO::FETCH_ASSOC);
			$query = $dbh->prepare('INSERT INTO tokens(id, token, user) VALUES(NULL, ?, ?)');
			$query->execute(array($token, $req['id']));
		
			echo "Mail de récupération envoyé";
	 
			$destinataire = $email;
			$sujet = "Réinitialiser votre mot de passe" ;
			$headers  = 'MIME-Version: 1.0' . "\r\n";
			$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
			$headers .= 'From: Camagru <admin@camagru.fr>' ;
			 
			$message = 'Bonjour,
			 
			Pour modifier votre mot de passe, veuillez cliquer sur le lien ci-dessous
			ou le copier/coller dans votre navigateur internet.
			 
			http://localhost:8080/Camagru/pages/reinit.php?token='.urlencode($token).'
			 
			---------------
			Ceci est un mail automatique, Merci de ne pas y répondre.';
			 
			mail($destinataire, $sujet, $message, $entete) ;
		}
	}