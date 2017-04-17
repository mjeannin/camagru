<?php
	include_once "{$_SERVER['DOCUMENT_ROOT']}/Camagru/inc/global.php";
	include_once "comment.php";

	if ($user['connected'] === false){
		echo("Action impossible hors connexion");
	}
	
	else{
		if(isset($_GET['id'], $_POST['comment'])){
			$img_id = (int) $_GET['id'];
			$user_id = $_SESSION['user_id'];
			$text = $_POST['comment'];

			post_comment($dbh, $user_id, $img_id, $text);

			$query = $dbh->prepare('SELECT user_id FROM comm WHERE img_id = ?');
			$query->execute(array($img_id));
			$result = $query->fetch();

			$req = $dbh->prepare('SELECT email FROM users WHERE id = ?');
			$req->execute(array($result['user_id']));
			$dest = $req->fetch();

			$destinataire = $dest['email'];
			$sujet = "Vous avez reçu une nouvelle notification !" ;
			$headers  = 'MIME-Version: 1.0' . "\r\n";
			$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
			$headers .= 'From: Camagru <admin@camagru.fr>' ;
			 
			$message = 'Cher utilisateur,
			 
			Votre post a reçu un nouveau commentaire ! Pour le voir, connectez-vous sur Camagru :

			http://localhost:8080/Camagru/pages/gallery.php
			 
			---------------
			Ceci est un mail automatique, Merci de ne pas y répondre.';
			 
			mail($destinataire, $sujet, $message, $entete) ;

			$url = "http://localhost:8080/Camagru/pages/gallery.php";
			if(isset($_GET['page'])){
				$url .= "?page={$_GET['page']}";
			}
			
			header("Location: $url");

			}else{
				exit('Erreur');
			}
		}