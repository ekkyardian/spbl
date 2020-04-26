<?php
/**
 * Created by PhpStorm.
 * User: Ekky Ardian Fitran
 * Date: 17/04/2020
 * Time: 18:43
 */

class KtaPembobotan
{
    private $mysqli;

    function __construct($conn)
    {
        $this->mysqli = $conn;
    }

    // Start: Read Data -> tb_bobot
    public function tampil_bobot($alternatif, $kriteria)
    {
        $db = $this->mysqli->conn;
        $sql = "SELECT id_bobot, bobot FROM tb_bobot WHERE id_alternatif='$alternatif' AND id_kriteria='$kriteria'";
        $query = $db->query($sql) or die ($db->error);
        return $query;
    }
    // End: Read Data -> tb_bobot

    // Start: Edit Data -> tb_bobot
    public function edit_bobot($sql)
    {
        $db = $this->mysqli->conn;
        $db->query($sql) or die ($db->error);
    }
    // End: Edit Data -> tb_bobot
}