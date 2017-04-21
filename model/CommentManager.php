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
        
        public function addComment(Comment $comment)
        {
            $q = $this->_db->prepare('INSERT INTO comments (title, texte, datecreated, idUser, idchapter, commentsid) VALUES(:title, :texte, NOW(), 
 :idUser, :idChapter, :commentsid)');
            $q->bindValue(':title', $comment->getTitle());
            $q->bindValue(':texte', $comment->getTexte());
            $q->bindValue(':idUser', $_SESSION['id']);
            $q->bindValue('idChapter', $comment->getIdchapter());
            $q->bindValue('commentsid', $comment->getCommentsId());
            $q->execute();
            
            $comment->hydrate([
                'id' => $this->_db->lastInsertId()
                              ]);
        }
    }