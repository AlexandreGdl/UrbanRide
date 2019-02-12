<?php
include_once('morceau/bdd.php');

if (!empty($_POST['pseudo']) && !empty($_POST['mail']) && !empty($_POST['mot_de_passe'])) {
  $mdp = htmlspecialchars($_POST['mot_de_passe']);
  $pseudo = htmlspecialchars($_POST['pseudo']);
  $mail = htmlspecialchars($_POST['mail']);

  $req = $bdd->prepare('SELECT * FROM membre WHERE mail = ?');
  $req->execute(array($mail));

  if ($req->rowCount() == 1 ) {
    echo 'Mail deja prit';
  } else {

    $req = $bdd->prepare('INSERT INTO membre (pseudo,mot_de_passe,mail,droit) VALUES (:pseudo,:mot_de_passe,:mail,:droit)');
    $req->execute(array(
      'pseudo'=>$pseudo,
      'mot_de_passe'=>$mdp,
      'mail'=>$mail,
      'droit'=> 'lecteur'
    ));


    header('Location: login.php?succes=true');

  }

}
