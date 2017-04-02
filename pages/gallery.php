<?php
require_once '../inc/global.php';
?>

<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="utf-8">
		<title>Camagru</title>
		<link rel="stylesheet" href="../css/gallery.css">
	</head>
	<body>
		<div class="header"><?php include_once '../inc/header.php'; ?></div>
		<div class="middle">
			<?php
				$page = $_GET["page"] ? $_GET["page"] - 1 : 0;
				$offset = $page * 4;

				$req = $dbh->prepare('SELECT img, authorid FROM gallery LIMIT :offset, 4;');
				$req->bindParam(':offset', $offset, PDO::PARAM_INT);
				$req->execute();

				while ($photos = $req->fetch()){
			?>
		<div>
			<div>
				<img src="<?= $photos['img'] ?>" alt="ex1" border="0" height="250">
			</div>
			<div>
				<img src="/Camagru/img/empty_heart.png" alt="empty_heart" class="likeMe" data-photoid="<?= $photos['id'] ?>" height="20">
				<a href="/Camagru/process/action.php?t=0&id=<?= $id ?>">J'aime</a>
			</div>
			<div>
				<form id="comm" method="post">
				<input name="comment" id="comment" type="text" />
				</form>
			</div>
			</div>
			<?php }?>
		</div>
		<div id="pagination">
			<?php
				$page = $_GET["page"] ? $_GET["page"] - 1 : 0;
				$offset = $page * 4;

				$req = $dbh->prepare('SELECT img, authorid FROM gallery LIMIT :offset, 4;');
				$req->bindParam(':offset', $offset, PDO::PARAM_INT);
				$req->execute();
				$photos = $req->fetch();

				if ($page >= 1 && $photos){?>
				<div id="prev">
					<p><a href="/Camagru/pages/gallery.php?page=<?php echo $page; ?>">Page précédente</a></p>
				</div>
			<?php }?>
			<?php
				$page = $_GET["page"] ? $_GET["page"] : 1;
				$offset = $page * 4;

				$req = $dbh->prepare('SELECT img, authorid FROM gallery LIMIT :offset, 4;');
				$req->bindParam(':offset', $offset, PDO::PARAM_INT);
				$req->execute();
				$photos = $req->fetch();
				if ($photos){?>
					<div id="foll">
						<p><a href="/Camagru/pages/gallery.php?page=<?php echo $page + 1; ?>">Page suivante</a></p>
					</div>
			<?php }?>
			<?php
				$page = $_GET["page"] ? $_GET["page"] - 1 : 0;
				$offset = $page * 4;

				$req = $dbh->prepare('SELECT img, authorid FROM gallery LIMIT :offset, 4;');
				$req->bindParam(':offset', $offset, PDO::PARAM_INT);
				$req->execute();
				$photos = $req->fetch();

				if (!$photos){?>
					<div>
						<p>Aucune image à afficher :(</p>
					</div>
			<?php }?>
			<?php
				if (is_int($page) == FALSE){?>
					<div>
						<p>Erreur d'url</p>
					</div>
			<?php }?>
		</div>
		<div class="footer">
			created by @mjeannin
		</div>     
	</body>
	<script type="text/javascript" src="/Camagru/js/ajax.js"></script>
	<script type="text/javascript" src="/Camagru/js/interactions.js"></script>
</html>