<?php
require('modele/bddConnexionClass.php');
require('modele/class/ManagerArticle.class.php');

$bdd = new DataConnection();
$manager = new ManagerArticle($bdd->bdd());

$articles = $manager->readAll(50,0);
$css = 'rel="stylesheet" href="view/assets/styleSheetAccueil.css"';

if(isset($_POST['pseudo'],$_POST['password']) || isset($_SESSION['password'], $_SESSION['login']))
{
  if(isset($_POST['pseudo'],$_POST['password']))
  {
    $_SESSION['password'] = $_POST['password'];
    $_SESSION['login']    = $_POST['pseudo'];
  }
  
  $login                = htmlspecialchars($_SESSION['login']);
  $password             = htmlspecialchars($_SESSION['password']);


  if($login == 'admin' && $password == 'admin')
  {

    $titre      = 'Administrateur';
    $btnManager ='view/__btnManager.php';
    include_once('view/viewAccueilAdmin.php');
  }
  else
  {
    echo 'mot de passe  ou identifiant incorrecte.';
  }
}
else {
  $titre = 'Accueil';
  $btnManager = 'view/__btnLireSuite.php';
  include_once('view/viewAccueilVisiteur.php');



}
