<?php
    /**
     * Created by PhpStorm.
     * User: natacha
     * Date: 10/05/2017
     * Time: 17:29
     */
    Trait ConstructHydratable
    {
        public function __construct($donnees)
        {
            if (!empty($donnees))
            {
                return $this->hydrate($donnees);
            }
        }
    
        public function hydrate(array $donnees)
        {
            foreach ($donnees as $key=>$value)
            {
                $method = 'set' . ucfirst($key);
                if (method_exists($this, $method))
                {
                    $this->$method($value);
                }
            }
        }
    }