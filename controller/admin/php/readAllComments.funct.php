<?php

  class Commentaires{
    private $manager;
    private $nItemespPage;
    private $offset;

    function __construct(){
        $this->manager = new ManagerCommentaires(new PDO('mysql:host=localhost;dbname=blogJeanForteroche; charset=utf8', 'root','root', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)));
        $this->nItemespPage = 4; // initialise le nombre d'articles par page.
    }

    /*
    * récupère les donnees saisie par le visiteur
    * et les transmets à l'objet manager qui est une instance de
    * la class ManagerCommentaire.
    */

    public function create($pseudo, $com, $idArt){
      $creat = $this->manager;

      if(isset($pseudo) && isset($com) && isset($idArt)){
        $creat -> createCom($pseudo, $com, $idArt);
      }
    }

    /*
    * Récupère tous les commentaires
    *
    */

    public function readAll($idArticle){
      $commentaires = $this->manager;
      if(isset($idArticle)){
        $commentaires -> readAllComments($idArticle, $this->nItemespPage, $this->offset);
      }

      return $commentaires;

    }

    public function signaleCom($idCom, $signaleCom){
      $comSignale = $this->manager;
      $comSignale -> signaleComment($idCom, $signaleCom);
    }

    public function delete($idCom){
      $deleteCom = $this->manager;
      $deleteCom -> delete($idCom);
    }

    public function countCom($idArticle, $p, $c){
        
      $count = $this->manager;
      $nPages = ceil($count->countCom($idArticle)/$this->nItemespPage);

        /**
        * condition de sécurité concernant
        * l'attribution de la valeur venant du paramètre,
        * qui peut etre modifié par l'utilisateur dans l'url.
        **/

        if(isset($p) && !empty($p) && $p > 0 && $p <= $this->nItemespPage){
          $currentPage = htmlspecialchars(intval($p));
        }
        else {
          $currentPage =1;
        }

        // init de la prop offset.
        $this->offset = ($currentPage - 1) * $this->nItemespPage;
        
        // si tu est sur la page article d'administration execute ce code.
        if(empty($c)){
            for($i= 1; $i < $nPages; $i++){
              if($i == $currentPage){
                echo '<a id="page">'.$i.'</a>';
              }
              else{
                echo '<a  class="pages" href="article.php?p='.$i.'">'.$i.' </a>';
              }
            }
        }
        
         // si tu n'est pas sur la page article d'administration execute ce code.
        else{
            for($i= 1; $i < $nPages; $i++){
              if($i == $currentPage){
                echo '<a id="page">'.$i.'</a>';
              }
              else{
                echo '<a  class="pages" href="articleVisiteur.php?p='.$i.'">'.$i.' </a>';
              }
            }
        }
    }
  }
