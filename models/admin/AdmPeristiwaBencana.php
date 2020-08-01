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
        if($id != null) {
            $sql .=" WHERE id_peristiwa='$id'";
        }

        $sql .= " ORDER BY tanggal_peristiwa asc";

        $query = $db->query($sql) or die ($db->error);
        return $query;
    }
    // End: Read Data -> tb_peristiwa

    public function tampil_polos()
    {
        $db = $this->mysqli->conn;
        $sql = "SELECT * FROM tb_peristiwa ORDER BY tanggal_peristiwa DESC";
        $query = $db->query($sql) or die ($db->error);

        return $query;
    }

    // Start: Read Data -> tb_user
    public function tampil_user($id_user = null)
    {
        $db = $this->mysqli->conn;
        $sql = "SELECT * FROM tb_user WHERE hak_akses='trc'";

        if ($id_user != null) {
            $sql .=" AND id_user='$id_user'";
        }

        $query = $db->query($sql) or die ($db->error);
        return $query;
    }
    // End: Read Data -> tb_user

    // Start: Create Data -> tb_peristiwa
    public function simpan($jenis_bencana, $nama_inisial, $cakupan_lokasi, $tanggal_peristiwa, $jam_peristiwa, $id_user, $status)
    {
        $db = $this->mysqli->conn;

        // Start: Penomoran ID Otomatis - Reset Berdasarkan Tahun
        $tahun = date('Y');
        $sql = "SELECT MAX(id_peristiwa) AS maxID FROM tb_peristiwa WHERE id_peristiwa LIKE '%$tahun'";
        $query = $db->query($sql);
        $data = $query->fetch(PDO::FETCH_NUM);
        $id_peristiwa = $data[0];

        $no_urut = (int) substr($id_peristiwa,0,3);
        $no_urut++;

        $char = "/PRS/".$tahun;
        $new_id = sprintf("%03s", $no_urut). $char;
        // End: Penomoran ID Otomatis - Reset Berdasarkan Tahun

        $db->query("INSERT INTO tb_peristiwa VALUES ('$new_id', '$id_user', '$jenis_bencana', '$nama_inisial', '$cakupan_lokasi', '$tanggal_peristiwa', '$jam_peristiwa', '$status')") or die ($db->error);
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