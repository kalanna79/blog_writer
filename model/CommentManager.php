<?php
    /**
     * Created by PhpStorm.
     * User: natacha
     * Date: 20/04/2017
     * Time: 09:07
     */
    class CommentManager extends BddManager
    {
        /** show all comments
         * @return array -> array of objects
         */
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
        
        public function showCommentsChapter($idChapter)
        {
            $commChapter = array();
    
            $q = $this->_db->query('SELECT * FROM comments WHERE idchapter ='.$idChapter);
            while ($donnees = $q->fetch(PDO::FETCH_ASSOC))
            {
                $commChapter[] = new Comment($donnees);
            }
            return $commChapter;
        }
    
        /** show the five last comments
         * @return array -> array of objects
         */
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
    
        /** add a comment
         * @param Comment $comment
         */
        public function addComment(Comment $comment)
        {
            $q = $this->_db->prepare('INSERT INTO comments (title, texte, datecreated, idUser, idchapter, parentId, levelcomment) VALUES(:title, :texte, 
:datecreated, 
 :idUser, :idChapter, :parentId, :levelcomment)');
            $q->bindValue(':title', $comment->getTitle());
            $q->bindValue(':texte', $comment->getTexte());
            $q->bindValue(':datecreated', $comment->getDateCreated());
            $q->bindValue(':idUser', $_SESSION['id']);
            $q->bindValue('idChapter', $comment->getIdchapter());
            $q->bindValue('parentId', $comment->getParentId());
            $q->bindValue('levelcomment', $comment->getLevelComment());
            $q->execute();
            
            $comment->hydrate([
                'id' => $this->_db->lastInsertId()
                              ]);
        }
        
        /** allow to return all children of one comment - use in recursive function
         * @param $id
         * @return array - array of objects
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
    
        /** allow to show one comment selected
         * @param $idcomment
         * @return Comment
         */
        public function showOneComment($idcomment)
        {
            $idcomment = (int)$idcomment;
            $q = $this->_db->prepare('SELECT * FROM comments WHERE id=?');
            $q->execute(array($idcomment));
            $oneComment = $q->fetch(PDO::FETCH_ASSOC);
            return new Comment($oneComment);
        }
    
        /** allow to see if a comment is signaled
         * @param $idcomment
         * @return bool
         */
        public function hasModeration($idcomment)
        {
            $q = $this->_db->prepare('SELECT id FROM comments WHERE id= :id AND isSignaled > 0');
            $q->execute(array('id' => $idcomment));
            $resultat = $q->fetch();
    
            if (empty($resultat))
            {
                return false;
            } else {
                return true;
            }
        }
        
        public function oldModeratedComments()
        {
            $old =
           $q = $this->_db->query('SELECT * FROM moderation WHERE datemodified > DATE_SUB(NOW(), INTERVAL 5 DAY)');
            while ($donnees = $q->fetch(PDO::FETCH_ASSOC))
            {
                $old[] = new Comment($donnees);
            }
            return $old;
        }
    
        public function deleteModeration($getId)
        {
            $this->_db->exec('DELETE FROM moderation,  WHERE commentsid=' . $getId);
        }
    }