<?php if (!isset($_SESSION['pseudo'])): ?>
  <div class="logo">
    <a><img src="https://image.ibb.co/h1wigF/Screen_Shot_2017_02_06_at_9_59_41_PM.png" alt="logo" border="0" href="/Camagru/gallery.php"></a>
  </div>
  <div class="name">Camagru</div>
  <div class="gallery">
    <p><a href="../pages/gallery.php">Galerie</a></p>
  </div>
  <div class="log">
      <span>
        <p><a href="../pages/register.php">Inscription</a></p>
        <p><a href="../pages/login.php">Connexion</a></p>
      </span>
  </div>
<?php endif; ?>
<?php if (isset($_SESSION['pseudo'])): ?>
  <div class="logo">
    <a><img src="https://image.ibb.co/h1wigF/Screen_Shot_2017_02_06_at_9_59_41_PM.png" alt="logo" border="0"></a>
  </div>
  <div class="name">Camagru</div>
  <div class="log">
      <span>
        <p><a href="../pages/logout.php">Déconnexion</a></p>
      </span>
  </div>
<?php endif; ?>