<div class="manager">
  <!--btn's list -->
  <ul>
    <li>
      <a href="article/<?php echo $donnees['id'];?>">
        <button>Lire la suite</button>
      </a>
    </li>
    <!--bouton lecture-->
    <li>
      <a href="Editer/<?php echo $donnees['id'];?>">
        <button>Modifier</button>
      </a>
    </li>
    <!--bouton Modifier-->
    <li>
      <a href="supprimer/<?php echo $donnees['id'];?>">
        <button>Supprimer</button>
      </a>
    </li>
    <!--bouton supprimer-->
  </ul>
</div>
