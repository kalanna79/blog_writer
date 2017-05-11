<?php
    
    
    class GestionnaireMail
    {
        private $adresseMail;
        private $objet;
        private $message;
        //ajout Nat.
        private $expediteurmail;
        private $nomexp;
        
        //ici la structure me fait deviner qu'il faut un tableau mais au début je n'en étais pas sûre. En plus, je ne
        // trouve pas ça facile à définir ensuite dans mon controller.
        public function __construct($donnees)
        {
            $this->setExpediteurmail($donnees['expediteurmail']);
            $this->setNomexp($donnees['nomexp']);
            $this->setAdressemail($donnees['adresseMail']);
            $this->setMessage($donnees['message']);
            $this->setObjet($donnees['objet']);
            
        }
        
        public function setAdressemail($adresseMail)
        {
            $this->adresseMail = $adresseMail;
        }
        
        public function setObjet($objet)
        {
            $this->objet = $objet;
        }
        
        public function setMessage($message)
        {
            $this->message = $message;
        }
    
        /** j'ai ajouté expediteur mail pour récupérer le mail de la personne à qui je dois répondre
         * @param mixed $expediteurmail
         */
        public function setExpediteurmail($expediteurmail)
        {
            $this->expediteurmail = $expediteurmail;
        }
    
        /** j'ai ajouté le nom de l'expé pour récupérer le nom de la personne à qui je dois répondre
         * @param mixed $nomexp
         */
        public function setNomexp($nomexp)
        {
            $this->nomexp = $nomexp;
        }
        
        public function envoyerMail()
        {
            if($this->adresseMail == null)
            {
                return false;
            }
            
            
            if($this->message == null OR $this->objet == null)
            {
                
                return false;
            }
            
            
            return mail($this->adresseMail, $this->objet, $this->message);
            //return true;
            
            
        }
        
        //ajout par Nat.
//j'ai rajouté les getters pour accéder à mes attributs et pouvoir afficher le contenu des attributs de mon objet
        /**
         * @return mixed
         */
        public function getObjet()
        {
            return $this->objet;
        }
        
        /**
         * @return mixed
         */
        public function getAdresseMail()
        {
            return $this->adresseMail;
        }
        
        /**
         * @return mixed
         */
        public function getMessage()
        {
            return $this->message;
        }
        
        /**
         * @return mixed
         */
        public function getExpediteurmail()
        {
            return $this->expediteurmail;
        }
        
        /**
         * @return mixed
         */
        public function getNomexp()
        {
            return $this->nomexp;
        }
        
        
        
    }