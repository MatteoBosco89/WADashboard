<?php

    /**
     * Message Entity
     */

    class Message{

        protected $id;
        protected $message;

        public function __construct($id, $message){
            $this->id = $id;
            $this->message = $message;
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