<section id="contenu_articles">
  <!--Affichage des articles sur la page.-->
  <?php while ($donnees = $articles->fetch()){ ?>

                   <div class="articles">
                     <?php
                      echo $donnees['contenu']; // affiche le contenu des articles.
                      include($btnManager);
                     ?>
                  </div>

   <?php
     //fin de boucle while.
     }
   ?>
 </section>
