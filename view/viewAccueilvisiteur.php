<?php
    setcookie('idArticle',"",time()+10, null, null, false, true);

 ?>


<html>
  <head>
    <title>article</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../css/styleSheetAccueil.css">
    <link href="https://fonts.googleapis.com/css?family=Contrail+One|Open+Sans" rel="stylesheet">
  </head>
  <body>

     <?php
       require('../../modele/class/ManagerArticle.class.php');
       require('../../controller/admin/php/admin.php');
       $articles = new Articles();
     ?>
      <header>
        <h1>Billet simple pour l'Alaska</h1>
        <p>Bienvenu sur mon blog, je suis Jean Forteroche un passionné de voyage.<br/>A travers ce blog je vous partagerais l'une de mes expériences passées lors de mon voyage inattendu en Alaska.</p>

      </header>
     <section id="main_contenaire">
       <section id="contenu_articles">

         <?php
           if(isset($_GET['p'])){
                $p = $_GET['p'];
              }else {
                $p =1;
              }
                $v = 1;
            echo '<div class="pagin">';
            $articles->countArt($p,$v);
            echo '</div>';
        
            // récupéartion des articles dans la BDD.
            $art = $articles->all();
            while ($donnees = $art->fetch()){
          ?>

          <!--Affichage des articles sur la page.-->
          <div class="articles">
            <img class="illustration" src="../images/maxresdefault.jpg" alt="">
            <?php echo $donnees['contenu'];?>
            <div class="manager"> <!--btn's list -->
              <ul>
                <li>
                  <a href="articleVIsiteur.php?id=<?php echo $donnees['id'];?>"><!--/*id=< echo $donnees['id'];?>*/-->
                    <button>Lire la suite</button>
                  </a>
                </li> <!--bouton lecture-->
              </ul>
            </div>
          </div>
        <?php
          //fin de boucle while.
          }
            echo '<div class="pagin">';
            $articles->countArt($p,$v);
            echo '</div>';
        ?>
      </section> 
         <a href="../admin/index.php"><button id="adminBtn" >Administrateur</button></a>
     </section>
     <script type="text/javascript" src="../../lib/jquery-3.2.1.js"></script>
     <script type="text/javascript" src="../../controller/js/set_id_h1.js"></script>
  </body>


</html>
