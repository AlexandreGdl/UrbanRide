<?php
session_start();
include('morceau/bdd.php');
if (!empty($_POST['mail']) && !empty($_POST['mot_de_passe'])) {

  $mdp = htmlspecialchars($_POST['mot_de_passe']);
  $mail = htmlspecialchars($_POST['mail']);
  $req = $bdd->prepare('SELECT * FROM membre WHERE mail = :mail AND mot_de_passe = :mot_de_passe');
  $req->execute(array(
    'mail'=>$mail,
    'mot_de_passe'=>$mdp
  ));
  if ($req->rowCount() == 1 ) {
    while ($data = $req->fetch()) {
      $_SESSION['pseudo'] = $data['pseudo'];
      $_SESSION['id'] = $data['id'];
      $_SESSION['droit'] = $data['droit'];
      $_SESSION['mail'] = $data['mail'];
    }
    header('Location: index.php');
  } else {
    echo 'Ce compte n\'éxiste pas';
  }
} else {
  header('Location: login.php');
}
