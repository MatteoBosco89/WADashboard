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
            $cs = new ContactsService();
            if($cs->createContact($_POST['name'], $_POST['surname'], $_POST['email'], $_POST['number'])) http_response_code(201);
            else http_response_code(500);
        }
        public function removecontact(){
            $cs = new ContactsService();
            if($cs->removeContact($_POST['id'])) http_response_code(204);
            else http_response_code(500);
        }
        public function updatecontact(){
            $cs = new ContactsService();
            if($cs->updateContact($_POST['id'], $_POST['name'], $_POST['surname'], $_POST['email'], $_POST['number'])) http_response_code(204);
            else http_response_code(500);
        }
        public function getcontact(){
            $cs = new ContactsService();
            $contact = $cs->getContact($_GET['id']);
            if(!$contact) http_response_code(404);
            else print(json_encode($contact));
        }
        public function getallcontacts(){
            $cs = new ContactsService();
            $contacts = $cs->getAllContacts();
            if(!$contacts) http_response_code(404);
            else print(json_encode($contacts));
        }
        public function changestatuscontact(){
            $cs = new ContactsService();
            if($cs->updateContactStatus($_POST['id'], $_POST['status'])) http_response_code(204);
            else http_response_code(500);
        }

        public function updatemessage(){
            $ms = new MessageService();
            if($ms->updateMessage($_POST['id'], $_POST['message'])) http_response_code(204);
            else http_response_code(500);
        }
        public function removemessage(){
            $ms = new MessageService();
            if($ms->removeMessage($_POST['id'])) http_response_code(204);
            else http_response_code(500);
        }
        public function addmessage(){
            $ms = new MessageService();
            if($ms->createMessage($_POST['message'])) http_response_code(201);
            else http_response_code(500);
        }
        public function getmessagelist(){
            $ms = new MessageService();
            $messages = $ms->getAllMessages();
            if(!$messages) http_response_code(404);
            else print(json_encode($messages));
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