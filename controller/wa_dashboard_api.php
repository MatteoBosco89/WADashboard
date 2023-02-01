<?php

   require_once('request_controller.php');
   
   /**
    * API declaration
    */

   
   abstract class WADApi extends RequestController{

      public function __construct(){
         $this->buildRequestMap();
         parent::__construct();
      }

      /** Contacts API */

      abstract public function addcontact();
      abstract public function removecontact();
      abstract public function updatecontact();
      abstract public function getcontact();
      abstract public function getallcontacts();
      abstract public function changestatuscontact();

      /** Messages API */

      abstract public function updatemessage();
      abstract public function removemessage();
      abstract public function addmessage();
      abstract public function getmessagelist();

      /** Combined */

      abstract public function sendmessage();
      abstract public function notifypending();

      protected function buildRequestMap(){
         array_push($this->requestMap, new RequestHandler("contacts", "add", "POST", "addcontact", ['name', 'surname', 'email', 'number']));
         array_push($this->requestMap, new RequestHandler("contacts", "remove", "POST", "removecontact", ['id']));
         array_push($this->requestMap, new RequestHandler("contacts", "update", "POST", "updatecontact", ['id', 'name', 'surname', 'email', 'number']));
         array_push($this->requestMap, new RequestHandler("contacts", "get", "GET", "getcontact", ['id']));
         array_push($this->requestMap, new RequestHandler("contacts", "all", "GET", "getallcontacts"));
         array_push($this->requestMap, new RequestHandler("contacts", "status", "POST", "changestatuscontact", ['id', 'status']));

         array_push($this->requestMap, new RequestHandler("messages", "remove", "POST", "removemessage", ['id']));
         array_push($this->requestMap, new RequestHandler("messages", "update", "POST", "updatemessage", ['id', 'message']));
         array_push($this->requestMap, new RequestHandler("messages", "all", "GET", "getmessagelist"));
         array_push($this->requestMap, new RequestHandler("messages", "add", "POST", "addmessage", ['message']));

         array_push($this->requestMap, new RequestHandler("sendmessage", "single", "POST", "sendmessage", ['contactid', 'message', 'sendamil']));
         array_push($this->requestMap, new RequestHandler("sendmessage", "notify", "POST", "notifypending"));
      }

   }



?>