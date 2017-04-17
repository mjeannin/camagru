<?php

function delete_image($dbh, $img_id){
	global $user;

	$img = $dbh->prepare('SELECT * FROM gallery WHERE id = ?');
	$img->execute(array($img_id));
	$img = $img->fetch(PDO::FETCH_ASSOC);

	if ($img['authorid'] == $user['id']){
		$query = $dbh->prepare('DELETE FROM gallery WHERE id = ?');
		$query->execute(array($img_id));
	}
}