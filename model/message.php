<?php

    /**
     * Message Entity
     */

    class Message{

        protected $id;
        protected $message;

        public function newMessage($message){
            $this->message = $message;
        }

        public function construcIt($message){
            $this->id = $message['id'];
            $this->message = $message['message'];
        }

        public function updateMessage($message){
            $this->message = $message;
        }

        public function getId(){
            return $this->id;
        }

        public function getMessage(){
            return $this->message;
        }

    }

?>