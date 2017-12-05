<?php include_once('_head.php');?>
    <section id="main_contenaire">
      <h1 id="titreBlog">Billet simple pour l'Alaska.</h1>
      <div id="cadreTitre"></div>
      <article id="articleContent">
        <?php
        foreach ( $contenu as $article) {
            echo $article['contenu'];
        }

        ?>
      </article>
      <aside id="commentaires">
        <h2>Commentaires</h2>

        <?php include_once('__formCommentaire.php'); ?>

        <?php

        /*
        * verifie l'existance d'un speudo, d'un commentaire et de l'idantifiant de l'article
        * Si la condition est rempli alors on appel la methode de création d'un nouvelle article
        * de l'objet $coms intancier par la class Commentaires.
        */

        /*$coms -> readAll($idArticle);*/
         /*echo strval($commentaires);*/
         $coms -> readAllComments($idArticle, 50, 0);
        ?>
      </aside>
      <a id="accueil" href="<?php $accueil; ?>"><button>Retour à l'accueil</button></a>
    </section>
    <script type="text/javascript" src="../../lib/jquery-3.2.1.js"></script>
    <script type="text/javascript" src="../../controller/js/set_btn.js"></script>
  </body>
</html>
