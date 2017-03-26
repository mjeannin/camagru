  <div class="logo">
    <a><img src="https://image.ibb.co/h1wigF/Screen_Shot_2017_02_06_at_9_59_41_PM.png" alt="logo" border="0" href="/Camagru/gallery.php"></a>
  </div>
  <div class="name">Camagru</div>
  <div class="gallery">
    <p><a href="../pages/gallery.php">Galerie</a></p>
  </div>
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