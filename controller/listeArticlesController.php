<?php

require('modele/bddConnexionClass.php');
require('modele/class/ManagerArticle.class.php');

$bdd = new DataConnection();
$manager = new ManagerArticle($bdd->bdd());

$articles = $manager->readAll(50,0);
$arts = [];

include_once 'view/viewAccueilVisiteur.php';
