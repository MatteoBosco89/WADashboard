<?php

    /**
     * Message service
     */

    require_once('.\..\model\messages_repository.php');
    require_once('.\..\model\message.php');

    class MessageService{
        
        protected $token;
        protected $telephone_number;

        public function createMessage($messageText){
            $message = new Message();
            $messageRepo = new MessagesRepo();
            $message->newMessage($messageText);
            return $messageRepo->persist($message);
        }

        public function removeMessage($messageId){
            $messageRepo = new MessagesRepo();
            return $messageRepo->remove($messageId);
        }

        public function getMessage($id){
            $messageRepo = new MessagesRepo();
            $message = new Message();
            $data = $messageRepo->getMessage($id);
            if(!$data) return false;
            $message->constructId($data);
            return $message;
        }

        public function updateMessage($id, $messageText){
            $message = $this->getMessage($id);
            $messageRepo = new MessagesRepo();
            $message->updateMessage($messageText);
            return $messageRepo->update($message);
        }

        public function getAllMessages(){
            $messageRepo = new MessagesRepo();
            $data = $messageRepo->getAll();
            if(!$data) return false;
            $messages = array();
            foreach ($data as $m) {
                $message = new Message();
                $message->constructId($m);
                array_push($messages, $message);
            }
            return $messages;
        }

    }



?>