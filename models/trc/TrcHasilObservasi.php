<?php
/**
 * Created by PhpStorm.
 * User: Ekky Ardian Fitran
 * Date: 13/04/2020
 * Time: 19:17
 */

class TrcHasilObservasi
{
    private $mysqli;

    function __construct($conn)
    {
        $this->mysqli = $conn;
    }

    // Start: Read Data -> tb_peristiwa
    public function tampil_peristiwa($id = null)
    {
        $db = $this->mysqli->conn;
        $sql = "SELECT * FROM tb_peristiwa";
        if ($id != null) {
            $sql .= " WHERE id_peristiwa='$id'";
        }

        $sql .= " ORDER BY tanggal_peristiwa DESC";

        $query = $db->query($sql) or die ($db->error);
        return $query;
    }
    // End: Read Data -> tb_peristiwa

    // Start: Read Data -> tb_observasi_lapangan
    public function tampil_observasi($id = null)
    {
        $db = $this->mysqli->conn;
        $sql = "SELECT * FROM tb_observasi_lapangan INNER JOIN tb_peristiwa USING (id_peristiwa)";
        if ($id !== null) {
            $sql .= " WHERE id_peristiwa='$id'";
        }

        $sql .= " ORDER BY tanggal_peristiwa DESC";

        $query = $db->query($sql) or die ($db->error);
        return $query;
    }
    // End: Read Data -> tb_observasi_lapangan

    // Start: Read Data -> tb_user
    public function tampil_user_peristiwa($id_user = null)
    {
        $db = $this->mysqli->conn;
        $sql = "SELECT * FROM tb_user";
        if ($id_user != null) {
            $sql .= " WHERE id_user='$id_user'";
        }

        $query = $db->query($sql) or die ($db->error);
        return $query;
    }
    // End: Read Data -> tb_user

    // Start: Update Data -> tb_observasi_lapangan
    public function update_observasi(
        $id_peristiwa, $korban_terdampak, $korban_mengungsi, $korban_luka, $korban_meninggal,
        $korban_hilang, $pasca_bencana, $pengungsi_laki_laki, $pl_balita, $pl_anak_anak, $pl_remaja, $pl_dewasa,
        $pl_lansia, $pengungsi_perempuan, $pp_balita, $pp_anak_anak, $pp_remaja, $pp_dewasa, $pp_lansia)
    {
        $db = $this->mysqli->conn;
        $sql =
            "UPDATE tb_observasi_lapangan SET korban_terdampak='$korban_terdampak', korban_mengungsi='$korban_mengungsi',
            korban_luka='$korban_luka', korban_meninggal='$korban_meninggal', korban_hilang='$korban_hilang',
            pasca_bencana='$pasca_bencana', pengungsi_laki_laki='$pengungsi_laki_laki', pl_balita='$pl_balita',
            pl_anak_anak='$pl_anak_anak', pl_remaja='$pl_remaja', pl_dewasa='$pl_dewasa', pl_lansia='$pl_lansia',
            pengungsi_perempuan='$pengungsi_perempuan', pp_balita='$pp_balita', pp_anak_anak='$pp_anak_anak',
            pp_remaja='$pp_remaja', pp_dewasa='$pp_dewasa', pp_lansia='$pp_lansia' WHERE id_peristiwa='$id_peristiwa'";

       $db->query($sql) or die ($db->error);
    }
    // End: Update Data -> tb_observasi_lapangan
}