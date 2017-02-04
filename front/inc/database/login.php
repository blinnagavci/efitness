<?php

session_start();

class Crud {

    private $conn;

    public function __construct($host, $user, $pass, $db) {
        $this->conn = mysqli_connect($host, $user, $pass, $db);

        if (mysqli_connect_errno()) {
            die("Connection error " . mysqli_connect_error());
        }
    }

    public function Login($table, $username, $password) {
        $password = sha1($password);
        $sql = "SELECT * FROM $table WHERE username='$username' AND password = '$password' AND status='0'";

        $query = mysqli_query($this->conn, $sql);

        if (mysqli_num_rows($query) == 1) {

            $rows = mysqli_fetch_assoc($query);
            $_SESSION['username'] = $rows['username'];
            $_SESSION['logged_in'] = TRUE;
            $_SESSION['admin_status'] = $rows['admin_status'];
            return true;
        } else {
            return false;
        }
    }

}

$obj = new Crud("localhost", "root", "", "efitness");
?>