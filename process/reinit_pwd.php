<?php

require_once '../inc/global.php';

if ($_POST['send'])
{
	$req = $dbh->prepare('UPDATE users SET pass = ? WHERE id = ?');
	$req->execute(array());

	$increment = $dbh->prepare("UPDATE gallery SET likes = likes + 1 WHERE id = ?");
		$increment->execute(array($img_id));
}