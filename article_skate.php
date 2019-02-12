<?php
session_start();
include('morceau/bdd.php');
if (isset($_GET['id']) ) {
  $id = htmlspecialchars($_GET['id']);
  $sport = 'skate';
  $req = $bdd->prepare('SELECT * FROM article WHERE id = :id AND sport = :sport');
  $req->execute(array(
    "id"=>$id,
    "sport" => $sport
  ));
  if ($req->rowCount() == 0) {
    header('Location: /urbanride/');
  }
  while($valeur = $req->fetch()){
    $titre = $valeur['titre'];
    $contenu = $valeur['contenu'];
    $media = $valeur['media'];
    $sport = $valeur['sport'];
    $type = $valeur['type'];
    $miniature = $valeur['miniature'];
  }
} else {
  header('Location: index.php');
}


if (isset($_SESSION['id'])) {
  $req = $bdd->prepare('SELECT * FROM note WHERE compte_lie = :compte_lie  AND article_lie = :article_lie');
  $req->execute(array(
    'compte_lie'=>$_SESSION['id'],
    'article_lie'=>$id
  ));
  if ($req->rowCount() == 1) {
    while ($res = $req->fetch()) {
      $reaction = $res['type'];
    }
  }
}
 ?>

 <!DOCTYPE html>
 <html lang="fr" dir="ltr">
   <head>
     <link rel="stylesheet" href="/urbanride/css/master.css">
     <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
     <meta charset="utf-8">
     <title><?php echo $titre." - UrbanRide"; ?></title>
   </head>
   <body>
     <?php include('morceau/nav.php'); ?>
     <header class="header_article_sport">
       <img src="/urbanride/img/SKATE_benniere.png" alt="">
     </header>
     <main class="main_article_sport">
        <h1 class="article__title"><?php echo $titre; ?></h1>
        <div class="img_holder">

        <img class="article__img"src="/urbanride/uploads/<?php echo $media; ?>" alt="">
      </div>
        <p class="article__contenu"><?php echo $contenu; ?></p>
        <div class="reaction_block">
          <?php
          if (isset($reaction)) {
            switch ($reaction) {
              case 1:?>
              <a href="/urbanride/add_reaction.php?type=0&id=<?php echo $id ?>"><i class="far fa-thumbs-up icon"></i></a>
              <a href="/urbanride/add_reaction.php?type=1&id=<?php echo $id ?>"><i class="fas fa-thumbs-down icon"></i></a>
              <?php
                break;

              case 0:
              ?>
              <a href="/urbanride/add_reaction.php?type=0&id=<?php echo $id ?>"><i class="fas fa-thumbs-up icon"></i></a>
              <a href="/urbanride/add_reaction.php?type=1&id=<?php echo $id ?>"><i class="far fa-thumbs-down icon"></i></a>
              <?php

                break;
            }
          } else {
            ?>
            <a href="/urbanride/add_reaction.php?type=0&id=<?php echo $id ?>"><i class="far fa-thumbs-up icon"></i></a>
            <a href="/urbanride/add_reaction.php?type=1&id=<?php echo $id ?>"><i class="far fa-thumbs-down icon"></i></a>
            <?php
          }?>
        </div>
     </main>
   </body>
 </html>
