<?php
    /**
     * Created by PhpStorm.
     * User: natacha
     * Date: 20/04/2017
     * Time: 09:11
     */
    class Comment
    {
        protected $_id;
        protected $_title;
        protected $_texte;
        protected $_datecreated;
        protected $_idUser;
        protected $_idchapter;
        protected $_parentId;
        protected $_levelcomment;
    
    
        use ConstructHydratable;
        use PseudoUser;
    
        /**
         * @return mixed
         */
        public function getId()
        {
            return $this->_id;
        }
    
        /**
         * @return mixed
         */
        public function getTitle()
        {
            return $this->_title;
        }
    
        /**
         * @return mixed
         */
        public function getTexte()
        {
            return $this->_texte;
        }
    
        /**
         * @return mixed
         */
        public function getDateCreated()
        {
            return $this->_datecreated;
        }
    
        /**
         * @return mixed
         */
        public function getIdUser()
        {
            return $this->_idUser;
        }
    
        /**
         * @return mixed
         */
        public function getIdchapter()
        {
            return $this->_idchapter;
        }
    
        /**
         * @return mixed
         */
        public function getParentId()
        {
            return $this->_parentId;
        }
    
        /**
         * @return mixed
         */
        public function getLevelComment()
        {
            return $this->_levelcomment;
        }
    
        //setters
    
        /**
         * @param mixed $id
         */
        public function setId($id)
        {
            $id = (int)$id;
            $this->_id = $id;
        }
    
        /**
         * @param mixed $title
         */
        public function setTitle($title)
        {
            if (is_string($title)) {
                $this->_title = $title;
            }
        }
    
        /**
         * @param mixed $texte
         */
        public function setTexte($texte)
        {
            if (is_string($texte)) {
                $this->_texte = $texte;
            }
        }
    
        /**
         * @param mixed $idUser
         */
        public function setIdUser($idUser)
        {
            $idUser = (int)$idUser;
            $this->_idUser = $idUser;
        }
    
        /**
         * @param mixed $idchapter
         */
        public function setIdchapter($idchapter)
        {
            $idchapter = (int)$idchapter;
            $this->_idchapter = $idchapter;
        }
    
        /**
         * @param mixed $comments_id
         */
        public function setParentId($parentId)
        {
        
            $parentId = (int)$parentId;
            $this->_parentId = $parentId;
        }
    
        /**
         * @param mixed $level
         */
        public function setLevelComment($levelcomment)
        {
            $levelcomment = (int)$levelcomment;
            $this->_levelcomment = $levelcomment;
        }
    
        /**
         * @param mixed $date_created
         */
        public function setDateCreated($datecreated)
        {
            if (is_string($datecreated)) {
                $this->_datecreated = $datecreated;
            }
        }
    }