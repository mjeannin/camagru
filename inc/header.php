<div class="logo">
   <a href="../pages/gallery.php"><img src="https://image.ibb.co/h1wigF/Screen_Shot_2017_02_06_at_9_59_41_PM.png" alt="logo" border="0" href="/Camagru/gallery.php"></a>
</div>
<div class="name">
  <a href="../pages/gallery.php">Camagru</a>
</div>
<?php if ($_SERVER['REQUEST_URI'] === "/Camagru/pages/main.php"): ?>
  <div class="gallery_title">
    <p><a href="../pages/gallery.php">Galerie</a></p>
  </div>
<?php else: ?>
<div class="new_post">
    <p><a href="../pages/main.php">Nouvelle photo</a></p>
  </div>
<?php endif; ?>
  <div class="log">
      <span>
<?php if ($user['connected'] === false): ?>
        <p><a href="../pages/register.php">Inscription</a></p>
        <p><a href="../pages/login.php">Connexion</a></p>
<?php else: ?>
        <p><a href="../pages/logout.php">Déconnexion</a></p>
<?php endif; ?>
      </span>
  </div>