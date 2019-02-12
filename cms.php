<?php session_start();
include('morceau/bdd.php');

if ($_SESSION['droit'] != 'admin') {
  header('Location: index.php');
} else {

}

if (isset($_POST['modifArticle']) && isset($_POST['titre']) && isset($_POST['contenu']) ) {
  $url = str_replace(" ","-",$_POST['titre']);
  $req = $bdd->prepare('UPDATE article SET titre = :titre, contenu = :contenu ,url = :url WHERE id = :id');
  $req->execute(array(
    'titre'=>$_POST['titre'],
    'contenu'=>$_POST['contenu'],
    'url'=>$url,
    'id'=> $_POST['id_article']
  ));
}
?>
<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="/urbanride/css/master.css">
    <title></title>
  </head>
  <body>
    <?php include('morceau/nav.php'); ?>
    <h2 class="call_modif_header">Nouvel article : </h2>
    <form class="new_article" action="add__article__traitement.php" method="post" enctype="multipart/form-data">
      <input class="haut" type="text" name="titre" placeholder="Titre">
      <textarea name="contenu" rows="8" cols="80" placeholder="Contenu de l'article"></textarea>
      <input type="file" name="media" >
      <select class="" name="sport">
        <option value="skate">Skate</option>
        <option value="bmx">BMX</option>
      </select>
      <select class="" name="type">
        <option value="article">Article</option>
      </select>
      <input type="file" name="miniature" >
      <input type="submit" name="article" value="Poster l'article">
    </form>

    <h2 class="call_modif_header">Nouvel article marque: </h2>
    <form class="new_article" action="add__article__traitement.php" method="post" enctype="multipart/form-data">
      <input class="haut" type="text" name="titre" placeholder="Titre">
      <textarea name="contenu" rows="8" cols="80" placeholder="Contenu de l'article"></textarea>
      <input type="file" name="logo" >
      <select class="" name="sport">
        <option value="skate">Skate</option>
        <option value="bmx">BMX</option>
      </select>
      <input type="hidden" name="type" value="marque">
      <input type="file" name="illustration" >
      <input type="submit" name="article_marque" value="Poster l'article sur la marque">
    </form>
<br />

<h2 class="call_modif">Supprimer un article : </h2>
    <form class="form_cms" action="delete__article.php" method="post">
      <select class="" name="article_id">
        <?php
        $req = $bdd->query('SELECT * FROM article');
        while ($article = $req->fetch()) {
          ?><option value="<?php echo $article['id']; ?>">
            <?php echo $article['titre']; ?>
          </option><?php
        }
         ?>
         <input type="submit" name="" value="Supprimer">
      </select>
    </form>


    <h2 class="call_modif">Modifier un article : </h2>
    <form class="form_cms" action="" method="post">
        <select class="" name="id_article">
          <?php $req = $bdd->query('SELECT * FROM article');
            while ($article = $req->fetch()) {
              ?>
              <option value="<?php echo $article['id']; ?>"><?php echo $article['titre']." / ".$article['sport']; ?></option>
              <?php
            }?>
        </select>
        <input type="submit" name="look_article" value="Afficher">
    </form>
    <?php if (isset($_POST['look_article']) && isset($_POST['id_article'])) {
      $req = $bdd->prepare('SELECT * FROM article WHERE id = ?');
      $req->execute(array($_POST['id_article']));
      while ($article = $req->fetch()) {
      ?>
      <br />
      <form class="form_cms" action="" method="post">
        <input type="text" name="titre" value="<?php echo $article['titre']; ?>">
        <input type="text" name="contenu" value="<?php echo $article['contenu']; ?>">
        <input type="submit" name="modifArticle" value="Modifier">
        <input type="hidden" name="id_article" value="<?php echo $article['id']; ?>">
      </form>
      <?php
      }
    }




     ?>


  </body>
</html>
