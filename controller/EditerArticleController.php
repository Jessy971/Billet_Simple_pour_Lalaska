<?php
session_start();
setcookie('idArticle', intVal($_GET['id']),0, null, null, false, true);
$css="";
if(isset($_SESSION['password'], $_SESSION['login']))
{
  if(isset($_GET['id']) && $_GET['id'] != 0)
  {
    require_once('../modele/bddConnexionClass.php');
    require_once('../modele/class/ManagerArticle.class.php');

    $idArticle = intval($_GET['id']);
    $bdd = new DataConnection();
    $article = new ManagerArticle($bdd->bdd());
    $contenu = $article->selectOne($idArticle);
  }
  include_once('../view/viewEditer.php');
}
