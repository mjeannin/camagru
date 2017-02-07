<?php
require_once 'inc/global.php';
?>

<html lang="fr">
<head>
	<meta charset="utf-8" ?>
	<link rel="stylesheet" type="text/css" href="css/form.css">
	<title>Camagru</title>
</head>
	<title>Formulaire d'inscription</title>
<body>
	<form id= "form" action="#" method="post">
        <label class="form_col" for="lastName">Nom :</label>
        <input name="lastName" id="lastName" type="text" />
        <span class="tooltip">Un nom ne peut pas faire moins de 2 caractères</span>
        <br /><br />

        <label class="form_col" for="firstName">Prénom :</label>
        <input name="firstName" id="firstName" type="text" />
        <span class="tooltip">Un prénom ne peut pas faire moins de 2 caractères</span>
        <br /><br />
	    
	    <label class="form_col" for="login">Pseudo :</label>
        <input name="login" id="login" type="text" />
        <span class="tooltip">Le pseudo ne peut pas faire moins de 4 caractères</span>
        <br /><br />

        <label class="form_col" for="pwd1">Mot de passe :</label>
        <input name="pwd1" id="pwd1" type="password" />
        <span class="tooltip">Le mot de passe ne doit pas faire moins de 6 caractères</span>
        <br /><br />

        <label class="form_col" for="pwd2">Mot de passe (confirmation) :</label>
        <input name="pwd2" id="pwd2" type="password" />
        <span class="tooltip">Le mot de passe de confirmation doit être identique à celui d'origine</span>
        <span class="form_col"></span>
        <br /><br />

        <label class="form_col" for="email">Adresse email :</label>
        <input name="email" id="email" type="text" />
        <span class="tooltip">L'adresse email doit être valide.</span>
        <span class="form_col"></span>
        <br /><br />

        <input type="submit" value="M'inscrire" /> <input type="reset" value="Réinitialiser le formulaire" />
        <br /><br />
	</form>
</body>
<script type="text/javascript" src="js/register.js"></script>
</html>

<?php
        session_start();

$email = $_POST['email'];
$login = $_POST['login'];
 
$cle = md5(microtime(TRUE)*100000);
 
 
// Insertion de la clé dans la base de données (à adapter en INSERT si besoin)
$stmt = $dbh->prepare("UPDATE membres SET cle=:cle WHERE login like :login");
$stmt->bindParam(':cle', $cle);
$stmt->bindParam(':login', $login);
$stmt->execute();
 
 
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
 
http://votresite.com/activation.php?log='.urlencode($login).'&cle='.urlencode($cle).'
 
 
---------------
Ceci est un mail automatique, Merci de ne pas y répondre.';
 
 
mail($destinataire, $sujet, $message, $entete) ; // Envoi du mail
 
//...   
// Fermeture de la connexion    
//...
// Votre code
//...
