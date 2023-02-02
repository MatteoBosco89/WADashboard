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

        public function persist($message){
            $res=false;
            if ($stmt = mysqli_prepare($this->connection, "INSERT INTO messages (message) VALUES (?) ON DUPLICATE KEY UPDATE message = VALUES(message)")) {
                mysqli_stmt_bind_param($stmt, "s", $message->getMessage());
                mysqli_stmt_execute($stmt);
                mysqli_stmt_affected_rows($stmt) > 0 ? $res = true : $res = false;
                mysqli_stmt_close($stmt);
            }
            return $res;
        }

        public function remove($id){
            $res=false;
            if ($stmt = mysqli_prepare($this->connection, "DELETE FROM messages WHERE id=?")) {
                mysqli_stmt_bind_param($stmt, "s", $id);
                mysqli_stmt_execute($stmt);
                mysqli_stmt_affected_rows($stmt) > 0 ? $res = true : $res = false;
                mysqli_stmt_close($stmt);
            }
            return $res;
        }

        public function update($contact){
            $res=false;
            if ($stmt = mysqli_prepare($this->connection, "UPDATE messages SET message=? WHERE id=?")) {
                mysqli_stmt_bind_param($stmt, "si", $contact->getMessage(), intval($contact->getId()));
                mysqli_stmt_execute($stmt);
                mysqli_stmt_affected_rows($stmt) > 0 ? $res = true : $res = false;
                mysqli_stmt_close($stmt);
            }
            return $res;
        }

        public function getMessage($id){
            if ($stmt = mysqli_prepare($link, "SELECT * FROM messages WHERE id=?")) {
                mysqli_stmt_bind_param($stmt, "i", intval($id));
                mysqli_stmt_execute($stmt);
                $result = mysqli_stmt_get_result($stmt);
                $data = array();
                $row = mysqli_fetch_assoc($result);
                if($row != NULL) return $row;
            }
            return false;
        }

        public function getAll(){
            if ($stmt = mysqli_prepare($link, "SELECT * FROM messages")) {
                mysqli_stmt_execute($stmt);
                $result = mysqli_stmt_get_result($stmt);
                $row = mysqli_fetch_assoc($result);
                $data = array();
                if($row != NULL){
                    array_push($data, $row);
                    while ($row = mysqli_fetch_assoc($result)) {
                        array_push($data, $row);
                    }
                    return $data;
                }
            }
            return false;
        }

    }

?>