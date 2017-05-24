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
    
        /** Add an user
         * @param User $user
         */
        public function addUser(User $user)
        {
            $q = $this->_db->prepare('INSERT INTO user (firstname, name, pseudo, email, password, datemodified, roleiduser, datecreated) VALUES(:firstname,
 :name, :pseudo, :email, :password, :datemodified, :roleiduser, :datecreated)');
            $q->bindValue(':firstname', $user->getFirstName(), PDO::PARAM_STR);
            $q->bindValue(':name', $user->getName(), PDO::PARAM_STR);
            $q->bindValue(':pseudo', $user->getPseudo(), PDO::PARAM_STR);
            $q->bindValue(':email', $user->getEmail(), PDO::PARAM_STR);
            $q->bindValue(':password', $user->getPassword(), PDO::PARAM_STR);
            $q->bindValue(':datemodified', NULL);
            $q->bindValue(':roleiduser', 2, PDO::PARAM_INT);
            $q->bindValue(':datecreated', date(DATE_W3C));
            $q->execute();
            
            $user->hydrate([
                'idUser' => $this->_db->lastInsertId()
                           ]);
        }
    
        /** verify if pseudo or email exists in db
         * @param $pseudo
         * @param $email
         * @return mixed
         */
        public function verifAdd($pseudo, $email)
        {
            $q = $this->_db->prepare('SELECT * FROM user where pseudo=:pseudo OR email=:email');
            $q->bindValue(':pseudo', $pseudo, PDO::PARAM_STR);
            $q->bindValue(':email', $email, PDO::PARAM_STR);
            $q->execute();
            $resultat = $q->fetch(PDO::FETCH_ASSOC);
            return $resultat;
        }
    
        /** verify if pseudo + pwd are equal to a user
         * @param $pseudo
         * @param $pwd
         * @return mixed
         */
        public function verifUser($pseudo, $pwd)
        {
            $q = $this->_db->prepare('SELECT * FROM user WHERE pseudo=:pseudo AND password=:password');
            $q->bindValue(':pseudo', $pseudo, PDO::PARAM_STR);
            $q->bindValue(':password', sha1($pwd), PDO::PARAM_STR);
            $q->execute();
            $resultat = $q->fetch(PDO::FETCH_ASSOC);
           return $resultat;
        }
        
        public function updatePwd($pseudo, $pwd)
        {
            $q = $this->_db->prepare('UPDATE user SET password = :password WHERE pseudo=:pseudo');
            $q->bindValue(':password', sha1($pwd), PDO::PARAM_INT);
            $q->bindValue(':pseudo', $pseudo, PDO::PARAM_INT);
            $q->execute();
        }
        
        /** Return where the user stops his reading with the page and the chapter
         * @param $userid -> the session id
         * @param $chapterid -> get param
         * @param $page -> get param
         */
        public function activeRead($userid,$chapterid, $page)
        {
            $q = $this->_db->prepare('UPDATE user SET idchapter = :idchapter, page = :page, datemodified = :datemodified WHERE idUser = '
                                     .$userid);
            $q->bindValue(':idchapter', $chapterid, PDO::PARAM_INT);
            $q->bindValue(':page', $page, PDO::PARAM_INT);
            $q->bindValue(':datemodified', date(DATE_W3C));
            $q->execute();
        }
    }