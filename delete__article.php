<?php
include('morceau/bdd.php');
if (isset($_POST['article_id'])) {
  $req = $bdd->prepare('DELETE FROM article WHERE id = ?');
  $req->execute(array($_POST['article_id']));
  header('Location: cms.php?succes=true');
} else {
  header('Location: cms.php');
}




 ?>
