<?php
/**
 * Created by PhpStorm.
 * User: Ekky Ardian Fitran
 * Date: 03/05/2020
 * Time: 14:17
 */

class KtaLaporanCetak
{
    private $mysqli;

    function __construct($conn)
    {
        $this->mysqli = $conn;
    }

    // Start: Read Data -> tb_peristiwa
    public function tampil_peristiwa($id)
    {
        $db=$this->mysqli->conn;
        $sql = "SELECT * FROM tb_peristiwa WHERE id_peristiwa='$id'";
        $query = $db->query($sql) or die ($db->error);
        return $query;
    }
    // End: Read Data -> tb_peristiwa
}