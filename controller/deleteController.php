<?php
session_start();
if(isset($_SESSION['password'], $_SESSION['login']))
{

  require_once('../modele/bddConnexionClass.php');
  require_once('../modele/class/ManagerArticle.class.php');

  $bdd = new DataConnection();
  $article = new ManagerArticle($bdd->bdd());
  if(isset($_GET['id']))
  {
    $idArticle = intVal($_GET['id']);
    $article->delete($idArticle);
    header("Location: ../index.php");
  }
}
header("Location: ../index.php");
