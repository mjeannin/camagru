<?php
require_once "{$_SERVER['DOCUMENT_ROOT']}/Camagru/inc/global.php";

if ($_POST['mail'])
{
	$email = $_POST['mail'];
	$token = md5(random_bytes(42));

	$req = $dbh->prepare('INSERT INTO tokens(id, token, user) VALUES(NULL, ?, ?)');
	$req->execute(array($token, $_SESSION['user_id']));

	$req = $dbh->prepare('SELECT email FROM users WHERE email = ?');
	$req->execute(array($email));
	$count = $req->rowCount();

	if ($count < 1){
		    echo 'Erreur d\'adresse email';
		}

	else {
		echo "Mail de récupération envoyé";
 
		$destinataire = $email;
		$sujet = "Activer votre compte" ;
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