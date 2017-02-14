<?php 
// Vérification de la validité des informations

// Hachage du mot de passe
if ($_POST['send']) 
{


	$pass_hache = password_hash($_POST['pass'], PASSWORD_BCRYPT);
	$email = $_POST['email'];
	$login = $_POST['login'];

	$req = $dbh->prepare('INSERT INTO users (pseudo, pass, email, date_inscription) VALUES(?, ?, ?, CURDATE())');
	$req->execute(array($login, $pass_hache, $email));

	 
	// $cle = md5(microtime(TRUE)*100000);

	 
	// // Insertion de la clé dans la base de données (à adapter en INSERT si besoin)
	// $stmt = $dbh->prepare("UPDATE membres SET cle=:cle WHERE login like :login");
	// $stmt->bindParam(':cle', $cle);
	// $stmt->bindParam(':login', $login);
	// $stmt->execute();
	 
	 
	// Préparation du mail contenant le lien d'activation
	$destinataire = $email;
	$sujet = "Activer votre compte" ;

	// Pour envoyer un mail HTML, l'en-tête Content-type doit être défini
	        $headers  = 'MIME-Version: 1.0' . "\r\n";
	        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
	        $headers .= 'From: Camagru <marine.jeannin@sciencespo.fr>' ;
	 
	// Le lien d'activation est composé du login(log) et de la clé(cle)
	$message = 'Bienvenue sur Camagru,
	 
	Pour activer votre compte, veuillez cliquer sur le lien ci dessous
	ou copier/coller dans votre navigateur internet.
	 
	http://votresite.com/activation.php?log='.urlencode($login).'
	 
	 
	---------------
	Ceci est un mail automatique, Merci de ne pas y répondre.';
	 
	 
	mail($destinataire, $sujet, $message, $entete) ; // Envoi du mail
	 
	//...   
	// Fermeture de la connexion    
	//...
	// Votre code
	//...
}
