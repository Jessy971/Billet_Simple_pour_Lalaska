<?php
  if(isset($_GET['id'])){
      setcookie('idArticle', htmlspecialchars($_GET['id']),0, null, null, false, true);
    }
 ?>
<!DOCTYPE html>
<html>
  <head>
    <title></title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../css/styleSheetArticle.css">
    <link href="https://fonts.googleapis.com/css?family=Contrail+One|Open+Sans" rel="stylesheet">
    <script src="https://use.fontawesome.com/cc1d85f612.js"></script>
  </head>
  <body>

      <?php
        require('../../modele/class/ManagerArticle.class.php');
        require('../../modele/class/ManagerCommentaires.class.php');
        require('../../controller/admin/php/admin.php');
        require('../../controller/admin/php/readAllComments.funct.php');
        

        $coms = new Commentaires();
        $idArticle;
       if(!isset($_GET['id'])){
          $idArticle = $_COOKIE['idArticle'];
        }
        elseif(isset($_GET['id'])){
          $idArticle = htmlspecialchars($_GET['id']);
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

          <?php



            if(isset($_GET['p'])){
                $p = $_GET['p'];
              }else {
                $p =1;
              }
            $cA="";
            echo '<div class="pagin">';
            $coms->countCom($idArticle, $p, $cA);
            echo '</div>';

            $coms->readAll($idArticle);

            echo '<div class="pagin">';
            $coms->countCom($idArticle, $p, $cA);
            echo '</div>';

            if(isset($_GET['idCom'])){
              $coms->delete($_GET['idCom']);
            }

            ?>
        </aside>
        <a id="accueil" href="../../controller/admin/php/accueilAdmin.php"><button>Retour à l'accueil</button></a>
      </section>
      <script type="text/javascript" src="../../lib/jquery-3.2.1.js"></script>
      <script type="text/javascript" src="../../controller/js/set_btn_hide_sign.js"></script>
  </body>
</html>
