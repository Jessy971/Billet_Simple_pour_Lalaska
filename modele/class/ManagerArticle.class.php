<?php
/**
 *
 */
class ManagerArticle{
    private $connexionBdd;

    function __construct($bd){
      $this->connexionBdd = $bd;
    }

    //création d'article
    public function create($newArticle){
        $creat= $this->connexionBdd->prepare('INSERT INTO article(contenu, date_creation) VALUES(?, NOW())');
        $creat->execute(array($newArticle));
    }

    //Affiche tout les articles
    public function readAll($limit, $offst){
        $read = $this->connexionBdd->query('SELECT * FROM article ORDER BY id DESC LIMIT '.$offst.','.$limit);
        return $read;
      }

    //Selectionne un article en fonction de son id.
    public function selectOne($id){
      $select = $this->connexionBdd->prepare('SELECT * FROM article WHERE id=?');
      $select->execute(array($id));
      return $select;
    }

    //modification d'article
    public function upDate($modification, $id){
      $upDate = $this->connexionBdd->prepare('UPDATE article SET contenu = :contUpdate, date_update = NOW() WHERE id = :selectId');
      $upDate->execute(array(
        'contUpdate' => $modification,
        'selectId' => $id));
    }

    //supression d'article
    public function delete($id){
      $delete=$this->connexionBdd->prepare('DELETE FROM article WHERE id=?');
      $delete->execute(array($id));
    }

    public function countArt(){
      $count = $this->connexionBdd -> query('SELECT id FROM commentaires');
      $nCom = $count->rowCount();
      return $nCom;// retourn une valeur de type int.
    }

}
