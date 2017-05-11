<?php
    
    /**
     * Created by PhpStorm.
     * User: natacha
     * Date: 11/05/2017
     * Time: 11:40
     * Pour envoyer un mail, j'ai besoin d'une adresse d'expéditeur, une adresse de destinataire (par défaut celle de
     * l'admin), un sujet et un message.
     */
    class Mail
    {
        protected $_from;
        protected $_object;
        protected $_message;
        
        
        function __construct($from, $object, $message)
        {
            if (!empty($from))
            {
                $this->setFrom($from);
            }
            if (!empty($object))
            {
                $this->setObject($object);
            }
            if (!empty($message))
            {
                $this->setMessage($message);
            }
        }
    
       
    
        /**
         * @return mixed
         */
        public function getFrom()
        {
            return $this->_from;
        }
    
        /**
         * @return mixed
         */
        public function getObject()
        {
            return $this->_object;
        }
    
        /**
         * @return mixed
         */
        public function getMessage()
        {
            return $this->_message;
        }
    
        /**
         * @param mixed $from
         */
        public function setFrom($from)
        {
            if (filter_var($from, FILTER_VALIDATE_EMAIL)) {
                $this->_from = $from;
            }
        }
    
        /**
         * @param mixed $object
         */
        public function setObject($object)
        {
            $this->_object = $object;
        }
    
        /**
         * @param mixed $message
         */
        public function setMessage($message)
        {
            $this->_message = $message;
        }
        
        
        public function sendMail($UserId)
        {
            $manager = new UserManager();
            $auteur = $manager->getUserById($UserId)->getEmail();
            mail($auteur, $this->getObject(), $this->getMessage());
            return true;
        }
    }