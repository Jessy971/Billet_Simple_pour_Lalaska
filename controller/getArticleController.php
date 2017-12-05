<?php
/*if(isset($_SESSION['password']) && isset($_SESSION['login'])){
  require_once('../../modele/class/ManagerArticle.class.php');
  require_once('../../controller/admin/php/admin.php');
  $titre = 'Editeur';

  if(isset($_GET['id'])){
    $_SESSION['idArticle'] = htmlspecialchars($_GET['id']);
    $article = new Articles();
    $contenu = $article->one($_GET['id']);
  }
}
else
{
    echo "L'accès à cette page ne vous est pas autorisé!";
}*/

require_once('../modele/class/ManagerArticle.class.php');
require_once('../modele/class/ManagerCommentaires.class.php');
require_once('../modele/bddConnexionClass.php');
/*require_once('../controller/admin/php/admin.php');*/

if(isset($_GET['id'])){
  $titre        = 'article';
  $css          = 'rel="stylesheet" href="../view//assets/styleSheetArticle.css"';
  $idArticle    = intVal($_GET['id']);
  $bdd          = new DataConnection();
  $article      = new ManagerArticle($bdd->bdd());
  $contenu      = $article->selectOne($idArticle);
  $coms         = new ManagerCommentaires($bdd->bdd());
  /*$commentaires = $coms -> readAllComments($idArticle, 50, 0);*/
  include_once('../view/viewArticle.php');
}
