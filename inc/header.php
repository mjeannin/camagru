<?php if (!isset($_SESSION['login'])): ?>
  <div class="logo">
    <a><img src="https://image.ibb.co/h1wigF/Screen_Shot_2017_02_06_at_9_59_41_PM.png" alt="logo" border="0"></a>
  </div>
  <div class="name">Camagru</div>
  <div class="log">
      <span>
        <p><a href="unlog.php">Déconnexion</a></p>
      </span>
  </div>
<?php endif; ?>
<?php if (isset($_SESSION['login'])): ?>
  <div class="log">
    <span>
      <p><a href="">Déconnexion</a></p>
    </span>
  </div>
<?php endif; ?>