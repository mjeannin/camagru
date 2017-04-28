<?php
	require_once "{$_SERVER['DOCUMENT_ROOT']}/Camagru/inc/global.php";
	require_once "{$_SERVER['DOCUMENT_ROOT']}/Camagru/process/likes.php";
	$_GET["page"] = intval($_GET["page"]);
	if ($_GET["page"] < 0){
		header("Location: http://localhost:8080/Camagru/pages/gallery.php");
	}
?>

<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="utf-8">
		<title>Camagru</title>
		<link rel="stylesheet" href="../css/gallery.css">
	</head>
	<body>
	<div id="main">
		<div class="header"><?php include_once "{$_SERVER['DOCUMENT_ROOT']}/Camagru//inc/header.php"; ?></div>
			<div id="pagination">
				<?php
					$page = $_GET["page"] ? $_GET["page"] - 1 : 0;
					$offset = $page * 4;

					$req = $dbh->prepare('SELECT img, authorid FROM gallery LIMIT :offset, 4;');
					$req->bindParam(':offset', $offset, PDO::PARAM_INT);
					$req->execute();
					$photos = $req->fetch();

					if ($page >= 1 && $photos){?>
					<div class="navig" id="prev">
						<a href="/Camagru/pages/gallery.php?page=<?= $page; ?>">
						<img class="arrow" src="../img/previous.png"></a>
					</div>
				<?php }?>
				<div>
					<p class="navig">Page <?= $page+1; ?></p>
				</div>
				<?php
					$page = $_GET["page"] ? $_GET["page"] : 1;
					$offset = $page * 4;

					$req = $dbh->prepare('SELECT img, authorid FROM gallery LIMIT :offset, 4;');
					$req->bindParam(':offset', $offset, PDO::PARAM_INT);
					$req->execute();
					$photos = $req->fetch();
					if ($photos){?>
						<div class="navig" id="next">
							<a href="/Camagru/pages/gallery.php?page=<?= $page + 1; ?>">
							<img class="arrow" src="../img/next.png"></a>
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
			</div>
			<div class="middle">
				<?php
					$page = $_GET["page"] ? $_GET["page"] - 1 : 0;
					$offset = $page * 4;

					$req = $dbh->prepare('SELECT id, authorid, img, likes FROM gallery LIMIT :offset, 4;');
					$req->bindParam(':offset', $offset, PDO::PARAM_INT);
					$req->execute();

					while ($photos = $req->fetch()){

						$query = $dbh->prepare('SELECT pseudo FROM users WHERE id = ?');
						$query->execute(array($photos['authorid']));
						$author = $query->fetch();
					?>
				<div>
					<div class="pic">
						<div>
						<?php
							if ($photos['authorid'] == $_SESSION['user_id']){
								echo '<br/>';?>
									<a href="/Camagru/process/del_img.php?id=<?= $photos['id'] ?>&page=<?= $_GET["page"]; ?>">
									<img id="img_delete" src="../img/clear.png"><a/>
						<?php } ?>
					<?= $author['pseudo']; ?>
					</div>
					<img class="pic_img" src="<?= $photos['img'] ?>" alt="ex1" border="0" height="250">
				</div>
				<div>
					<img <?php if(photo_is_liked($dbh, $_SESSION['user_id'], $photos['id']) == true ){?>
						src="/Camagru/img/full_heart.png"
					<?php }
					else{?>
						src="/Camagru/img/empty_heart.png"
						<?php }?>
					 alt="heart" class="likeMe" data-photoid="<?= $photos['id'] ?>" height="20">
					<a href="/Camagru/process/action.php?t=0&id=<?= $photos['id'] ?>&page=<?=  $_GET["page"] ; ?>">J'aime</a>
					(<?= ($photos['likes']) ?>)
				</div>
				<div>
					<form id="comm" method="post" data-photoid="<?= $photos['id'] ?>" action="/Camagru/process/post.php?id=<?= $photos['id'] ?>&page=<?=  $_GET["page"] ; ?>">
						<input name="comment" id="comment" type="text" />
					</form>
				</div>
				<center id="global_comm">
					<?php
						$cmt = $dbh->prepare('SELECT comm_id, user_id, img_id, text, date FROM comm WHERE img_id = ?');
						$cmt->execute(array($photos['id']));

						while ($commentaires = $cmt->fetch()){
							$query = $dbh->prepare('SELECT pseudo FROM users WHERE id = ?');
							$query->execute(array($commentaires['user_id']));

							$author = $query->fetch();
							?>
							<div class="commentaires">
								<div id="comm_text"><?= ($author['pseudo']) ?></div>
								<div><?= ($commentaires['text'])?></div>
								<div id="comm_date"><?= ($commentaires['date']); ?></div>
								<?php
								if ($commentaires['user_id'] == $_SESSION['user_id']){
									echo '<br/>';?>
										<div id="comm_delete">
											<a href="/Camagru/process/del_comm.php?id=<?= $commentaires['comm_id'] ?>&page=<?= $_GET["page"]; ?>">
											<img src="../img/clear.png"></a>
										</div>
									<?php } ?>
							</div>
						<?php } ?>
				</center>
				<?php }?>
			</div>
		<div class="footer">created by @mjeannin</div>     
	</div>
	</body>
	<script type="text/javascript" src="/Camagru/js/ajax.js"></script>
</html>