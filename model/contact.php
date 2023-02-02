<?php 

    /**
     * Contact Entity
     */


    class Contact{

        protected $id;
        protected $name;
        protected $surname;
        protected $email;
        protected $number;
        protected $status;
        protected $pending;

        public function newContact($name, $surname, $email, $number, $status=false, $pending=3){
            $this->name = $name;
            $this->surname = $surname;
            $this->email = $email;
            $this->number = $number;
            $this->status = $status;
            $this->pending = $pending;
        }

        public function constructId($contact){
            $this->id = $contact['id'];
            $this->name = $contact['name'];
            $this->surname = $contact['surname'];
            $this->email = $contact['email'];
            $this->number = $contact['number'];
            $this->status = $contact['status'];
            $this->pending = $contact['pending'];
        }

        public function updateStatus($status){
            $this->status = $status;
        }

        public function getPending(){
            return $this->pending;
        }

        public function updatePending(){
            $this->pending--;
        }

        public function resetPending(){
            if($this->pending <= 0) $this->pending = 3;
        }

        public function getStatus(){
            return $this->status;
        }

        public function getId(){
            return $this->id;
        }

        public function getName(){
            return $this->name;
        }

        public function updateName($name){
            $this->name = $name;
        }

        public function getSurname(){
            return $this->surname;
        }

        public function updateSurname($surname){
            $this->surname = $surname;
        }

        public function getEmail(){
            return $this->email;
        }

        public function updateEmail($email){
            $this->email = $email;
        }

        public function getNumber(){
            return $this->number;
        }

        public function updateNumber($number){
            $this->number = $number;
        }

    }


?>