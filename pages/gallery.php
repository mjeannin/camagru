<?php
require_once '../inc/global.php';
require_once '../process/likes.php';
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
		<div id="pagination">
			<?php
				$page = $_GET["page"] ? $_GET["page"] - 1 : 0;
				$offset = $page * 4;

				$req = $dbh->prepare('SELECT img, authorid FROM gallery LIMIT :offset, 4;');
				$req->bindParam(':offset', $offset, PDO::PARAM_INT);
				$req->execute();
				$photos = $req->fetch();

				if ($page >= 1 && $photos){?>
				<div>
					<p class="navig"><a href="/Camagru/pages/gallery.php?page=<?php echo $page; ?>">Page précédente</a></p>
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
					<div>
						<p class="navig"><a href="/Camagru/pages/gallery.php?page=<?php echo $page + 1; ?>">Page suivante</a></p>
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
		<div class="middle">
			<?php
				$page = $_GET["page"] ? $_GET["page"] - 1 : 0;
				$offset = $page * 4;

				$req = $dbh->prepare('SELECT id, authorid, img, likes FROM gallery LIMIT :offset, 4;');
				$req->bindParam(':offset', $offset, PDO::PARAM_INT);
				$req->execute();

				while ($photos = $req->fetch()){
			?>
		<div>
			<div class="pic">
				<img src="<?= $photos['img'] ?>" alt="ex1" border="0" height="250">
			</div>
			<div>
				<img <?php if(photo_is_liked($dbh, $_SESSION['user_id'], $photos['id']) == true ){?>
					src="/Camagru/img/full_heart.png"
				<?php }
				else{?>
					src="/Camagru/img/empty_heart.png"
					<?php }?>
				 alt="heart" class="likeMe" data-photoid="<?= $photos['id'] ?>" height="20">
				<a href="/Camagru/process/action.php?t=0&id=<?= $photos['id'] ?>">J'aime</a>
				(<? echo ($photos['likes']) ?>)
			</div>
			<div>
				<form id="comm" method="post" data-photoid="<?= $photos['id'] ?>" action="/Camagru/process/post.php?id=<?= $photos['id'] ?>?">
					<input name="comment" id="comment" type="text" />
				</form>
			</div>
				<?php
					$cmt = $dbh->prepare('SELECT comm_id, user_id, img_id, text, date FROM comm WHERE img_id = ?');
					$cmt->execute(array($photos['id']));

					while ($commentaires = $cmt->fetch()){?>
						<div class="commentaires">
							<? echo ($commentaires['user_id']) ?> : <? echo ($commentaires['text']);
							echo '<br/>';
							echo ($commentaires['date']);
							if ($commentaires['user_id'] == $_SESSION['user_id']){
								echo '<br/>';?>
									<a href="/Camagru/process/del.php?id=<?= $commentaires['comm_id'] ?>">Supprimer</a>
								<? } ?>
						</div>
					<?php } ?>
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