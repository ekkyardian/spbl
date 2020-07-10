<?php
/**
 * Created by PhpStorm.
 * User: Ekky Ardian Fitran
 * Date: 20/05/2020
 * Time: 17:27
 */

class LiffLaporanObservasi
{
    private  $mysqli;

    function  __construct($conn)
    {
        $this->mysqli = $conn;
    }

    // Update Data -> tb_observasi_lapangan
    public function update_observasi1 ($id_peristiwa, $korban_terdampak, $korban_mengungsi, $korban_luka,
                                       $korban_meninggal, $korban_hilang, $pasca_bencana)
    {
        $db = $this->mysqli->conn;
        $sql = "UPDATE tb_observasi_lapangan SET korban_terdampak='$korban_terdampak', korban_mengungsi='$korban_mengungsi',
            korban_luka='$korban_luka', korban_meninggal='$korban_meninggal', korban_hilang='$korban_hilang',
            pasca_bencana='$pasca_bencana' WHERE id_peristiwa='$id_peristiwa'";

        $db->query($sql) or die ($db->error);
    }

    // Tampil Data -> tb_observasi_lapangan
    public function tampil_observasi1 ($id_peristiwa)
    {
        $db = $this->mysqli->conn;
        $sql = "SELECT * FROM tb_observasi_lapangan WHERE id_peristiwa='$id_peristiwa'";
        $query = $db->query($sql) or die ($db->error);
        return $query;
    }

    // Tampil Data -> tb_observasi_lapangan
    public function tampil_observasi2 ($id_peristiwa)
    {
        $db = $this->mysqli->conn;
        $sql = "SELECT * FROM tb_observasi_lapangan WHERE id_peristiwa='$id_peristiwa'";
        $query = $db->query($sql) or die ($db->error);
        return $query;
    }

    // Tampil Data -> tb_peristiwa
    public function cek_user ($id_line)
    {
        $db = $this->mysqli->conn;
        $sql = "SELECT * FROM tb_user WHERE id_line = '$id_line'";
        $query = $db->query($sql) or die ($db->error);
        return $query;
    }

    // Tampil Data -> tb_peristiwa
    public function  cek_peristiwa ($id_user)
    {
        $db = $this->mysqli->conn;
        $sql = "SELECT * FROM tb_peristiwa WHERE id_user = '$id_user' AND status = 'Open'";
        $query = $db->query($sql) or die ($db->error);
        return $query;
    }
}