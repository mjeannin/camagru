<?php 

	require_once "{$_SERVER['DOCUMENT_ROOT']}/Camagru/inc/global.php";

	$result = Array();
	$result['status'] = false;

	if (isset($_POST['post_photo']))
	{	
		$sth = $dbh->prepare("INSERT INTO `gallery` (`id`, `authorid`, `img`, `time`, `likes`) VALUES (NULL,  ?, ?, NOW(), 0)");
		$sth->execute(array($_SESSION['user_id'], $_POST['img']));
		$result['status'] = true;
		$result['img'] = true;
	}
	else
		$result['message'] = "Erreur";

	echo json_encode($result);