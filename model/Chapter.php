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
        protected $_date_created;
        protected $_date_modified;
        protected $_user;
        protected $_resume;
    
        //----- function construct
        public function __construct($donnees = [])
        {
            if (!empty($donnees)) {
                $this->hydrate($donnees);
            }
        
        }
    
        //----- function hydrate
        public function hydrate(array $donnees)
        {
            foreach ($donnees as $key => $value) {
                $method = 'set' . ucfirst($key);
                if (method_exists($this, $method)) {
                    $this->$method($value);
                }
            }
        }
    
    
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
            return $this->_date_created;
        }
    
        public function getDatemodified()
        {
            return $this->_date_modified;
        }
    
        public function getUser()
        {
            return $this->_user;
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
            // if (DateTime::createFromFormat('m/d/Y', $datecreated)) {
            $this->_date_created = $datecreated;
        
        }
    
        public function setDatemodified($datemodified)
        {
            //  if (DateTime::createFromFormat('m/d/Y', $datemodified)) {
            $this->_date_modified = $datemodified;
        
        }
    
        public function setUser($user)
        {
            $user = (int)$user;
            if ($user == 1) {
                $this->_user = 'Jean Rochefort';
            } elseif ($user == 2) {
                $this->_user = 'lecteur';
            } else {
                $this->_user = 'Cet utilisateur n\'existe pas';
            }
        }
    
        public function setResume($resume)
        {
            if (is_string($resume)) {
                $this->_resume = $resume;
            }
        }
    
    
        /**
         * @param $texte = texte du chapitre
         * @return mixed = texte de la page visée selon le numéro
         */
    
        public function showText()
        {
            $getTexte = $this->_texte;
            $nb_car = 4000;
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
        public function pagination()
        {
            $getTexte = $this->_texte;
            $nb_car = 4000;
            $part = wordwrap($getTexte, $nb_car, '\n'); // on coupe le texte au mot le plus proche de 4000 car ou de $nb_car
            // et on ajoute \n
            $pager = explode('\n', $part); // on transforme le texte en array avec \n qui sert de séparateur
            foreach ($pager as $key => $single) { // pour chaque ligne, on ajoute 1 pour afficher le numéro de page et on
                // met le lien pour accéder aux différentes pages
                $page = $key += 1;
                echo $page = '<a href=?id=' . $_GET['id'] . '&page=' . $key . '> ' . $page . ' </a>';
            }
        }
    }