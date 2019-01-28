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
 ?>

 <!DOCTYPE html>
 <html lang="fr" dir="ltr">
   <head>
     <link rel="stylesheet" href="css/master.css">
     <meta charset="utf-8">
     <title><?php echo $titre." - UrbanRide"; ?></title>
   </head>
   <body>
     <?php include('morceau/nav.php'); ?>
     <header>
       <img src="img/<?php echo $media; ?>.png" alt="">
     </header>
     <main >
        <h1 class="article__title"><?php echo $titre; ?></h1>
        <img class="article__img"src="img/<?php echo $media; ?>" alt="">
        <p class="article__contenu"><?php echo $contenu; ?></p>
     </main>
   </body>
 </html>
