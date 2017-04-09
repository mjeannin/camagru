<?php

function delete_comment($dbh, $comm_id){
	global $user;

	$comm = $dbh->prepare('SELECT * FROM comm WHERE comm_id = ?');
	$comm->execute(array($comm_id));
	$comm = $comm->fetch(PDO::FETCH_ASSOC);

	if ($comm['user_id'] == $user['id']){
		$query = $dbh->prepare('DELETE FROM comm WHERE comm_id = ?');
		$query->execute(array($comm_id));
	}
}