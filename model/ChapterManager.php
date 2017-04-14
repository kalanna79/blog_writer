<?php
    /**
     * Created by PhpStorm.
     * User: natacha
     * Date: 13/04/2017
     * Time: 08:03
     */
    
    class ChapterManager extends BddManager
    {
        //afficher tous les livres
        public function Tab_matieres()
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
    }
    
    