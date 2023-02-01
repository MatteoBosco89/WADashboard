<?php


    class Connection{

        protected $db_host;
        protected $db_user;
        protected $db_passwd;
        protected $db_name;
        protected $link;

        function __construct($db_host, $db_user, $db_passwd, $db_name) {
            $this->db_host = $db_host; 
            $this->db_user = $db_user;
            $this->db_passwd = $db_passwd;
            $this->db_name = $db_name;
            $this->connectDB();
        }

        function connectDB(){

            $this->link = mysqli_connect($this->db_host, $this->db_user, $this->db_passwd, $this->db_name);
        
            if (mysqli_connect_errno()) {
                printf("Connection Failed: %s\n", mysqli_connect_error());
                exit();
            }
            if (!mysqli_set_charset($this->link, "utf8")) {
                printf("Error Occurred: %s\n", mysqli_error($this->link));
                exit();
            }
        }
        
        function closeConnection(){
            return mysqli_close($this->link);
        }

        function getLink(){
            return $this->link;
        }
        
    }

    


?>