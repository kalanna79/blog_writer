<?php
    /**
     * Created by PhpStorm.
     * User: natacha
     * Date: 10/05/2017
     * Time: 13:40
     */
    trait PseudoUser
    {
        public function getUser()
        {
            $manager = new UserManager();
            $user = $manager->getUserById($this->getUserId());
            return $user;
        }
    
        public function getUserPseudo()
        {
            return $this->getUser()->getPseudo();
        }
    }