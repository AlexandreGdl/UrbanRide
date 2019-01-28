<?php session_start();

if ($_SESSION['right'] != 'admin') {
  header('Location: index.php');
} else {
  
}

?>
<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>

  </body>
</html>
