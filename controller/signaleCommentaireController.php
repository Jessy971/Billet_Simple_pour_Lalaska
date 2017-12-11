<?php


if(isset($url[1]) && $url[1] != 0)
{
  require_once('modele/bddConnexionClass.php');
  require_once('modele/class/ManagerArticle.class.php');
  require_once('modele/class/ManagerCommentaires.class.php');

  $signaleCom  = 1;
  $idCom       = intVal($url[1]);
  $bdd         = new DataConnection();
  $commentaire = new ManagerCommentaires($bdd->bdd());
  $commentaire->signaleComment($idCom, $signaleCom);
}
header("Location: ../article/".$_SESSION['idArticle']);
