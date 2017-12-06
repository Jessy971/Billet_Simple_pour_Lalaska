<?php


if(isset($_GET['idComsign']) && $_GET['idComsign'] != 0)
{
  require_once('../modele/bddConnexionClass.php');
  require_once('../modele/class/ManagerArticle.class.php');
  require_once('../modele/class/ManagerCommentaires.class.php');

  $signaleCom  = 1;
  $idCom       = intVal($_GET['idComsign']);
  $bdd         = new DataConnection();
  $commentaire = new ManagerCommentaires($bdd->bdd());
  $commentaire->signaleComment($idCom, $signaleCom);
}
/*header("Location: ../index.php");*///redirege sur l'article en cour de lecture.
