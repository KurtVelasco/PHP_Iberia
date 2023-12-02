<?php

use FTP\Connection;

    $db_server = "localhost";
    $db_user = "root";
    $db_pass = "";
    $db_name = "iberia_database";
    $conn ="";
    $error = "";
    $status = true;

    try{
        $conn = mysqli_connect($db_server,
        $db_user,
        $db_pass,
        $db_name);
    }
    catch(mysqli_sql_exception){
        $error = "Cannot Connect sadge";
        $status = false;
    }  
    class ConnectionStatus {
        public $connected;

        // __construct is similar to a constructor instead of class name
        public function __construct(bool $var) {
            $this->connected = $var;
        }
    
        public function getMessage() {
            if ($this->connected) {
                return "You are connected";
            } else {
                return "Connection failed";
            }
        }
    }
    $connectionStatus = new ConnectionStatus($status);
    $message = $connectionStatus->getMessage();
?>
