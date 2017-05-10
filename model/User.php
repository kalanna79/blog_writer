<?php
    /**
     * Created by PhpStorm.
     * User: natacha
     * Date: 20/04/2017
     * Time: 12:14
     */
    class User
    {
        protected $_idUser;
        protected $_firstname;
        protected $_name;
        protected $_pseudo;
        protected $_email;
        protected $_password;
        protected $_datemodified;
        protected $_roleiduser;
        protected $_datecreated;
        protected $_idchapter;
        protected $_page;
    
        use ConstructHydratable;
    
        /**
         * @param mixed $idUser
         */
        public function setIdUser($idUser)
        {
            $this->_idUser = $idUser;
        }
    
        /**
         * @param mixed $first_name
         */
        public function setFirstName($firstname)
        {
            $this->_firstname = $firstname;
        }
    
        /**
         * @param mixed $name
         */
        public function setName($name)
        {
            $this->_name = $name;
        }
    
        /**
         * @param mixed $pseudo
         */
        public function setPseudo($pseudo)
        {
            $this->_pseudo = $pseudo;
        }
    
        /**
         * @param mixed $email
         */
        public function setEmail($email)
        {
            $this->_email = $email;
        }
    
        /**
         * @param mixed $password
         */
        public function setPassword($password)
        {
            $this->_password = $password;
        }
    
        /**
         * @param mixed $date_modified
         */
        public function setDateModified($datemodified)
        {
            $this->_datemodified = $datemodified;
        }
    
        /**
         * @param mixed $roleiduser
         */
        public function setRoleiduser($roleiduser)
        {
            $this->_roleiduser = $roleiduser;
        }
    
        /**
         * @param mixed $date_created
         */
        public function setDateCreated($datecreated)
        {
            $this->_datecreated = $datecreated;
        }
    
        /**
         * @param mixed $idchapter
         */
        public function setIdchapter($idchapter)
        {
            $this->_idchapter = $idchapter;
        }
    
        /**
         * @param mixed $page
         */
        public function setPage($page)
        {
            $this->_page = $page;
        }
    
        
        // ---------- GETTERS -----------------
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
        public function getFirstName()
        {
            return $this->_firstname;
        }
    
        /**
         * @return mixed
         */
        public function getName()
        {
            return $this->_name;
        }
    
        /**
         * @return mixed
         */
        public function getPseudo()
        {
            return $this->_pseudo;
        }
    
        /**
         * @return mixed
         */
        public function getEmail()
        {
            return $this->_email;
        }
    
        /**
         * @return mixed
         */
        public function getPassword()
        {
            return $this->_password;
        }
    
        /**
         * @return mixed
         */
        public function getDateModified()
        {
            return $this->_datemodified;
        }
    
        /**
         * @return mixed
         */
        public function getRoleiduser()
        {
            return $this->_roleiduser;
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
        public function getIdchapter()
        {
            return $this->_idchapter;
        }
    
        /**
         * @return mixed
         */
        public function getPage()
        {
            return $this->_page;
        }
    
        
    }