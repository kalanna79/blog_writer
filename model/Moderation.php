<?php
    /**
     * Created by PhpStorm.
     * User: natacha
     * Date: 09/05/2017
     * Time: 15:57
     */
    class Moderation
    {
        protected $_id;
        protected $_datecreated;
        protected $_datemodified;
        protected $_message;
        protected $_statusmodid;
        protected $_commentsid;
        protected $_userid;
    
    
        public function __construct($donnees)
        {
            if (!empty($donnees))
            {
                return $this->hydrate($donnees);
            }
        }
    
        public function hydrate(array $donnees)
        {
            foreach ($donnees as $key=>$value)
            {
                $method = 'set' . ucfirst($key);
                if (method_exists($this, $method))
                {
                    $this->$method($value);
                }
            }
        }
        
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
        public function getDatecreated()
        {
            return $this->_datecreated;
        }
    
        /**
         * @return mixed
         */
        public function getDatemodified()
        {
            return $this->_datemodified;
        }
    
        /**
         * @return mixed
         */
        public function getMessage()
        {
            return $this->_message;
        }
    
        /**
         * @return mixed
         */
        public function getStatusmodid()
        {
            return $this->_statusmodid;
        }
        /**
         * @return mixed
         */
        public function getCommentsid()
        {
            return $this->_commentsid;
        }
    
        /**
         * @return mixed
         */
        public function getUserid()
        {
            return $this->_userid;
        }
    
        /**
         * @param mixed $id
         */
        public function setId($id)
        {
            $this->_id = $id;
        }
    
        /**
         * @param mixed $datecreated
         */
        public function setDatecreated($datecreated)
        {
            $this->_datecreated = $datecreated;
        }
    
        /**
         * @param mixed $datemodified
         */
        public function setDatemodified($datemodified)
        {
            $this->_datemodified = $datemodified;
        }
    
        /**
         * @param mixed $message
         */
        public function setMessage($message)
        {
            $this->_message = $message;
        }
    
        /**
         * @param mixed $statusmodid
         */
        public function setStatusmodid($statusmodid)
        {
            $this->_statusmodid = $statusmodid;
        }
    
        /**
         * @param mixed $commentsid
         */
        public function setCommentsid($commentsid)
        {
            $this->_commentsid = $commentsid;
        }
    
        /**
         * @param mixed $userid
         */
        public function setUserid($userid)
        {
            $this->_userid = $userid;
        }
    }