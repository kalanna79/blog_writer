<?php
    /**
     * Created by PhpStorm.
     * User: natacha
     * Date: 20/04/2017
     * Time: 09:07
     */
    class CommentManager extends BddManager
    {
        public function showAllComments()
        {
            $comments = array();
            
            $q = $this->_db->query('SELECT * FROM comments');
            while ($donnees = $q->fetch(PDO::FETCH_ASSOC))
            {
                $comments[] = new Comment($donnees);
            }
            return $comments;
        }
    
        public function showLastComments()
        {
            $comments = array();
        
            $q = $this->_db->query('SELECT * FROM comments ORDER BY datecreated DESC LIMIT 0, 5');
            while ($donnees = $q->fetch(PDO::FETCH_ASSOC))
            {
                $comments[] = new Comment($donnees);
            }
            return $comments;
        }
        
        
        
        public function addComment(Comment $comment)
        {
            $q = $this->_db->prepare('INSERT INTO comments (title, texte, datecreated, idUser, idchapter, parentId, levelcomment) VALUES(:title, :texte, NOW(), 
 :idUser, :idChapter, :parentId, :levelcomment)');
            $q->bindValue(':title', $comment->getTitle());
            $q->bindValue(':texte', $comment->getTexte());
            $q->bindValue(':idUser', $_SESSION['id']);
            $q->bindValue('idChapter', $comment->getIdchapter());
            $q->bindValue('parentId', $comment->getParentId());
            $q->bindValue('levelcomment', $comment->getLevelComment());
            $q->execute();
            
            $comment->hydrate([
                'id' => $this->_db->lastInsertId()
                              ]);
        }
        
        /**
         * @param $id
         * @return array
         */
        public function getChildren($id)
        {
            $children = array();
            
                $q = $this->_db->query('SELECT * FROM comments WHERE parentId ='.$id);
                while ($donnees = $q->fetch(PDO::FETCH_ASSOC))
                {
                    $children[] = new Comment($donnees);
                }
                return $children;
        }
        
    }