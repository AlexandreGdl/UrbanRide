<?php
session_start();
include('morceau/bdd.php');


// 1 = dislike
// 0 = like
if (isset($_SESSION['id']) && isset($_GET['type'])) {
$id = htmlspecialchars($_GET['id']);
$id_user = $_SESSION['id'];
$type = htmlspecialchars($_GET['type']);
switch ($type) {
  case 1:
    $typeReverse = 0;
    break;

  case 0:
   $typeReverse = 1;
    break;
}
if ($_GET['type'] == 1 || $_GET['type'] == 0) {

$req = $bdd->prepare('SELECT * FROM note WHERE compte_lie = :compte_lie AND type = :type AND article_lie = :article_lie');
$req->execute(array(
  'compte_lie'=>$id_user,
  'type' => $type,
  'article_lie'=>$id
));
if ($req->rowCount() == 1) {
  // ON A DEJA LIKE

  $req = $bdd->prepare('DELETE FROM note WHERE compte_lie = :compte_lie AND type = :type AND article_lie = :article_lie');
  $req->execute(array(
    'compte_lie'=>$id_user,
    'type' => $type,
    'article_lie'=>$id
  ));

  $prev = $_SERVER[HTTP_REFERER];
  header('Location: '.$prev);
} else {
  // ACTION SANS RIEN AVOIR FAIT AVANT
  $req = $bdd->prepare('SELECT * FROM note WHERE compte_lie = :compte_lie AND type = :type AND article_lie = :article_lie');
  $req->execute(array(
    'compte_lie'=>$id_user,
    'type'=> $typeReverse,
    'article_lie'=>$id
  ));

if ($req->rowCount()  == 1) {
  $req = $bdd->prepare('DELETE FROM note WHERE compte_lie = :compte_lie AND type = :type AND article_lie = :article_lie');
  $req->execute(array(
    'compte_lie'=>$id_user,
    'type' => $typeReverse,
    'article_lie'=>$id
  ));
}

  $req = $bdd->prepare('INSERT INTO note (article_lie,compte_lie,type) VALUES (:article_lie, :compte_lie, :type)');
  $req->execute(array(
    'article_lie'=> $id,
    'compte_lie'=>$id_user,
    'type'=>$type
  ));

}






}

$prev = $_SERVER[HTTP_REFERER];
header('Location: '.$prev);



} else {
  header('Location: /urbanride/login/');
}
