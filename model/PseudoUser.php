<?php
    /**
     * Created by PhpStorm.
     * User: natacha
     * Date: 10/05/2017
     * Time: 13:40
     */
    trait PseudoUser
    {
        public function getUserPseudo($userId)
        {
            $manager = new UserManager();
            $user = $manager->getUserById($userId)->getPseudo();
            return $user;
        }
        
    }