<?php
if(isset($_SESSION['password'], $_SESSION['login']))
{
  require_once('../modele/bddConnexionClass.php');
  require_once('../modele/class/ManagerArticle.class.php');

  $bdd = new DataConnection();
  $article = new ManagerArticle($bdd->bdd());

  if(isset($_COOKIE['idArticle']) && $_COOKIE['idArticle'] != 0)
  {
    $idArticle = intVal($_COOKIE['idArticle']);
    $contenu = $_POST['newArticle'];
    $article->upDate($contenu, $idArticle);
  }
  else
  {
      /*$contenu = $_POST['newArticle'];
      $article->create($contenu);*/
      echo $contenu;
  }
  header("Location: ../index.php");
}
/*header("Location: ../index.php");*/
echo "pas de password ou pseudo";
