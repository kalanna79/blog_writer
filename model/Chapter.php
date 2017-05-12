<?php
    /**
     * Created by PhpStorm.
     * User: natacha
     * Date: 12/04/2017
     * Time: 15:44
     */
    
    class Chapter
    {
        protected $_id;
        protected $_title;
        protected $_texte;
        protected $_datecreated;
        protected $_date_modified;
        protected $_userid;
        protected $_resume;
        protected $_publicationid;
        
        
        use ConstructHydratable;
    
    
        //liste des getters
        public function getId()
        {
            return $this->_id;
        }
    
        public function getTitle()
        {
            return $this->_title;
        }
    
        public function getTexte()
        {
            return $this->_texte;
        }
    
        public function getDatecreated()
        {
            return $this->_datecreated;
        }
    
        public function getDatemodified()
        {
            return $this->_date_modified;
        }
    
        public function getUserId()
        {
            return $this->_userid;
        }
    
        public function getResume()
        {
            return $this->_resume;
        }
    
    
        //liste des setters
    
        public function setId($id)
        {
            $id = (int)$id;
            if ($id > 0) {
                $this->_id = $id;
            }
        }
    
        public function setTitle($title)
        {
            if (is_string($title)) {
                $this->_title = $title;
            }
        }
    
        public function setTexte($texte)
        {
            if (is_string($texte)) {
                $this->_texte = $texte;
            }
        }
    
        public function setDatecreated($datecreated)
        {
            if (is_string($datecreated))
                {
                DateTime::createFromFormat('m/d/Y', $datecreated);
                }
                
                $this->_datecreated = $datecreated;
        
        }
    
        public function setDatemodified($datemodified)
        {
            //  if (DateTime::createFromFormat('m/d/Y', $datemodified)) {
            $this->_date_modified = $datemodified;
        
        }
    
        public function setUserId($userid)
        {
            $userid = (int)$userid;
            $this->_userid = $userid;
        }
    
        public function setResume($resume)
        {
            if (is_string($resume)) {
                $this->_resume = $resume;
            }
            else {
                $this->_resume = NULL;
            }
        }
    
        /**
         * @param mixed $publicationid
         */
        public function setPublicationid($publicationid)
        {
            $publicationid = (int)$publicationid;
            $this->_publicationid = $publicationid;
        }
        
        /**
         * @param $texte = texte du chapitre
         * @return mixed = texte de la page visée selon le numéro
         */
    public function getPublicationId()
    {
        if ($this->_publicationid == 1){
            return "En attente";
        } else {
            return "Publié";
        }
    }
        
        
        public function showText($nb_car = 4000)
        {
            $getTexte = $this->_texte;
            $part = wordwrap($getTexte, $nb_car, '\n'); // on coupe le texte au mot le plus proche de 4000 car ou de $nb_car
            // et on ajoute \n
            $pager = explode('\n', $part); // on transforme le texte en array avec \n qui sert de séparateur
            if (is_string($getTexte)) {
                $page_selected = $_GET['page'];
            
                return $pager[$page_selected - 1]; //retourne le texte de la page visée
            }
        }
    
        /**
         * @param $texte = le texte à paginer
         *               affiche les numéros de pages avec lien vers la partie de texte
         */
        public function pagination($idChapter, $nb_car = 4000)
        {
            $getTexte = $this->_texte;
            $pages = " ";
            $part = wordwrap($getTexte, $nb_car, '\n'); // on coupe le texte au mot le plus proche de 4000 car ou de $nb_car
            // et on ajoute \n
            $pager = explode('\n', $part); // on transforme le texte en array avec \n qui sert de séparateur
            foreach ($pager as $key => $single) { // pour chaque ligne, on ajoute 1 pour afficher le numéro de page et on
                // met le lien pour accéder aux différentes pages
                $page = $key += 1;
                $pages .= '<a href=?idchapter=' . $idChapter . '&page=' . $key . '> ' . $page . ' </a>';
            }
            return $pages;
        }
        
        public function UserPagination($userid, $idChapter, $idpage)
        {
            $this->pagination($userid);
            $manager = new UserManager();
            $update = $manager->activeRead($userid, $idChapter, $idpage);
            return $update;
        }
        
    
    
        /**
         * function getExcerpt(nbchar) in index
         * nbchar = how many chars that you want
         * the end of the excerpt is "..."
         */
        public function getExcerpt($nb = NULL)
        {
            if ($this->getResume() != NULL) return $this->getResume();
                
            $text = $this->getTexte();
            $excerpt = substr($text, 0, $nb);
            $excerpt = substr($excerpt, 0, strrpos($excerpt, " "));
            $etc = "...";
            $excerpt = $excerpt.$etc;
            return $excerpt;
        }
        
        use PseudoUser;
    }