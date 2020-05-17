<?php
/**
 * Created by PhpStorm.
 * User: Ekky Ardian Fitran
 * Date: 16/05/2020
 * Time: 15:45
 */

class AdmProfile
{
    private $mysqli;

    function __construct($conn)
    {
        $this->mysqli = $conn;
    }

    // SELECT tabel user
    public function tampil_user($id_user)
    {
        $db     = $this->mysqli->conn;
        $sql    = "SELECT * FROM tb_user WHERE id_user='$id_user'";
        $query  = $db->query($sql) or die ($db->error);

        return $query;
    }
}