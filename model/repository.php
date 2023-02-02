<?php

    require_once(__DIR__.'\..\settings.php');
    require_once(__DIR__.'\..\inc\db.php');

    abstract class Repository{
        
        protected $db;
        protected $connection;

        public function __construct(){
            $settings = new Settings();
            $this->db = new Connection($settings->getHost(), $settings->getUser(), $settings->getPass(), $settings->getName());
            $this->connection = $this->db->getLink();
        }

        abstract public function persist($obj);

        abstract public function getAll();

    }



?>