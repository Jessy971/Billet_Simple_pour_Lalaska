<?php

  class ManagerCommentaires extends ManagerArticle{
    public function __construct($bd)
    {
      $this->connexionBdd = $bd;
    }

    //cree un nouveau commentaire
    public function createCom($pseudo, $com, $idArt)
    {
        $creat= $this->connexionBdd->prepare(' INSERT INTO commentaires(pseudo, commentaire, date_creation, id_article) VALUES(:pseudo, :com, NOW(), :idArt)');
        $creat->execute(
          array(
            'pseudo' => $pseudo,
            'com'    => $com,
            'idArt'  => $idArt)
        );
    }

    //Affiche tout les commentaires.
    public function readAllComments($idArticle, $limt, $offst)
    {
        $read = $this->connexionBdd->prepare('SELECT id, pseudo, commentaire, signale, DATE_FORMAT(date_creation, \'%d-%m-%Y à %Hh%i.\') AS date_com FROM commentaires WHERE id_article = :id_article ORDER BY id DESC LIMIT '.$offst.','.$limt);
        $read->execute(array(
          'id_article'=> $idArticle));
        return $read;
      }

    //Signale un commentaire pour le modérer.
    public function signaleComment($idCom, $signaleCom)
    {
      $signale = $this->connexionBdd->prepare('UPDATE commentaires SET signale = :signaleCom WHERE id = :idCom');
      $signale->execute(
        array(
          'signaleCom' => $signaleCom,
          'idCom'      => $idCom)
      );
    }

    //supression du commentaire.
    public function delete($id)
    {
      $delete=$this->connexionBdd->prepare('DELETE FROM commentaires WHERE id=?');
      $delete->execute(array($id));
    }

    //récupère le nombre de commentaires dans la table
    public function countCom($idArticle)
    {
      $count = $this->connexionBdd->prepare('SELECT id FROM commentaires WHERE id_article = :idArticle');
      $count -> execute(['idArticle' => $idArticle]);
      $nCom = $count->rowCount();
      return $nCom;// retourn une valeur de type int.
    }
  }
