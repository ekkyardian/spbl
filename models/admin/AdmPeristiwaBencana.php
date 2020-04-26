<?php
/**
 * Created by PhpStorm.
 * User: Ekky Ardian Fitran
 * Date: 05/04/2020
 * Time: 19:04
 */

class AdmPeristiwaBencana
{
    private $mysqli;

    function __construct($conn)
    {
        $this->mysqli = $conn;
    }

    // Start: Read Data -> tb_peristiwa
    public function tampil($id = null)
    {
        $db = $this->mysqli->conn;
        $sql = "SELECT * FROM tb_peristiwa";
        if($id !== null) {
            $sql .=" WHERE id_peristiwa='$id'";
        }

        $sql .= " ORDER BY tanggal_peristiwa asc";

        $query = $db->query($sql) or die ($db->error);
        return $query;
    }
    // End: Read Data -> tb_peristiwa

    // Start: Create Data -> tb_peristiwa
    public function simpan($jenis_bencana, $nama_inisial, $cakupan_lokasi, $tanggal_peristiwa, $jam_peristiwa)
    {
        $db = $this->mysqli->conn;

        // Start: Penomoran ID Otomatis - Reset Berdasarkan Tahun
        $tahun = date('Y');
        $sql = "SELECT MAX(id_peristiwa) AS maxID FROM tb_peristiwa WHERE id_peristiwa LIKE '%$tahun'";
        $query = $db->query($sql);
        $data = mysqli_fetch_array($query);
        $id_peristiwa = $data['maxID'];

        $no_urut = (int) substr($id_peristiwa,0,3);
        $no_urut++;

        $char = "/PRS/".$tahun;
        $new_id = sprintf("%03s", $no_urut). $char;
        // End: Penomoran ID Otomatis - Reset Berdasarkan Tahun

        $db->query("INSERT INTO tb_peristiwa VALUES ('$new_id', '$jenis_bencana', '$nama_inisial', '$cakupan_lokasi', '$tanggal_peristiwa', '$jam_peristiwa')") or die ($db->error);
    }
    // End: Create Data -> tb_peristiwa

    // Start: Delete Data -> tb_peristiwa
    public function hapus($id)
    {
        $db = $this->mysqli->conn;
        $db->query("DELETE FROM tb_peristiwa WHERE id_peristiwa = '".$id."'") or die ($db->error);
    }
    // End: Delete Data -> tb_peristiwa

    // Start: Update Data -> tb_peristiwa
    public function update($sql)
    {
        $db = $this->mysqli->conn;
        $db->query($sql) or die ($db->error);
    }
    // End: Update Data -> tb_peristiwa
}