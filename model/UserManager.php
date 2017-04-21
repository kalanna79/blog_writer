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
        
        public function addUser(User $user)
        {
            $q = $this->_db->prepare('INSERT INTO user (firstname, name, pseudo, email, password, datemodified, roleiduser, datecreated) VALUES(:firstname,
 :name, :pseudo, :email, :password, :datemodified, :roleiduser, NOW())');
            $q->bindValue(':firstname', $user->getFirstName());
            $q->bindValue(':name', $user->getName());
            $q->bindValue(':pseudo', $user->getPseudo());
            $q->bindValue(':email', $user->getEmail());
            $q->bindValue(':password', $user->getPassword());
            $q->bindValue(':datemodified', NULL);
            $q->bindValue(':roleiduser', 2);
            $q->execute();
            
            $user->hydrate([
                'idUser' => $this->_db->lastInsertId()
                           ]);
        }
        
        public function verifUser()
        {
            $q = $this->_db->prepare('SELECT * FROM user WHERE pseudo=:pseudo AND password=:password');
            $q->execute(array(
                'pseudo' => $_POST['pseudo'], 'password' => $_POST['password']));
            $resultat = $q->fetch(PDO::FETCH_ASSOC);
            if (!$resultat)
            {
                echo 'Mauvais identifiant ou mot de passe';
            }
            else
            {
                session_start();
                $_SESSION['id'] = $resultat['idUser'];
                $_SESSION['pseudo'] = $resultat['pseudo'];
            }
        }
    }