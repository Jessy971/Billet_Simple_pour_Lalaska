<?php
if(isset($_SESSION['password'], $_SESSION['login']))
{
  require_once('modele/bddConnexionClass.php');
  require_once('modele/class/ManagerArticle.class.php');

  $bdd = new DataConnection();
  $article = new ManagerArticle($bdd->bdd());

  if(isset($_SESSION['idArticle']) && $_SESSION['idArticle'] != 0)
  {
    $idArticle = intVal($_SESSION['idArticle']);
    $contenu = $_POST['newArticle'];
    $article->upDate($contenu, $idArticle);
  }
  else
  {
      $contenu = $_POST['newArticle'];
      $article->create($contenu);
  }
  header("Location: ../accueilAdmin",false);
}
