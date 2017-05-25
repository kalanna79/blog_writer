<?php
    /**
     * Created by PhpStorm.
     * User: natacha
     * Date: 13/04/2017
     * Time: 08:03
     */
    class ChapterManager extends BddManager
    {
        //afficher tous les chapitres validés
        public function Tab_matieres()
        {
            $chapters = array();
            
            $q = $this->_db->query('SELECT * FROM chapter WHERE publicationid = 2');
            while ($donnees = $q->fetch(PDO::FETCH_ASSOC))
            {
                $chapters[] = new Chapter($donnees);
            }
            return $chapters;
        }
        
        //afficher tous les chapitres
        public function allChapters()
        {
            $chapters = array();
        
            $q = $this->_db->query('SELECT * FROM chapter');
            while ($donnees = $q->fetch(PDO::FETCH_ASSOC))
            {
                $chapters[] = new Chapter($donnees);
            }
            return $chapters;
        }
        //afficher un livre sélectionné
        public function Chapter_selected($getId)
        {
            $getId = (int) $getId;
            
            $q = $this->_db->prepare('SELECT * FROM chapter WHERE id=?');
            $q->execute(array($getId));
            $chap = $q->fetch(PDO::FETCH_ASSOC);
            return new Chapter($chap);
        }
    
        public function userRead($getUserId)
        {
            $getUserId = (int) $getUserId;
            $q = $this->_db->prepare('SELECT * FROM chapter WHERE userid=?');
            $q->execute(array($getUserId));
            $resultat = $q->fetch(PDO::FETCH_ASSOC);
            return new Chapter($resultat);
        }
        
        
        public function addChapter(Chapter $chapter)
        {
            $q = $this->_db->prepare('INSERT INTO chapter(title, img, texte, datemodified, resume, datecreated, userid, publicationid, numero) VALUES(:title, 
NULL, 
:texte, NULL, :resume, :datecreated, :userid, 1, :numero)');
            $q->bindValue(':title', $chapter->getTitle(), PDO::PARAM_STR);
            $q->bindValue(':texte', $chapter->getTexte(), PDO::PARAM_STR);
            $q->bindValue(':resume', $chapter->getResume(), PDO::PARAM_STR);
            $q->bindValue(':datecreated', date(DATE_W3C));
            $q->bindValue(':userid', $chapter->getUserId(), PDO::PARAM_INT);
            $q->bindValue(':numero', $chapter->getNumero(), PDO::PARAM_INT);
    
            $q->execute();
            
            $chapter->hydrate(['id' => $this->_db->lastInsertId()]);
        }
    
        public function publiChapter(Chapter $chapter)
        {
            $q = $this->_db->prepare('INSERT INTO chapter(title, img, texte, datemodified, resume, datecreated, userid, publicationid, numero) VALUES(:title, 
NULL, 
:texte, 
NULL, :resume, :datecreated, :userid, 2, :numero)');
            $q->bindValue(':title', $chapter->getTitle(), PDO::PARAM_STR);
            $q->bindValue(':texte', $chapter->getTexte(), PDO::PARAM_STR);
            $q->bindValue(':resume', $chapter->getResume(), PDO::PARAM_STR);
            $q->bindValue(':datecreated', date(DATE_W3C));
            $q->bindValue(':userid', $chapter->getUserId(), PDO::PARAM_INT);
            $q->bindValue(':numero', $chapter->getNumero(), PDO::PARAM_INT);
            $q->execute();
        
            $chapter->hydrate(['id' => $this->_db->lastInsertId()]);
        }
        
        public function updateChapter(Chapter $chapter, $getId, $publicationId)
        {
            $q = $this->_db->prepare('UPDATE chapter SET title = :title, texte = :texte, datemodified = :datemodified, resume = :resume, publicationid = 
:publicationid, numero = :numero WHERE id ='.$getId);
            $q->bindValue(':title', $chapter->getTitle(), PDO::PARAM_STR);
            $q->bindValue(':texte', $chapter->getTexte(), PDO::PARAM_STR);
            $q->bindValue(':datemodified', date(DATE_W3C));
            $q->bindValue(':resume', $chapter->getResume(), PDO::PARAM_STR);
            $q->bindValue(':publicationid', $publicationId, PDO::PARAM_INT);
            $q->bindValue(':numero', $chapter->getNumero(), PDO::PARAM_INT);
            $q->execute();
        }
        
        public function deleteChapter($getId)
        {
            $this->_db->exec('DELETE FROM chapter WHERE id=' . $getId);
        }
    }
   
    
    