<?php
/**
 * Created by PhpStorm.
 * User: Ekky Ardian Fitran
 * Date: 18/04/2020
 * Time: 20:42
 */

class KtaLaporanAnalisis
{
    private $mysqli;

    function __construct($conn)
    {
        $this->mysqli = $conn;
    }

    // Start: Read Data -> tb_peristiwa
    public function tampil_peristiwa()
    {
        $db = $this->mysqli->conn;
        $sql = "SELECT * FROM tb_peristiwa ORDER BY tanggal_peristiwa asc";
        $query = $db->query($sql) or die ($db->error);
        return $query;
    }
    // End: Read Data -> tb_peristiwa
}