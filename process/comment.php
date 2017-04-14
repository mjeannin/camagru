<?php

	function post_comment($dbh, $user_id, $img_id, $text){
		$query = $dbh->prepare("INSERT INTO comm VALUES(NULL, ?, ?, ?, NOW())");
		$query->execute(array($user_id, $img_id, $text));
	}