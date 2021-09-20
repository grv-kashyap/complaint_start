<?php

class Model {

    public $conn;

    public function __construct(){
        $this->conn = new mysqli("localhost","root","","complaint");
        if($this->conn->connect_errno){
            echo "Failed to connect to mysql :" .$this->conn->connect_error;
        }
        return $this->conn;
    }
}
?>