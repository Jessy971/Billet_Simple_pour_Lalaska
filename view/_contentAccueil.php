<section id="contenu_articles">
  <?php while ($donnees = $articles->fetch()){ ?>
   <!--Affichage des articles sur la page.-->
   <div class="articles">

     <?php echo $donnees['contenu'];?>

     <div class="manager"> <!--btn's list -->
       <ul>
         <li>
           <a href="articleVIsiteur.php?id=<?php echo $donnees['id'];?>">
             <button>Lire la suite</button>
           </a>
         </li> <!--bouton lecture-->
       </ul>
     </div>
   </div>
   <?php
     //fin de boucle while.
     }
   ?>
 </section>
