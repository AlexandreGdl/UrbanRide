<nav class="block__nav">
  <a href="/urbanride/">
  <img class="logo" src="/urbanride/img/urbanride.png" alt="">
  </a>
  <ul class="menu">
    <li><a href="/urbanride/skate/">SKATE</a></li>
    <li><a href="/urbanride/bmx/">BMX</a></li>
    <li><a href="/urbanride/marque/">MARQUE</a></li>
    <li><a href="/urbanride/contact/">CONTACT</a></li>
  </ul>
  <form class="" action="search.php" method="post">
      <input type="search" name="keywords" placeholder="Recherche">
      <input type="submit" name="" value="go">
  </form>
  <ul class="login_call">

  <?php if (isset($_SESSION['pseudo'])) {
    ?>
      <li><a href="/urbanride/logout.php">Se deconnecter</a></li>
    <?php
  } else {
   ?>
    <li><a href="/urbanride/login.php">Se connecter</a></li>
    <li><a href="/urbanride/create_login.php">S'inscrire</a></li>
  <?php
} ?>
  <?php if (isset($_SESSION['droit']) && $_SESSION['droit'] == 'admin') {
    ?>
    
      <li><a href="/urbanride/cms.php">CMS</a></li>
    
    <?php
  } ?>
</ul>
</nav>
