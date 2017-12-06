<?php
session_start();
require('modele/bddConnexionClass.php');
require('modele/class/ManagerArticle.class.php');

$bdd = new DataConnection();
$manager = new ManagerArticle($bdd->bdd());

$articles = $manager->readAll(50,0);
$css = 'rel="stylesheet" href="view/assets/styleSheetAccueil.css"';

if(isset($_POST['pseudo'],$_POST['password']))
{
  $login = htmlspecialchars($_POST['pseudo']);
  $password = htmlspecialchars($_POST['password']);

  if($login == 'admin' && $password == 'admin')
  {
    $_SESSION['password'] = $password;
    $_SESSION['login']    = $login;
    $titre = 'Administrateur';
    $btnManager ='view/__btnManager.php';
    include_once('view/viewAccueilAdmin.php');
    echo '<p style ="color: white;">'.$_SESSION['password'].'</p>';
    echo '<p style ="color: white;">'.$_SESSION['login'].'</p>';

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
