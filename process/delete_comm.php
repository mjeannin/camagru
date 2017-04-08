<?php

function delete_comment($dbh, $comm_id){
	$query = $dbh->prepare('DELETE FROM comm WHERE comm_id = ?');
	$query->execute(array($comm_id));
}