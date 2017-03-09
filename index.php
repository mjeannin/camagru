<?php 
	include_once "inc/global.php";
	$sth = $dbh->query('SELECT * FROM `gallery` ORDER BY `id` DESC');
	$photos = $sth->fetchAll();

	$page = htmlentities($_GET['page']);
	$pages = scandir('pages');

	if(!empty($page) && in_array($_GET['page'].".php",$pages)){
		$content = 'pages/'.$_GET['page'].".php";
	}

	else{
		header("Location:index.php?page=login");
	}
?>

<!DOCTYPE html>
<html>
	<head>
	</head>
	<body>
		<div id='content'>
			<?php
				include($content);
			?>
		</div>
	</body>
</html>