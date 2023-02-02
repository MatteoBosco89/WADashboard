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
        
        public function persist($contact){
            $res=false;
            if ($stmt = mysqli_prepare($this->connection, "INSERT INTO contacts (name, surname, email, number, status, pending) VALUES (?, ?, ?, ?, ?, ?) ON DUPLICATE KEY UPDATE name = VALUES(name), surname = VALUES(surname), status = VALUES(status), pending = VALUES(pending)")) {
                mysqli_stmt_bind_param($stmt, "ssssss", $contact->getName(), $contact->getSurname(), $contact->getEmail(), $contact->getNumber(), $contact->getStatus(), $contact->getPending());
                mysqli_stmt_execute($stmt);
                mysqli_stmt_affected_rows($stmt) > 0 ? $res = true : $res = false;
                mysqli_stmt_close($stmt);
            }
            return $res;
        }

        public function remove($id){
            $res=false;
            if ($stmt = mysqli_prepare($this->connection, "DELETE FROM contacts WHERE id=?")) {
                mysqli_stmt_bind_param($stmt, "s", $id);
                mysqli_stmt_execute($stmt);
                mysqli_stmt_affected_rows($stmt) > 0 ? $res = true : $res = false;
                mysqli_stmt_close($stmt);
            }
            return $res;
        }

        public function update($contact){
            $res=false;
            if ($stmt = mysqli_prepare($this->connection, "UPDATE contacts SET name=?, surname=?, email=?, number=?, status=?, pending=? WHERE id=?")) {
                mysqli_stmt_bind_param($stmt, "sssssii", $contact->getName(), $contact->getSurname(), $contact->getEmail(), $contact->getNumber(), $contact->getStatus(), intval($contact->getPending()), intval($contact->getId()));
                mysqli_stmt_execute($stmt);
                mysqli_stmt_affected_rows($stmt) > 0 ? $res = true : $res = false;
                mysqli_stmt_close($stmt);
            }
            return $res;
        }

        public function getContact($id){
            if ($stmt = mysqli_prepare($link, "SELECT * FROM contacts WHERE id=?")) {
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
            if ($stmt = mysqli_prepare($link, "SELECT * FROM contacts")) {
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
