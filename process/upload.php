<?php
$_FILES['icone']['name']     //Le nom original du fichier, comme sur le disque du visiteur (exemple : mon_icone.png).
$_FILES['icone']['type']     //Le type du fichier. Par exemple, cela peut être « image/png ».
$_FILES['icone']['size']     //La taille du fichier en octets.
$_FILES['icone']['tmp_name'] //L'adresse vers le fichier uploadé dans le répertoire temporaire.
$_FILES['icone']['error']    //Le code d'erreur, qui permet de savoir si le fichier a bien été uploadé.

$extensions_valides = array( 'jpg' , 'jpeg' , 'png' );
$extension_upload = strtolower(  substr(  strrchr($_FILES['icone']['name'], '.')  ,1)  );
$image_sizes = getimagesize($_FILES['icone']['tmp_name']);
mkdir('fichier/1/', 0777, true);
$nom = md5(uniqid(rand(), true));
$nom = "avatars/{$user_id}.{$extension_upload}";
$resultat = move_uploaded_file($_FILES['icone']['tmp_name'],$nom);

if ($_FILES['icone']['error'] > 0) $erreur = "Erreur lors du transfert";
if ($_FILES['icone']['size'] > $maxsize) $erreur = "Le fichier est trop gros";
if ( in_array($extension_upload,$extensions_valides) ) echo "Extension correcte";
if ($image_sizes[0] > $maxwidth OR $image_sizes[1] > $maxheight) $erreur = "Image trop grande";
if ($resultat) echo "Transfert réussi";

$result = Array();
	$result['status'] = false;

	if ($_POST['post_photo'])
	{	
		$sth = $dbh->prepare("INSERT INTO `gallery` (`id`, `authorid`, `img`, `time`) VALUES (NULL,  ?, ?, NOW())");
		$sth->execute(array(1, $_POST['img']));
		$result['status'] = true;
		$result['img'] = true;
	}
	else
		$result['message'] = "Erreur";

	echo json_encode($result);