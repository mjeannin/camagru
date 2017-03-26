<?php
	include_once "{$_SERVER['DOCUMENT_ROOT']}/Camagru/inc/global.php";

	$result = Array();
	$result['status'] = false;
	$result['message'] = false;
	
	if (!empty($_FILES))
	{
		var_dump($_FILES);
		//$_FILES['nom']['name']    Le nom original du fichier, comme sur le disque du visiteur (exemple : mon_nom.png).
		// $_FILES['nom']['type'] ;    //Le type du fichier. Par exemple, cela peut être « image/png ».
		// $_FILES['nom']['size'] ;    //La taille du fichier en octets.
		// $_FILES['nom']['tmp_name']; //L'adresse vers le fichier uploadé dans le répertoire temporaire.
		// $_FILES['nom']['error'] ;   //Le code d'erreur, qui permet de savoir si le fichier a bien été uploadé.

		$extensions_valides = array( 'jpg' , 'jpeg' , 'png' );
		$extension_upload = strtolower(  substr(  strrchr($_FILES['nom']['name'], '.')  ,1)  );
		$image_sizes = getimagesize($_FILES['nom']['tmp_name']);

		if (!is_dir($ROOT."/process/uploaded_img")){
			mkdir($ROOT."/process/uploaded_img", 0777, true);
		}

		$nom = md5(uniqid(rand(), true).time());
		$nom = "uploaded_img/{$user['id']}_$nom.$extension_upload";
		var_dump($nom);
		$resultat = move_uploaded_file($_FILES['nom']['tmp_name'],$ROOT."/process/".$nom);

		if ($_FILES['nom']['error'] > 0) $result['message'] = "Erreur lors du transfert";
		if ($_FILES['nom']['size'] > $maxsize) $result['message'] = "Le fichier est trop gros";
		if ( in_array($extension_upload,$extensions_valides) ) $result['message'] = "Extension correcte";
		if ($image_sizes[0] > $maxwidth OR $image_sizes[1] > $maxheight) $result['message'] = "Image trop grande";

		if ($result['message'] == false){
			$result['status'] = true;
			$result['message'] = "Transfert réussi"
		}

	}
	echo json_encode($result);