<?php
if(isset($_SESSION['password'], $_SESSION['login']))
{

  require_once('modele/bddConnexionClass.php');
  require_once('modele/class/ManagerArticle.class.php');
  require_once('modele/class/ManagerCommentaires.class.php');

  $bdd = new DataConnection();
  if(isset($url[1]) && $url[1] > 0)
  {
    $article = new ManagerArticle($bdd->bdd());
    $idArticle = intVal($url[1]);
    $article->delete($idArticle);
    header("Location: ../accueilAdmin");
  }
  elseif(isset($url[2]))
  {
    $idCom = intVal($url[2]);
    $commantaire = new ManagerCommentaires($bdd->bdd());
    $commantaire->delete($idCom);
    header("Location: ../../article/".$_SESSION['idArticle']);
  }
}
else {
  /*header("Location: ../accueilAdmin");*/
}
