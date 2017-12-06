<?php
require_once('../modele/bddConnexionClass.php');
require_once('../modele/class/ManagerArticle.class.php');
require_once('../modele/class/ManagerCommentaires.class.php');

if(isset($_POST['pseudo'], $_POST['commentaire'], $_COOKIE['idArticle']))
{
  $bdd         = new DataConnection();
  $idArticle = intVal($_COOKIE['idArticle']);
  $pseudo      = htmlspecialchars($_POST['pseudo']);
  $contenu     = htmlspecialchars($_POST['commentaire']);
  $commentaire = new ManagerCommentaires($bdd->bdd());
  $commentaire->createCom($pseudo, $contenu, $idArticle);
}
/*header("Location: ../index.php");*///redirege sur l'article en cour de lecture.
