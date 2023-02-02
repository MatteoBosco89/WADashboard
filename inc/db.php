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

        public function connectDB(){

            $this->link = mysqli_connect($this->db_host, $this->db_user, $this->db_passwd, $this->db_name);
        
            if (mysqli_connect_errno()) {
                printf("Connection Failed: %s\n", mysqli_connect_error());
                exit();
            }
            if (!mysqli_set_charset($this->link, "utf8")) {
                printf("Error Occurred: %s\n", mysqli_error($this->link));
                exit();
            }

            $this->checkTables();

        }
        
        public function closeConnection(){
            return mysqli_close($this->link);
        }

        public function getLink(){
            return $this->link;
        }

        protected function checkTables(){
            mysqli_query($this->link, "CREATE TABLE IF NOT EXISTS contacts(id INT(10) NOT NULL AUTO_INCREMENT, name VARCHAR(255), surname VARCHAR(255), email NOT NULL VARCHAR(255), number NOT NULL VARCHAR(255), status BOOLEAN, pending INT(3), PRIMARY KEY(id), UNIQUE(email, number))");
            mysqli_query($this->link, "CREATE TABLE IF NOT EXISTS messages(id INT(10) NOT NULL AUTO_INCREMENT, message NOT NULL VARCHAR(255), PRIMARY KEY(id), UNIQUE(message))");
        }
        
    }

    


?>