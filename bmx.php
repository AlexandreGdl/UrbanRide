<?php
session_start();
include('morceau/bdd.php');

 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="/urbanride/css/master.css">
    <title></title>
  </head>
  <body>
      <?php include('morceau/nav.php'); ?>

      <header class="header__sport">
        <img src="/urbanride/img/BMX_benniere.png" alt="">
      </header>
      <main class="sport__main">
          <h2>ACTU</h2>
        <section class="article__wrapper">
          <?php
          $sport = 'bmx';
           $req = $bdd->prepare('SELECT * FROM article WHERE sport = ? ORDER BY id DESC LIMIT 3');
          $req->execute(array($sport));
          while ($article = $req->fetch()) {

            ?>
            <a href="<?php switch ($article['type']) {
              case 'article':
                echo '/urbanride/article-bmx/'.$article['url']."-".$article['id'];
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
                <img src="/urbanride/uploads/<?php echo $article['media']; ?>" alt="" class="article__preshow__img">
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
      </main>

      <script type="text/javascript" src="/urbanride/js/jquery.min.js"></script>
      <script type="text/javascript" src="/urbanride/js/script.js"></script>
  </body>
</html>
