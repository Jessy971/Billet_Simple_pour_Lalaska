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
