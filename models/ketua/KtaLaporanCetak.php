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


    // Start: Method Tampil (SELECT) -----------------------------------------------------------------------------------
    // tb_peristiwa --> id_peristiwa
    public function tampil_peristiwa($id)
    {
        $db = $this->mysqli->conn;
        $sql = "SELECT * FROM tb_peristiwa WHERE id_peristiwa='$id'";
        $query = $db->query($sql) or die ($db->error);
        return $query;
    }

    // tb_peristiwa JOIN tb_analisis_prioritas
    public function tampil_peristiwa_analsisis()
    {
        $db = $this->mysqli->conn;
        $sql = "SELECT * FROM tb_peristiwa INNER JOIN tb_analisis_prioritas USING (id_peristiwa)";
        $query = $db->query($sql) or die ($db->error);
        return $query;
    }

    // tb_peristiwa JOIN tb_observasi_lapangan
    public function tampil_peristiwa_observasi()
    {
        $db = $this->mysqli->conn;
        $sql = "SELECT * FROM tb_peristiwa INNER JOIN tb_observasi_lapangan USING (id_peristiwa) 
                ORDER BY tanggal_peristiwa DESC";
        $query = $db->query($sql) or die ($db->error);
        return $query;
    }

    // tb_analisis_prioritas --> id_peristiwa
    public function tampil_analisis_prioritas($id_peristiwa)
    {
        $db = $this->mysqli->conn;
        $sql = "SELECT * FROM tb_analisis_prioritas WHERE id_peristiwa='$id_peristiwa'";
        $query = $db->query($sql) or die ($db->error);
        return $query;
    }

    // tb_bobot --> id_alternatif dan id_kriteria
    public function tampil_bobot($alternatif, $kriteria)
    {
        $db = $this->mysqli->conn;
        $sql = "SELECT * FROM tb_bobot WHERE id_alternatif='$alternatif' AND id_kriteria='$kriteria'";
        $query = $db->query($sql) or die ($db->error);
        return $query;
    }

    // tb_observasi_lapangan --> id_peristiwa
    public function tampil_observasi_lapangan($id_peristiwa)
    {
        $db = $this->mysqli->conn;
        $sql = "SELECT * FROM tb_observasi_lapangan WHERE id_peristiwa='$id_peristiwa'";
        $query = $db->query($sql) or die ($db->error);
        return $query;
    }

    // tb_observasi_lapangan --> laporan_tahap1
    public function tampil_laporan_tahap1($laporan_tahap1)
    {
        $db = $this->mysqli->conn;
        $sql = "SELECT * FROM tb_observasi_lapangan WHERE laporan_tahap1='$laporan_tahap1'";
        $query = $db->query($sql) or die ($db->error);
        return $query;
    }

    // tb_observasi_lapangan --> laporan_tahap2
    public function tampil_laporan_tahap2($laporan_tahap2)
    {
        $db = $this->mysqli->conn;
        $sql = "SELECT * FROM tb_observasi_lapangan WHERE laporan_tahap2='$laporan_tahap2'";
        $query = $db->query($sql) or die ($db->error);
        return $query;
    }

    // tb_kebutuhan_logistik --> id_peristiwa
    public function tampil_kebutuhan_logistik($id_peristiwa) {
        $db = $this->mysqli->conn;
        $sql = "SELECT * FROM tb_kebutuhan_logistik WHERE id_peristiwa='$id_peristiwa'";
        $query = $db->query($sql) or die ($db->error);
        return $query;
    }
    // End: Method Tampil (SELECT) -------------------------------------------------------------------------------------



    // Start: Method Simpan (INSERT) -----------------------------------------------------------------------------------
    // tb_analisis_prioritas
    public function simpan_analisis_prioritas ($id_peristiwa, $paket_pangan, $paket_sandang, $paket_kematian,
                                               $paket_lainnya) {
        $db = $this->mysqli->conn;

        // Penomoran id_analisis Otomatis (Reset Berdasarkan Tahun)
        $tahun = date('Y');
        $sql_cekID = "SELECT MAX(id_analisis) AS maxID FROM tb_analisis_prioritas WHERE id_analisis LIKE '%$tahun'";
        $query_cekID = $db->query($sql_cekID);
        $data = $query_cekID->fetch(PDO::FETCH_NUM);
        $id_analisis = $data[0];

        $no_urut = (int) substr($id_analisis, 0, 3);
        $no_urut++;
        $char = "/ANS/".$tahun;

        $new_id = sprintf("%03s", $no_urut). $char;

        $sql_tambah = "INSERT INTO tb_analisis_prioritas VALUES 
                ('$new_id', '$id_peristiwa', '$paket_pangan', '$paket_sandang', '$paket_kematian', '$paket_lainnya')";
        $query_tambah = $db->query($sql_tambah) or die ($db->error);
    }

    // tb_kebutuhan_logistik
    public function simpan_kebutuhan_logistik ($id_peristiwa, $beras, $telur, $mie_instan, $air_minum, $pakaian_balita,
                                               $pakaian_anak_l, $pakaian_anak_p, $pakaian_remaja_l, $pakaian_remaja_p,
                                               $pakaian_dewasa_l, $pakaian_dewasa_p, $selimut, $sleeping_bag, $matras,
                                               $sabun_mandi, $sabun_cuci, $paket_kesehatan, $popok_bayi, $susu_bayi,
                                               $selimut_bayi, $pembalut, $kantong_mayat, $kain_kafan) {
        $db = $this->mysqli->conn;

        // Penomoran id_analisis Otomatis (Reset Berdasarkan Tahun)
        $tahun = date('Y');
        $sql_cekID = "SELECT MAX(id_kebutuhan) AS maxID FROM tb_kebutuhan_logistik WHERE id_kebutuhan LIKE '%$tahun'";
        $query_cekID = $db->query($sql_cekID) or die ($db->error);
        $data = $query_cekID->fetch(PDO::FETCH_NUM);
        $id_kebutuhan = $data[0];

        $no_urut = (int) substr($id_kebutuhan, 0, 3);
        $no_urut++;
        $char = "/KLG/".$tahun;

        $new_id = sprintf("%03s", $no_urut). $char;

        $sql = "INSERT INTO tb_kebutuhan_logistik VALUES ('$new_id','$id_peristiwa', '$beras', '$telur', '$mie_instan', 
                '$air_minum', '$pakaian_balita', '$pakaian_anak_l', '$pakaian_anak_p', '$pakaian_remaja_l', 
                '$pakaian_remaja_p', '$pakaian_dewasa_l', '$pakaian_dewasa_p', '$selimut', '$sleeping_bag', '$matras', 
                '$sabun_mandi', '$sabun_cuci', '$paket_kesehatan', '$popok_bayi', '$susu_bayi', '$selimut_bayi', 
                '$pembalut', '$kantong_mayat', '$kain_kafan')";
        $db->query($sql) or die ($db->error);
    }
    // End: Method Simpan (INSERT) -------------------------------------------------------------------------------------



    // Start: Method Update (UPDATE) -----------------------------------------------------------------------------------
    // tb_analisis_prioritas
    public function update_analisis_prioritas ($id_peristiwa, $paket_pangan, $paket_sandang, $paket_kematian,
                                               $paket_lainnya) {
        $db = $this->mysqli->conn;
        $sql = "UPDATE tb_analisis_prioritas SET paket_pangan='$paket_pangan', paket_sandang='$paket_sandang', 
                paket_kematian='$paket_kematian', paket_lainnya='$paket_lainnya' WHERE id_peristiwa='$id_peristiwa'";
        $db->query($sql) or die ($db->error);
    }

    // tb_kebutuhan_logistik
    public function update_kebutuhan_log ($id_peristiwa, $beras, $telur, $mie_instan, $air_minum, $pakaian_balita,
                                          $pakaian_anak_l, $pakaian_anak_p, $pakaian_remaja_l, $pakaian_remaja_p,
                                          $pakaian_dewasa_l, $pakaian_dewasa_p, $selimut, $sleeping_bag, $matras,
                                          $sabun_mandi, $sabun_cuci, $paket_kesehatan, $popok_bayi, $susu_bayi,
                                          $selimut_bayi, $pembalut, $kantong_mayat, $kain_kafan) {
        $db = $this->mysqli->conn;
        $sql = "UPDATE tb_kebutuhan_logistik SET beras='$beras', telur='$telur', mie_instan='$mie_instan', 
                air_minum='$air_minum', pakaian_balita='$pakaian_balita', pakaian_anak_l='$pakaian_anak_l',
                pakaian_anak_p='$pakaian_anak_p', pakaian_remaja_l='$pakaian_remaja_l', 
                pakaian_remaja_p='$pakaian_remaja_p', pakaian_dewasa_l='$pakaian_dewasa_l', 
                pakaian_dewasa_p='$pakaian_dewasa_p', selimut='$selimut', sleeping_bag='$sleeping_bag', 
                matras='$matras', sabun_mandi='$sabun_mandi', sabun_cuci='$sabun_cuci', 
                paket_kesehatan='$paket_kesehatan', popok_bayi='$popok_bayi', susu_bayi='$susu_bayi',
                selimut_bayi='$selimut_bayi', pembalut='$pembalut', kantong_mayat='$kantong_mayat',
                kain_kafan='$kain_kafan' WHERE id_peristiwa='$id_peristiwa'";

        $db->query($sql) or die ($db->error);
    }
    // End: Method Update (UPDATE) -------------------------------------------------------------------------------------
}