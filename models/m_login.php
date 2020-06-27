<?php
/**
 * Created by PhpStorm.
 * User: Ekky Ardian Fitran
 * Date: 03/04/2020
 * Time: 20:22
 */

class Login {
    private $mysqli;

    function __construct($conn) {
        $this->mysqli = $conn;
    }

    public function ambil_data($username, $password) {
        $db = $this->mysqli->conn;
        $sql = "SELECT * FROM tb_user WHERE username = '$username' AND password = '$password'";
        $query = $db->query($sql) or die ($db->error);
        return $query;
    }

    function __destruct() {
        $db = $this->mysqli->conn;
        $db->close();
    }
}
?>