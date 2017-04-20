<?php
    /**
     * Created by PhpStorm.
     * User: natacha
     * Date: 20/04/2017
     * Time: 12:25
     */
    class UserManager extends BddManager
    {
    
        /**
         * show all users on the website
         * @return array
         */
        public function AllUsers()
        {
            $users = array();
    
            $q = $this->_db->query('SELECT * FROM user');
            while ($donnees = $q->fetch(PDO::FETCH_ASSOC))
            {
                $users[] = new User($donnees);
            }
            return $users;
        }
    
        /**
         * show a user selected by its id
         * @param $getIdUser
         * @return User
         */
         public function getUserById($getIdUser)
        {
            $getIdUser = (int) $getIdUser;
    
            $q = $this->_db->prepare('SELECT * FROM user WHERE idUser=?');
            $q->execute(array($getIdUser));
            $donnees = $q->fetch(PDO::FETCH_ASSOC);
            return new User($donnees);
        }
        
        /**
         *
         */
    }