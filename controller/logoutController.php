<?php
$titre = 'Déconnexion';
$css = 'rel="stylesheet" href="view/assets/styleSheetLogout.css"';
/*setcookie('authentifier',"",time()+1, null, null, false, true);*/
session_destroy();
include_once('view/viewLogout.php');
