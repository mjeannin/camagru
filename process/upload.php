<?php

	include_once "{$_SERVER['DOCUMENT_ROOT']}/Camagru/inc/global.php";

	$result = Array();
	$result['status'] = false;
	$result['message'] = false;
	
	if (!empty($_FILES))
	{
		var_dump($_FILES);

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