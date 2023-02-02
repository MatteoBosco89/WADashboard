<?php


    /**
     * Messages repository
     * wrapper for persistence
     */

    require_once('repository.php');


    class MessagesRepo extends Repository{

        public function __construct(){
            parent::__construct();
	    }

        public function persist($contact){

        }

        public function getAll(){
            
        }

    }

?>