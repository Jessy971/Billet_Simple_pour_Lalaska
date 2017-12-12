<?php
require('modele/bddConnexionClass.php');
require('modele/class/ManagerArticle.class.php');

$bdd = new DataConnection();
$manager = new ManagerArticle($bdd->bdd());

$articles = $manager->readAll(50,0);
$css = 'rel="stylesheet" href="view/assets/styleSheetAccueil.css"';

if(isset($_POST['pseudo'],$_POST['password']) || isset($_SESSION['password'], $_SESSION['login']))
{
  //initialise des varaibles de session.
  if(isset($_POST['pseudo'],$_POST['password']))
  {
    $_SESSION['password'] = $_POST['password'];
    $_SESSION['login']    = $_POST['pseudo'];
  }

  $login                = htmlspecialchars($_SESSION['login']);
  $password             = htmlspecialchars($_SESSION['password']);

  // si la condition est rempli on se retrouve sur la page d'administration.
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
// affiche la page d'accueil visiteur s'il n'existe pas d'identifiant.
else
{
  $titre = 'Accueil';
  $btnManager = 'view/__btnLireSuite.php';
  include_once('view/viewAccueilVisiteur.php');
}
