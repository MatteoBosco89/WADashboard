<?php

    /**
     * Contacts service
     */
    
    require_once('.\..\model\contacts_repository.php');
    require_once('.\..\model\contact.php');

    class ContactsService{
        
        protected $token;
        protected $telephone_number;

        public function __construct(){

        }

        public function createContact($name, $surname, $email, $number){
            $contact = new Contact();
            $contactRepo = new ContactsRepo();
            $contact->newContact($name, $surname, $email, $number);
            return $contactRepo->persist($contact);
        }

        public function removeContact($contact){
            $contactRepo = new ContactsRepo();
            return $contactRepo->remove($contact);
        }

        public function updateContact($id, $name, $surname, $email, $number){
            $contact = $this->getContact($id);
            $contactRepo = new ContactsRepo();
            $contact->updateName($name);
            $contact->updateSurname($surname);
            $contact->updateNumber($number);
            $contact->updateEmail($email);
            return $contactRepo->update($contact);
        }

        public function getContact($id){
            $contactRepo = new ContactsRepo();
            $contact = new Contact();
            $data = $contactRepo->getContact($id);
            if(!$data) return false;
            $contact->constructId($data);
            return $contact;
        }

        public function getAllContacts(){
            $contactRepo = new ContactsRepo();
            $data = $contactRepo->getAll();
            if(!$data) return false;
            $contacts = array();
            foreach ($data as $c) {
                $contact = new Contact();
                $contact->constructId($c);
                array_push($contacts, $contact);
            }
            return $contacts;
        }

        public function updateContactStatus($id, $status){
            $contactRepo = new ContactsRepo();
            $contact = $this->getContact($id);
            $contact->updateStatus($status);
            return $contactRepo->update($contact);
        }

    }

?>