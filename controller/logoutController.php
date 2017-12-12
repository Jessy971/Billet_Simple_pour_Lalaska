<?php
$titre = 'Déconnexion';
$css = 'rel="stylesheet" href="view/assets/styleSheetLogout.css"';
session_destroy();
include_once('view/viewLogout.php');
