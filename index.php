<?php
session_start();
/*setcookie('idArticle',$url[1],time()+60,null,null,false,true);*/
/*
echo '<pre>';
echo $_SERVER['REQUEST_URI'];
echo '<pre>';
*/

$url = '';
if(isset($_GET['url']))
{
  $url = explode('/',htmlspecialchars($_GET['url']));
}
/*echo'<pre>';
var_dump($url);
echo'<pre>';*/
//Redirige sur la page d'accueil visiteur.
if(empty($url))
{
  include_once('controller/listeArticlesController.php');
}

//Redirige sur la page de connexion administrateur.
elseif($url[0] == 'login')
{
  include_once('controller/loginController.php');
}

//Redirige sur la page d'accueil administrateur.
elseif($url[0] =='accueilAdmin')
{
  include_once('controller/listeArticlesController.php');
}

//Redirige sur la page de l'article choisi.
elseif($url[0] == 'article' && !empty($url[1]))
{
  include_once('controller/getArticleController.php');
}

//Redirige sur la page d'accueil viiteur.
elseif($url[0] == 'Editer' && $url[1] == 'new')
{
  include_once('controller/EditerArticleController.php');
}

elseif ($url == 'logout')
{
  include_once('controller/logoutController.php');
}

elseif ($url[0] == 'article' && $url[1] == 'enregister')
{
  echo $_POST['newArticle'];
  include_once('controller/enregisterArticleController.php');
}
