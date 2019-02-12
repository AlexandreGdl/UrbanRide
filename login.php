<?php session_start(); ?>
<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Se connecter</title>
  </head>
  <body>
    <form class="" action="check_login.php" method="post">
      <input type="text" name="mail" placeholder="Mail">
      <input type="password" name="mot_de_passe" placeholder="Mot de passe">
      <input type="submit" name="login" value="Se connecter">
    </form>
  </body>
</html>
