<?php
session_start();

$url = '';
if(isset($_GET['url']))
{
  $url = explode('/',htmlspecialchars($_GET['url']));
}
/*echo'<pre>';
var_dump($url);
echo'<pre>';*/

//Redirige sur la page d'accueil visiteur.
if(empty($url) || $url[0] == 'accueil')
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
elseif($url[0] == 'article' && $url[1] > 0)
{
  include_once('controller/getArticleController.php');
}

//Redirige sur la page .
elseif($url[0] == 'Editer' && $url[1] == 'new')
{
  include_once('controller/EditerArticleController.php');
}

elseif($url[0] == 'Editer' && $url[1] > 0)
{
  include_once('controller/EditerArticleController.php');
}

//Redirige sur la page de déconnexion.
elseif ($url[0] == 'logout')
{
  include_once('controller/logoutController.php');
}

//Enregistre un nouvelle article ou un article modifier.
elseif ($url[0] == 'article' && $url[1] == 'enregister')
{
  include_once('controller/enregisterArticleController.php');
}

//Supprime un article.
elseif($url[0] == 'supprimer')
{
  include_once('controller/deleteController.php');
}
elseif ($url[0] == 'commentaire') {
  include_once('controller/newCommentaireController.php');
}
elseif ($url[0] == 'signaler') {
  include_once('controller/signaleCommentaireController.php');
}
