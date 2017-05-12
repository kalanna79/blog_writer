<?php
    /**
     * Created by PhpStorm.
     * User: natacha
     * Date: 09/05/2017
     * Time: 22:48
     */
    
    class ModerationManager extends BddManager
    {
        public function addModeration(Moderation $moderation)
        {
            $q = $this->_db->prepare('INSERT INTO moderation (datecreated, datemodified, message, statusmodif, commentsid, userid) VALUES(:datecreated, 
NULL, :message, :statusmodif, :commentsid, :userid)');
            $q->bindValue('datecreated', date(DATE_W3C));
            $q->bindValue(':message', $moderation->getMessage());
            $q->bindValue(':statusmodif', 1);
            $q->bindValue(':commentsid', $moderation->getCommentsid());
            $q->bindValue(':userid', $moderation->getUserid());
        
            $q->execute();
        
            $moderation->hydrate(['id' => $this->_db->lastInsertId()]);
        }
    
        public function showModeration()
        {
            $q = $this->_db->query('SELECT * FROM moderation');
            while ($donnees = $q->fetch(PDO::FETCH_ASSOC)) {
                $moderations[] = new Moderation($donnees);
            }
        
            return $moderations;
        }
    
        public function updateModeration(Moderation $moderation, $commentsid, $userid)
        {
            $this->_db->exec('UPDATE moderation SET datemodified = :datemodified, message = :message, statusmodif= 
:statusmodif WHERE commentsid= :commentsid AND userid= :userid');
        }
        
        public function IsModered($commentsid, $userid)
        {
            $q = $this->_db->prepare('SELECT commentsid, userid FROM moderation WHERE commentsid= :commentsid AND userid= :userid');
            $q->execute(array('commentsid' => $commentsid, 'userid' =>$userid));
            $resultat = $q->fetch();
                
            if (empty($resultat))
            {
                return false;
            } else {
                return true;
            }
        }
        
        public function isInchapter($commentsid)
        {
            $q = $this->_db->prepare('SELECT comments.idChapter FROM comments, moderation WHERE comments.id = moderation.commentsid AND comments.id= :commentsid');
            $q->bindParam(':commentsid', $commentsid);
            $resultat = $q->execute();
            
            return $resultat;
        }
    }
    
    
    