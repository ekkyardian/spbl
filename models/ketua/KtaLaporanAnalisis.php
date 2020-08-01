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
}