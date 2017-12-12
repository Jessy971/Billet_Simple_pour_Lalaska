<?php
require_once('modele/class/ManagerArticle.class.php');
require_once('modele/class/ManagerCommentaires.class.php');
require_once('modele/bddConnexionClass.php');

if(isset($url[1]))
{

  $titre                 = 'article';
  $css                   = 'rel="stylesheet" href="../view/assets/styleSheetArticle.css"';
  $idArticle             = intVal($url[1]);
  $_SESSION['idArticle'] = $idArticle;
  $bdd                   = new DataConnection();
  $article               = new ManagerArticle($bdd->bdd());
  $contenu               = $article->selectOne($idArticle);
  $com                   = new ManagerCommentaires($bdd->bdd());
  $commentaires          = $com->readAllComments($idArticle, 50, 0);

  /**
  * Si il existe des variables de session cela veut dire que nous sommes authentifier.
  * Nous pouvons donc avoir accès à la vue permettant de supprimer les commentaires.
  * En configurant les variables correspondante.
  **/
  if(isset($_SESSION['password'], $_SESSION['login']))
  {
    $accueil      = '../accueilAdmin';
    $scriptJs     ='type="text/javascript" src="../controller/js/set_btn_hide_sign.js"';
  }
  else
  {
    $accueil      = '../accueil';
    $scriptJs     ='type="text/javascript" src="../controller/js/set_btn.js"';
  }
  include_once('view/viewArticle.php');
}
