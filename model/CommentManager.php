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
        
        public function showCommentsTree()
        {
            $q = $this->_db->query('SELECT * FROM comments');
            $comments_by_id = array();
            while ($donnees = $q->fetch(PDO::FETCH_ASSOC))
            {
                $comments_by_id[$donnees['id']] = array(
                    'id' => $donnees['id'],
                    'parent_id' =>$donnees['parentId'],
                    'idUser' => $donnees['idUser'],
					'titre' => $donnees['title'],
                    'texte' => $donnees['texte'],
					'date' => $donnees['datecreated'],
                    'levelcomment' => $donnees['levelcomment']
                );
            }
            return $comments_by_id;
        }
        
        
        public function hasChildren($id)
        {
            $children = array();
            
                $q = $this->_db->query('SELECT * FROM comments WHERE parentId ='.$id);
                while ($donnees = $q->fetch(PDO::FETCH_ASSOC))
                {
                    $children[] = new Comment($donnees);
                }
                return $children;
            
        }
        
    
        public function afficher_commentaires($parent, $niveau, $array)
        {
            $html = "";
            $niveau_precedent = 0;
        
            if (!$niveau && !$niveau_precedent)
            {
                $html .= "\n<ul>\n";
            }
        
            foreach ($array AS $comment) {
            
                if ($parent == $comment['parent_id']) {
                    if ($niveau_precedent < $niveau) {
                        $html .= '<ul>';
                    }
                    $html .= "<li><span>" . $comment['idUser'] . " </span><span><strong>" . $comment['titre'] . '</strong></span><br><abbr>le ' . $comment['date'] . '</abbr><br>' . $comment['texte'];
    
                    //affichage des boutons répondre et signaler
                    if ($niveau != 2) {
                        $html .= '<button class="showForm btn btn-xs btn-success" id="comment-' . $comment['id'] . '"> Répondre</button>
						<button class="showForm btn btn-xs btn-warning" id="comment-' . $comment['id'] . '"> Signaler</button>
						<div class="row reponse" style="display: none" id="rep-comment-' . $comment['id'] . '" >
							<form action="" method="post">
								<input type="hidden" name="reponse" value=" ' . $comment['id'] . '">
								<input type="hidden" name="level" value="1">
								<textarea name="reponsetxt" cols="95" rows="3"></textarea> 						<br><br>
								<input type="submit" value="Envoyer" name="submitreponse">
							</form>
						</div>';
                    }
    
                }}}
                  
    
    
		 
    
    }