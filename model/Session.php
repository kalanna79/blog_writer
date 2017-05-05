<?php
    /**
     * Created by PhpStorm.
     * User: natacha
     * Date: 04/05/2017
     * Time: 11:37
     */
    class Session
    {
        protected $_pseudo;
        protected $_chaptertitle;
        protected $_pageid;
        protected $_comment;
        protected $_reponse;
        protected $_moderationid;
        
    
        /**
         * @return mixed
         */
        public function getPseudo()
        {
            $manager = new UserManager();
            $user = $manager->getUserById($_SESSION['id'])->getPseudo();
            return $user;
        }
    
        /**
         * @return mixed
         */
        public function getChapterTitle($chapterid)
        {
            $manager = new ChapterManager();
            $chapter = $manager->Chapter_selected($chapterid);
            $title = $chapter->getTitle();
            return $title;
        }
    
        public function getChapterId()
        {
            $manager = new ChapterManager();
            $chapter = $manager->userRead($_SESSION['id']);
            $title = $chapter->getId();
            return $title;
        }
        /**
         * @return mixed
         */
        public function getPageid()
        {
            $manager = new UserManager();
            
            return $this->_pageid;
        }
    
        /**
         * @return mixed
         */
        public function getComment()
        {
            return $this->_comment;
        }
    
        /**
         * @return mixed
         */
        public function getReponse()
        {
            return $this->_reponse;
        }
    
        /**
         * @return mixed
         */
        public function getModerationid()
        {
            return $this->_moderationid;
        }
    
        
    
    
    }