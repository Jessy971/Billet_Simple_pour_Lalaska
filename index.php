<?php
session_start();
/*setcookie('idArticle',$url[1],time()+60,null,null,false,true);*/
/*
echo '<pre>';
echo $_SERVER['REQUEST_URI'];
echo '<pre>';
include('controller/listeArticlesController.php');*/
$url = '';
if(isset($_GET['url']))
{
  $url = explode('/',htmlspecialchars($_GET['url']));
}
/*var_dump($url);*/
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
elseif($url[0] =='adminpage' || $url[0] =='accueilAdmin')
{
  include_once('controller/listeArticlesController.php');
}
//Redirige sur la page de l'article choisi.
elseif($url[0] == 'article' && !empty($url[1]))
{

  include_once('controller/getArticleController.php');
}
//Redirige sur la page d'accueil viiteur.
elseif($url[0] =='editer' && !empty($url['2']))
{
  
  include_once('controller/EditerArticleController.php');
}
