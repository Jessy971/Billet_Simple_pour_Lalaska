<?php

    class Articles{
        
        private $managerArticle; // instancier par la class ManagerArticle.
        private $offset;
        private $nItemespPage;
        
        function __construct(){
            $this->managerArticle = new ManagerArticle(new PDO('mysql:host=localhost;dbname=blogJeanForteroche; charset=utf8', 'root','root', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION))); 
            $this->nItemespPage = 3;
        }
        
        //Appel la methode de creation dans la class managerArticle du modèle.
        
        public function createArticle($newArticle){
            
            $this->managerArticle->create($newArticle);
        }
        
        //Appel la methode de de modification dans la class managerArticle du modèle.
        
        public function upDateArticle($newArticle, $id){
            
            $this->managerArticle->upDate($newArticle, $id);
        }
        // retourne la liste de tous les articles.
        public function all(){
            $art = $this->managerArticle->readAll($this->nItemespPage, $this->offset);
            
            return $art;
        }
        
        // retourne l'article choisi en ayant en parametre son ID.
        public function one($id){  
            
            return $this->managerArticle->selectOne($id)->closeCursor();   
            
        }
        
        public function supprimer($id){
            
           return $this->managerArticle->delete($id);
}
        
        public function countArt($p,$v){
            
              $count = $this->managerArticle;
            
              $nPages = ceil($count->countArt()/$this->nItemespPage);

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
                if(empty($v)){
                 for($i= 1; $i < $nPages; $i++){
                    if($i == $currentPage){
                        echo '<span id="page">'.$i.'</span>';
                    }
                    else{
                      echo '<a  class="pages" href="../../../controller/admin/php/accueilAdmin.php?p='.$i.'">'.$i.'  </a>';
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
                       echo '<a class="pages" href="index.php?p='.$i.'">'.$i.'  </a>';
                  }  
                          
                          
                      }
                }
        }
    }
