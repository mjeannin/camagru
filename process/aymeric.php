<?php 

	include_once '../inc/global.php';

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