<?php if (!isset($_SESSION['login'])): ?>
  <div class="logo">
    <a><img src="https://image.ibb.co/h1wigF/Screen_Shot_2017_02_06_at_9_59_41_PM.png" alt="logo" border="0"></a>
  </div>
  <div class="name">CAMAGRU ZER</div>
  <div class="log">
    <p>Nouveau sur Camagru ?</p>
      <span class="bouton">
        <p><a href="register.php">S'inscrire</a></p>
      </span>
    <p>Déjà membre ?</p>
      <span class="bouton">
        <p><a href="../js/login.php">Se connecter</a></p>
      </span>
  </div>
<?php endif; ?>
<?php if (isset($_SESSION['login'])): ?>
  <div class="log">
    <span class="bouton">
      <p><a href="">Déconnexion</a></p>
    </span>
  </div>
<?php endif; ?>