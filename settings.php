<?php

    /**
     * Settings 
     * db connection
     * API token
     * telephone number
     */

    class Settings{

        protected $db_host = "127.0.0.1";
        protected $db_name = "watest";
        protected $db_user = "root";
        protected $db_passwd = "";

        protected $whatsapp_api_token = "TOKEN";

        protected $telephone_number = "NUMBER";

        public function getHost(){
            return $this->db_host;
        }

        public function getName(){
            return $this->db_name;
        }

        public function getUser(){
            return $this->db_user;
        }

        public function getPass(){
            return $this->db_passwd;
        }

    }




?>