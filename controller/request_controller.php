<?php

    /**
     * URL and Method parser for controller
     * 
     */

    abstract class RequestController{
        protected $method;
        protected $requestMap = array();
        protected $request;
        protected $requesturi;
        protected $uri;
        protected $command;
        
        public function __construct(){
            $this->method = $_SERVER["REQUEST_METHOD"];
            $this->requesturi = $_SERVER['REQUEST_URI'];
            $this->buildUri();
            $this->filterRequest();
        }

        protected function buildUri(){
            $s = strtok($this->requesturi, '?');
            $s = strtok($s, '/');
            $parts = [];
            while($s != false){
                $parts[] = $s;
                $s = strtok('/');
            }
            $r = count($parts);
            if($r > 2){
                $this->uri = $parts[$r-2];
                $this->command = $parts[$r-1];
            }else {
                http_response_code(400);
            exit;
            }
            
        }

        abstract protected function buildRequestMap();

        protected function filterUri($el){
            return $el->getUri() === $this->uri;
        }

        protected function filterCommand($el){
            return $el->getCommand() === $this->command;
        }

        protected function filterMethod($el){
            return $el->getRMethod() === $this->method;
        }

        protected function filterParams($el){
            if($this->method == 'GET') return array_keys($_GET) == $el->getParams();
            else if($this->method == 'POST') return array_keys($_POST) == $el->getParams();
        }

        protected function filterRequest(){
            $req = array_filter($this->requestMap, array($this, 'filterUri'));
            $req = array_filter($req, array($this, 'filterCommand'));
            $req = array_filter($req, array($this, 'filterMethod'));
            $req = array_filter($req, array($this, 'filterParams'));
            if(!(count($req) == 1)) {
                http_response_code(400);
                exit;
            }
            $this->request = array_pop($req);
        }

    }

        
    class RequestHandler{
        protected $uri;
        protected $command;
        protected $rmethod;
        protected $method;
        protected $params;

        public function __construct($uri, $command, $rmethod, $method, $params=[]){
            $this->method = $method;
            $this->uri = $uri;
            $this->rmethod = $rmethod;
            $this->command = $command;
            $this->params = $params;
        }

        public function getUri(){
            return $this->uri;
        }

        public function getRMethod(){
            return $this->rmethod;
        }

        public function getMethod(){
            return $this->method;
        }

        public function getCommand(){
            return $this->command;
        }

        public function getParams(){
            return $this->params;
        }

    }


?>