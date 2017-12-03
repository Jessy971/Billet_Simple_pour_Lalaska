<?php
    
    if(isset($_SESSION['password']) && isset($_SESSION['login']) || isset($_COOKIE['authentifier'])){
         setcookie('authentifier',"ok",0, null, null, false, true);
         setcookie('idArticle', "",time()+0, null, null, false, true);
 ?>


    <html>

    <head>
        <title>article</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="../../../view/css/styleSheetAccueil.css">
        <link href="https://fonts.googleapis.com/css?family=Contrail+One|Open+Sans" rel="stylesheet">
    </head>

    <body>

        <?php
      require('../../../modele/class/ManagerArticle.class.php');
      require('../../../controller/admin/php/admin.php');
      require('menu.php');
        
      $articles = new Articles();    
      /********************************************************************/

      //création d'un nouvelle article s'il ne possède pas d'id, sinon modification de l'article s'il possède un id.
      if(isset($_POST['newArticle'])){

        //Condition Update, verifie les données cookie et si c'est ok effectue la modification de l'article.
        if(isset($_SESSION['idArticle']) && $_SESSION['idArticle']>0){
            
            $articles->upDateArticle($_POST['newArticle'], $_SESSION['idArticle']);
            
          }

        //Création d'un nouvelle article si la condition update n'est pas ok.
          
        else {
            
            $articles->createArticle($_POST['newArticle']);
        }
      }
        
      ?>
            <section id="main_contenaire">
                <section id="contenu_articles">

                    <?php
          
            if(isset($_GET['p'])){
                $p = $_GET['p'];
              }else {
                $p =1;
              }
            $v="";
            $articles->countArt($p,$v);
        
            // récupéartion des articles dans la BDD.
            $art = $articles->all();
            while ($donnees = $art->fetch()){
          ?>

                        <!--Affichage des articles sur la page.-->
                        <div class="articles">
                            <?php echo $donnees['contenu'];?>
                            <div class="manager">
                                <!--btn's list -->
                                <ul>
                                    <li>
                                        <a href="../../../view/admin/article.php?id=<?php echo $donnees['id'];?>">
                    <button>Lire la suite</button>
                  </a>
                                    </li>
                                    <!--bouton lecture-->
                                    <li>
                                        <a href="../../../view/admin/newArticle.php?id=<?php echo $donnees['id'];?>">
                    <button>Modifier</button>
                  </a>
                                    </li>
                                    <!--bouton Modifier-->
                                    <li>
                                        <a href="../../../controller/admin/php/delete.php?id=<?php echo $donnees['id'];?>">
                                            <button>Supprimer</button>
                                        </a>
                                    </li>
                                    <!--bouton supprimer-->
                                </ul>
                            </div>
                        </div>
                        <?php
          //fin de boucle while.
          }
          $articles->countArt($p,$v);
        ?>
                </section>
            </section>
            <script type="text/javascript" src="../../../lib/jquery-3.2.1.js"></script>
            <script type="text/javascript" src="../../../controller/js/set_id_h1.js"></script>
    </body>


    </html>
    <?php
}

  else {
    echo "vous n'avez pas accès à cette page. seule les personnes autorisé peuvent y accèder.";
  }
 ?>
