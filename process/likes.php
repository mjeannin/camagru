<?php

function photo_is_liked($dbh, $user_id, $img_id){
		$check = $dbh->prepare("SELECT likes_id FROM likes WHERE user_id = ? AND img_id = ?");
		$check->execute(array($user_id, $img_id));

		if ($check->rowCount() > 0){
			return true;
		} else {
			return false;
		}
	}

	function like_photo($dbh, $user_id, $img_id){
		$query = $dbh->prepare("INSERT INTO likes VALUES(?, ?, NULL)");
		$query->execute(array($img_id, $user_id));

		$increment = $dbh->prepare("UPDATE gallery SET likes = likes + 1 WHERE id = ?");
		$increment->execute(array($img_id));
	}

	function unlike_photo($dbh, $user_id, $img_id){
		$query = $dbh->prepare('DELETE FROM likes WHERE img_id = ? AND user_id = ?');
		$query->execute(array($img_id, $user_id));

		$decrement = $dbh->prepare("UPDATE gallery SET likes = likes - 1 WHERE id = ?");
		$decrement->execute(array($img_id));
	}