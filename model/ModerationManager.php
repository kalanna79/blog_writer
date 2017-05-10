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
            $q->bindValue('datecreated', $moderation->getDatecreated());
            $q->bindValue(':message', $moderation->getMessage());
            $q->bindValue(':statusmodif', 1);
            $q->bindValue(':commentsid', $moderation->getCommentsid());
            $q->bindValue(':userid', $moderation->getUserid());
            
            $q->execute();
            
            $moderation->hydrate(['id'=>$this->_db->lastInsertId()]);
        }
        
        
        public function showModeration()
        {
            $q = $this->_db->query('SELECT * FROM moderation');
            while ($donnees = $q->fetch(PDO::FETCH_ASSOC))
            {
                $moderations[] = new Moderation($donnees);
            }
            return $moderations;
        }
    }
    
    
    