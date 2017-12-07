<?php
$css= "";
$titre = "Editeur";
if(isset($_SESSION['password'], $_SESSION['login']))
{
  if(isset($_GET['id']) && $_GET['id'] != 0)
  {
    require_once('modele/bddConnexionClass.php');
    require_once('modele/class/ManagerArticle.class.php');

    $idArticle = intval($_url['2']);
    $bdd = new DataConnection();
    $article = new ManagerArticle($bdd->bdd());
    $contenu = $article->selectOne($idArticle);
  }
  include_once('view/viewEditer.php');
}
