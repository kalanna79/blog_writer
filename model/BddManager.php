<?php
    /**
     * Created by PhpStorm.
     * User: natacha
     * Date: 14/04/2017
     * Time: 15:15
     */
    class BddManager
    {
        protected $_db;
        protected $_hostname = 'localhost';
        protected $_login = 'root';
        protected $_pwd = 'root';
        protected $_dbname = 'blogwriter';
    
        public function __construct()
        {
            $db = new PDO('mysql:hostname='. $this->_hostname.';dbname='.$this->_dbname.';charset=utf8',
                          $this->_login, $this->_pwd);
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
            $this->_db = $db;
        }
    }