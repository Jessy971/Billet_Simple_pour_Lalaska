<?php
if(isset($url[1])){
  $_SESSION['idArticle'] = $url[1];
}
$css= "";
$titre = "Editeur";
$idArticle = $url[1];
if(isset($_SESSION['password'], $_SESSION['login']))
{
  if(isset($idArticle) && $idArticle != 0)
  {
    require_once('modele/bddConnexionClass.php');
    require_once('modele/class/ManagerArticle.class.php');

    $idArticle = intval($idArticle);
    $bdd = new DataConnection();
    $article = new ManagerArticle($bdd->bdd());
    $contenu = $article->selectOne($idArticle);
  }
  include_once('view/viewEditer.php');
}
