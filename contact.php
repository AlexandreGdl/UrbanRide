<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="/urbanride/css/master.css">
    <title>Contact</title>
  </head>
  <body class='body_contact'>

    <?php include('morceau/nav.php'); ?>


    <div class="container">

      <p>Tu veux nous contacter?<br>T'as une remarque ou suggestion?<br>Écrit nous un p'tit message!</p>

    </div>

    <form class="form_contact" action="/urbanride/get_contact.php" method="post">

      <div class="contact">

      <div class="champs identite">
        <div class="input input-nom">
          <label for="nom">Nom</label><br>
          <input type="text" name="nom" placeholder="Ton nom">
        </div>

          <br>
          <div class="input input-prenom">
            <label for="nom">Prénom</label><br>
            <input type="text" name="prenom" placeholder="Ton prénom">
          </div>
      </div>

      <div class="champs adresse-e">
        <label for="email">Adresse mail</label><br>
        <input type="mail" name="email" placeholder="Adresse e-mail">
        <?php
      echo "<br>";
      $erreur =  "";
        if (isset($_POST["envoie"])) {
          if(isset($_POST["adresse-e"]) && empty($_POST["email"])){

            $erreur.="*Adresse mail vide ou invalide <br>";

          }
          if(!empty($erreur)){
            echo "<span style='color:red;'>".$erreur."</span>";
          }
        }
        ?>
      </div>

      <div class="champs message">
        <label for="msg">Message</label><br>
        <textarea name="msg" rows="8" cols="80" placeholder="Ton message"></textarea>
      </div>

      <input type="submit" name="envoie" value="Envoyer">

      </div>


    </form>

  </body>
</html>
