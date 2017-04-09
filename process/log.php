<?php 
	require_once '../inc/global.php';
	if(isset($_POST['submit'])){
		if(empty($_POST['mail'])){
			$errors[] = "Veuillez saisir votre e-mail";
		}
		if(empty($_POST['pwd1'])){
			$errors[] = "Veuillez saisir votre mot de passe";
		}
		if(!empty($errors)){
			foreach($errors as $error){
				echo"<div class='error'>".$error."</div>";
			}
		}

		$req = $dbh->prepare('SELECT id,pass FROM users WHERE email = ?');
		$req->execute(array($_POST['mail']));
		$resultat = $req->fetch(PDO::FETCH_ASSOC);
		
		if (!$resultat || !password_verify($_POST['pwd1'],$resultat['pass'])){
		    echo 'Erreur d\'identification';
		}

		else {
		    $_SESSION['user_id'] = $resultat['id'];
		    header("Refresh: 2;URL=/Camagru/pages/gallery.php");
		    echo 'Connexion en cours, veuillez patienter...';
		}
	}