<?php

    require_once('wa_dashboard_api.php');
    require_once(__DIR__.'\..\service\contacts_service.php');
    require_once(__DIR__.'\..\service\message_service.php');


    class Controller extends WADApi{

        public function __construct(){
            parent::__construct();
            $this->{$this->request->getMethod()}();
        }

        public function addcontact(){
            http_response_code(200);
            print($this->request->getMethod());
        }
        public function removecontact(){
            http_response_code(200);
            print($this->request->getMethod());
        }
        public function updatecontact(){
            http_response_code(200);
            print($this->request->getMethod());
        }
        public function getcontact(){
            http_response_code(200);
            print($this->request->getMethod());
        }
        public function getallcontacts(){
            http_response_code(200);
            print($this->request->getMethod());
        }
        public function changestatuscontact(){
            http_response_code(200);
            print($this->request->getMethod());
        }

        public function updatemessage(){
            http_response_code(200);
            print($this->request->getMethod());
        }
        public function removemessage(){
            http_response_code(200);
            print($this->request->getMethod());
        }
        public function addmessage(){
            http_response_code(200);
            print($this->request->getMethod());
        }
        public function getmessagelist(){
            http_response_code(200);
            print($this->request->getMethod());
        }

        public function sendmessage(){
            http_response_code(200);
            print($this->request->getMethod());
        }

        public function notifypending(){
            http_response_code(200);
            print($this->request->getMethod());
        }
        

    }


    

?>