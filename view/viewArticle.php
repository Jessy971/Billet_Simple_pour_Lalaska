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

         foreach ($commentaires as $commentaire)
         {
        ?>
             <div>
                <p class="pseudo"> Posté par : <?php echo $commentaire['pseudo'];?></p>
                <p class="commentaires"><?php echo $commentaire['commentaire'];?></p>
                <p class="datetime">Le <?php  echo $commentaire['date_com'];?></p>
                <a class="supr" href="deleteController.php?idCom=<?php echo $commentaire['id'];?>"><button>Supprimer</button></a>
                <?php if($commentaire['signale'] != 1){ ?>
                <a class="lienBtn" href="signaleCommentaireController.php?idComsign=<?php echo $commentaire['id'];?>"><button class="btn">Signaler</button></a>
                <?php
                   }
                   else {
                ?>
                <p>Commentaire signalé ! <i class="fa fa-exclamation-triangle" aria-hidden="true"></i></p>
             </div>
             <?php
                }
              }
             ?>
      </aside>
      <a id="accueil" href="<?php echo $accueil;?>"><button>Retour à l'accueil</button></a>
    </section>
    <script type="text/javascript" src="../lib/jquery-3.2.1.js"></script>
    <script <?php echo $scriptJs;?>></script>
  </body>
</html>
