<?php

class LoginClass {
    private $dbname = 'heroku_b9cceaaa29be20b';
    private $dbuser = 'b9f068b46a5a22';
    private $dbpass = '6a3c6343';
    private $dbhost = 'us-cdbr-iron-east-04.cleardb.net';
    private $conn;

    private function connect () {
        if (empty($this->conn)) {
            $this->conn = new mysqli($this->dbhost, $this->dbuser, $this->dbpass, $this->dbname);
            if ($this->conn->connect_errno) {
                die('Connection Failed');
            }
            return $this->conn;
        }
        else {
            return $this->conn;
        }
    }

    public function query ($query) {
        $result = $this->connect()->query($query);
        if ($result->num_rows) {
            return $result->fetch_assoc();
        }
        else {
            return 0;
        }
    }

    public function insert ($query) {
        $result = $this->connect()->query($query);
        if (mysqli_affected_rows($this->connect())) {
            echo "Inserted";
        }
        else {
            echo "Failed";
        }
    }
}