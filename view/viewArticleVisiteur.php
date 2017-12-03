<?php
  if(isset($_GET['id'])){
      setcookie('idArticle', $_GET['id'],0, null, null, false, true);
    }
 ?>
<!DOCTYPE html>
<html>
  <head>
    <title></title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../css/styleSheetArticle.css">
    <link href="https://fonts.googleapis.com/css?family=Contrail+One|Open+Sans" rel="stylesheet">
  </head>
  <body>

      <?php

        require('../../modele/class/ManagerArticle.class.php');
        require('../../modele/class/ManagerCommentaires.class.php');
        require('../../controller/admin/php/admin.php');
        require('../../controller/admin/php/readAllComments.funct.php');
        



        $coms = new Commentaires();
        $idArticle;
        if(!isset($_COOKIE['idArticle'])){
          $idArticle = htmlspecialchars($_GET['id']);
        }
        else{
          $idArticle = $_COOKIE['idArticle'];
        }
      ?>

      <section id="main_contenaire">
        <h1 id="titreBlog">Billet simple pour l'Alaska.</h1>
        <div id="cadreTitre"></div>
        <section id="articleContent">
        <?php
            $one = new Articles();
            $one->one($idArticle);
        ?>
      </section>
        <aside id="commentaires">
          <h2>Commentaires</h2>

          <form method="POST" action="articleVisiteur.php">
            <input type="text" name="pseudo" id="speudo" placeholder="Votre pseudo">
            <textarea name="commentaire" id="commentaire" placeholder="Ecrivez votre commentaire ici"></textarea>
            <input id="submit" type="submit" value="Poster">
          </form>

          <?php

            /*
            * verifie l'existance d'un speudo, d'un commentaire et de l'idantifiant de l'article
            * Si la condition est rempli alors on appel la methode de création d'un nouvelle article
            * de l'objet $coms intancier par la class Commentaires.
            */

            if (isset($_POST['pseudo']) && isset($_POST['commentaire']) && isset($_COOKIE['idArticle'])) {
            $coms -> create($_POST['pseudo'], $_POST['commentaire'], $_COOKIE['idArticle']);
            }

            if(isset($_GET['p'])){
                $p = $_GET['p'];
              }else {
                $p =1;
              }
            $c =1;
            echo '<div class="pagin">';
            $coms->countCom($idArticle,$p, $c);
            echo '</div>';

            $coms -> readAll($idArticle);

            echo '<div class="pagin">';
            $coms->countCom($idArticle, $p, $c);
            echo '</div>';


            if(isset($_GET['idComsign'])){

              $signaleCom = 1;

              $coms -> signaleCom($_GET['idComsign'], $signaleCom);

            }

            ?>
        </aside>
        <a id="accueil" href="index.php"><button>Retour à l'accueil</button></a>
      </section>
      <script type="text/javascript" src="../../lib/jquery-3.2.1.js"></script>
      <script type="text/javascript" src="../../controller/js/set_btn.js"></script>
  </body>
</html>
