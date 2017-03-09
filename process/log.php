<?php 
	if(isset($_POST['submit'])){
		if(empty($_POST['login'])){
			$errors[] = "Veuillez saisir votre pseudo";
		}
		if(empty($_POST['pwd1'])){
			$errors[] = "Veuillez saisir votre mot de passe";
		}
		if(!empty($errors)){
			foreach($errors as $error){
				echo"<div class='error'>".$error."</div>";
			}
		}
		$pass_hache = password_hash($_POST['pwd1'], PASSWORD_BCRYPT);

		$req = $dbh->prepare('SELECT id FROM users WHERE pseudo = :pseudo AND pass = :pass');

		$req->execute(array(
		    'pseudo' => $login,
		    'pass' => $pass_hache));

		$resultat = $req->fetch();

		if (!$resultat)
		{
		    echo 'Erreur d\'identification';
		}

		else
		{
		    session_start();
		    $_SESSION['id'] = $resultat['id'];
		    $_SESSION['pseudo'] = $login;
		    echo 'Vous êtes connecté !';
		}
	}