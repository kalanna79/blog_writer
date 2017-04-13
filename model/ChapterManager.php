<?php
    /**
     * Created by PhpStorm.
     * User: natacha
     * Date: 13/04/2017
     * Time: 08:03
     */
    
    class ChapterManager
    {
        private $_db;
        private $_hostname = 'localhost';
        private $_login = 'root';
        private $_pwd = 'root';
        private $_dbname = 'blogwriter';
        
        public function __construct()
        {
            $db = new PDO('mysql:hostname='. $this->_hostname.';dbname='.$this->_dbname.';charset=utf8',
                          $this->_login, $this->_pwd);
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
            $this->_db = $db;
        }
        
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
    
    