<?php

    require_once(__DIR__.'\..\settings.php');
    require_once(__DIR__.'\..\inc\db.php');

    abstract class Repository{
        
        protected $db;
        protected $connection;

        public function __construct(){
            $this->db = new Connection($db_host, $db_user, $db_passwd, $db_name);
            $this->connection = $this->db->getLink();
        }

        abstract public function persist();

        abstract public function getAll();

    }



?>