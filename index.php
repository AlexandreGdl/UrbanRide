<?php session_start();




include('morceau/bdd.php');
?>




<!DOCTYPE html>
<html lang="fr" dir="ltr">
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="css/master.css">
  <title>UrbanRide</title>
</head>
<body>

  <?php include('morceau/nav.php'); ?>

  <header class="block__header">
    <h2 class="actu title">Actu Tendance</h2>
    <div class="header__accueil">
      <figure class="main__info">
        <a href="#">
          <img src="img/img_principale-accueil.png" alt="" class="top__info__img"></a>
          <figcaption class="spoiler__header">Le nouveau skate park du youtuber Vodkprod, a la RedBox. La nouvelle structure monté par le groupe de youtubers Angevins.</figcaption>
          <p></p>
        </figure>
        <div class="sub__info">
          <?php $req = $bdd->query('SELECT * FROM article ORDER BY id DESC LIMIT 4');
          while ($article = $req->fetch()) {
            ?>
            <figure class="sub__info__block">
              <a href="#"> <img src="img/<?php echo $article['miniature']; ?>.png" alt=""> </a>
              <figcaption class="spoiler__header"><?php echo $article['titre']; ?></figcaption>

            </figure>

            <?php
          } ?>


        </div>

      </div>
    </header>


    <h2 class="actu__news title">Actu Récente</h3>

      <main class="block__main">
        <div class="">


          <section class="article__wrapper">
            <?php $req = $bdd->query('SELECT * FROM article ORDER BY id DESC LIMIT 3');

            while ($article = $req->fetch()) {

              ?>
              <a href="<?php switch ($article['type']) {
                case 'article':
                  echo 'article_'.$article['sport'].'.php?id='.$article['id'];
                  break;
                case 'video':
                echo 'article_'.$article['sport'].'.php?id='.$article['id'];
                break;
                case 'marque':
                echo 'article_marque.php?marque='.$article['id'];
                break;
                case 'pro':
                echo 'article_pro.php?pro='.$article['id'];
                break;
                default:
                  // code...
                  break;
              } ?>">
                <article class="article__block">
                  <img src="img/<?php echo $article['media']; ?>.png" alt="" class="article__preshow__img">
                  <div class="block__info">
                    <h3 class="article__preshow__title"><?php echo $article['titre']; ?></h3>

                    <!-- LIMITE A 100 MOT un truc du genre -->
                    <p class="article__preshow__description"><?php echo $article['contenu']; ?></p>
                  </div>

              </article>
            </a>

            <?php

          } ?>

        </section>
        <section class="article__wrapper wrapper2" style="display:none;">
          <?php $req = $bdd->query('SELECT * FROM article WHERE id > 3 ORDER BY id DESC LIMIT 3');

          while ($article = $req->fetch()) {

            ?>
            <a href="<?php switch ($article['type']) {
              case 'article':
                echo 'article_'.$article['sport'].'.php?id='.$article['id'];
                break;
              case 'video':
              echo 'article_'.$article['sport'].'.php?id='.$article['id'];
              break;
              case 'marque':
              echo 'article_marque.php?marque='.$article['id'];
              break;
              case 'pro':
              echo 'article_pro.php?pro='.$article['id'];
              break;
              default:
                // code...
                break;
            } ?>">
              <article class="article__block">
                <img src="img/<?php echo $article['media']; ?>.png" alt="" class="article__preshow__img">
                <div class="block__info">
                  <h3 class="article__preshow__title"><?php echo $article['titre']; ?></h3>

                  <!-- LIMITE A 100 MOT un truc du genre -->
                  <p class="article__preshow__description"><?php echo $article['contenu']; ?></p>
                </div>

            </article>
          </a>

          <?php

        } ?>
        </section>
      </div>



      <aside class="block__aside">
        <div class="newsletter__block">
          <p>Inscrivez vous a nos news letter</p>
          <form class="newletter" action="post__newsletter.php" method="post">
            <input type="text" name="email" placeholder="Votre email">
            <input type="submit" name="" value="Je m'inscris" class="submit__newsletter">
          </form>
        </div>
        <?php $req = $bdd->query('SELECT * FROM article ORDER BY id DESC LIMIT 3');
        while ($article = $req->fetch()) {
          ?>

          <article class="article__aside">
            <a href="<?php switch ($article['type']) {
              case 'article':
                echo 'article_'.$article['sport'].'.php?id='.$article['id'];
                break;
              case 'video':
              echo 'article_'.$article['sport'].'.php?id='.$article['id'];
              break;
              case 'marque':
              echo 'article_marque.php?marque='.$article['id'];
              break;
              case 'pro':
              echo 'article_pro.php?pro='.$article['id'];
              break;
              default:
                // code...
                break;
            } ?>">
              <h3 class="article__preshow__title"><?php echo $article['titre'] ?></h3>
            </a>
            <p class="article__preshow__description__aside"><?php echo $article['contenu']; ?></p>
          </article>
          <?php
        } ?>
      </aside>

    </main>


    <script type="text/javascript" src='js/jquery.min.js'></script>
    <script type="text/javascript" src='js/script.js'></script>
  </body>
  </html>
