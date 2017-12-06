<?php
session_start();
if(isset($_SESSION['password'], $_SESSION['login']))
{

  require_once('../modele/bddConnexionClass.php');
  require_once('../modele/class/ManagerArticle.class.php');
  require_once('../modele/class/ManagerCommentaires.class.php');

  $bdd = new DataConnection();

  if(isset($_GET['id']))
  {
    $article = new ManagerArticle($bdd->bdd());
    $idArticle = intVal($_GET['id']);
    $article->delete($idArticle);
    header("Location: ../index.php");
  }
  elseif(isset($_GET['idCom']))
  {
    $idCom = intVal($_GET['idCom']);
    $commantaire = new ManagerCommentaires($bdd->bdd());
    $commantaire->delete($idCom);
    /*header("Location: ../index.php");*///redirege sur l'article en cour de lecture.
    echo $idCom;
    echo '<br>commentaires supprimé.';
  }
}
else {
  header("Location: ../index.php");
}
