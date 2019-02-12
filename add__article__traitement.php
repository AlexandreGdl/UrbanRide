<?php
session_start();

include('morceau/bdd.php');
if (!empty($_POST['titre']) && !empty($_POST['contenu']) && isset($_FILES['media']) && !empty($_POST['sport']) && !empty($_POST['type']) && isset($_FILES['miniature']) && isset($_POST['article'])  ) {


  $infosfichier = pathinfo($_FILES['media']['name']);
  $extension_upload = $infosfichier['extension'];
  $extensions_autorisees = array('png','jpg');

  if ( in_array($extension_upload, $extensions_autorisees) )
  {
          move_uploaded_file($_FILES['media']['tmp_name'], 'uploads/' . $_FILES['media']['name']);
          $succes = true;
          $media = $_FILES['media']['name'];
} else {
  echo 'mauvais fichier ou erreur pour media';
}


$infosfichier = pathinfo($_FILES['miniature']['name']);
$extension_upload = $infosfichier['extension'];
$extensions_autorisees = array('png','jpg');

if ( in_array($extension_upload, $extensions_autorisees) )
{
        move_uploaded_file($_FILES['miniature']['tmp_name'], 'uploads/' . $_FILES['miniature']['name']);
        $succes = true;
        $miniature = $_FILES['miniature']['name'];
} else {
  echo 'mauvais fichier ou erreur pour miniature';
}

$titre = htmlspecialchars($_POST['titre']);
$contenu = htmlspecialchars($_POST['contenu']);
$sport = htmlspecialchars($_POST['sport']);
$type = htmlspecialchars($_POST['type']);
$url = str_replace(" ","-",$titre);


  $req = $bdd->prepare('INSERT INTO article (titre,contenu,media,sport,type,miniature,url) VALUES (:titre,:contenu,:media,:sport,:type,:miniature,:url)');
  $req->execute(array(
    'titre' => $titre,
    'contenu' => $contenu,
    'media' => $media,
    'sport' => $sport,
    'type' => $type,
    'miniature' => $miniature,
    'url'=>$url
  ));

  header('Location: index.php');

} elseif (isset($_POST['article_marque']) !empty($_POST['titre']) && !empty($_POST['contenu']) && isset($_FILES['logo']) && !empty($_POST['sport']) && $_POST['type'] == 'marque' && isset($_FILES['illustration'])) {
  
} else if ($_SESSION['droit'] != 'admin') {
  echo "casse toi";
}  else {

 echo 'il manque des fichiers';

}
