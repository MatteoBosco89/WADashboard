<?php


    /**
     * Contacts repository
     * wrapper for persistence
     */

    require_once('repository.php');

    class ContactsRepo extends Repository{
        
        public function __construct(){
            parent::__construct();
	    }
        
        public function persist(){

        }

        public function getAll(){
            
        }
    }

?>
