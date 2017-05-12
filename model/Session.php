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
        protected $_pwd;
        protected $_chaptertitle;
        protected $_pageid;
        protected $_comment;
        protected $_reponse;
        protected $_moderationid;
        protected $_role;
        
    
       use PseudoUser;
    
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
    
        public function getChapterId($UserId)
        {
            $manager = new ChapterManager();
            $chapter = $manager->userRead($UserId);
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