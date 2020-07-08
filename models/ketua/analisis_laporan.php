<?php
/**
 * Created by PhpStorm.
 * User: Ekky Ardian Fitran
 * Date: 03/05/2020
 * Time: 21:52
 */

session_start();

// Start: Pemanggilan dan Pendeklarasian Class -------------------------------------------------------------------------
require_once ("../../config/+koneksi.php");
require_once ("../database.php");
require_once ("KtaLaporanCetak.php");
include "../m_login.php";

$connection     = new Database($host, $user, $pass, $database);
$login          = new Login($connection);
$analisis       = new KtaLaporanCetak($connection);

$id_peristiwa       = $_POST['id_peristiwa'];
$id_laporan_tahap1  = $_POST['laporan_tahap1'];
$id_laporan_tahap2  = $_POST['laporan_tahap2'];
$tujuan             = $_POST['tujuan'];

if ($tujuan == "cetak") {
    $lokasi = "kta_laporan_cetak.php";
}
elseif ($tujuan == "pdf") {
    $lokasi = "kta_laporan_pdf.php";
}
else {
    $lokasi = "";
}

// Pengambilan dan pengecekan data pada tabel: tb_observasi_lapangan
$observasi_lapangan         = $analisis->tampil_observasi_lapangan($id_peristiwa);
$cek_observasi_lapangan     = $observasi_lapangan->rowCount(); // <<-------------------------------------Tidak Digunakan
$ambil_observasi            = $analisis->tampil_observasi_lapangan($id_peristiwa)->fetchObject();

// Pengambilan dan pengecekan data pada tabel: tb_analisis_prioritas
$analisis_prioritas         = $analisis->tampil_analisis_prioritas($id_peristiwa);
$cek_analisis_prioritas     = $analisis_prioritas->rowCount(); // <<-------------------------------------Tidak Digunakan
$ambil_analisis_prioritas   = $analisis->tampil_analisis_prioritas($id_peristiwa)->fetchObject();

// Pengambilan Nilai Laporan Tahap 1: laporan_tahap1 --> tb_observasi_lapangan
$laporan_tahap1             = $analisis->tampil_laporan_tahap1($id_laporan_tahap1);
$cek_laporan_tahap1         = $laporan_tahap1->rowCount();

// Pengambilan Nilai Laporan Tahap 2: laporan_tahap2 --> tb_observasi_lapangan
$laporan_tahap2             = $analisis->tampil_laporan_tahap2($id_laporan_tahap2);
$cek_laporan_tahap2         = $laporan_tahap2->rowCount();

// Pengecekan dan Pengecekan Data pada Tabel: tb_kebutuhan_logistik
$kebutuhan_logistik         = $analisis->tampil_kebutuhan_logistik($id_peristiwa);
$cek_kebutuhan_logistik     = $kebutuhan_logistik->rowCount(); // <<-------------------------------------Tidak Digunakan
$ambil_kebutuhan_logistik   = $analisis->tampil_kebutuhan_logistik($id_peristiwa);
// End: Pemanggilan dan Pendeklarasian Class ---------------------------------------------------------------------------



// Start: Analisis Logistik Prioritas Menggunakan Metode SMART ---------------------------------------------------------
//--- Tahap 1: Menentukan Kriteria dan Pembobotan ---//
$master_korban_terdampak    = $ambil_observasi->korban_terdampak;
$master_korban_mengungsi    = $ambil_observasi->korban_mengungsi;
$master_korban_luka         = $ambil_observasi->korban_luka;
$master_korban_hilang       = $ambil_observasi->korban_hilang;
$master_korban_meninggal    = $ambil_observasi->korban_meninggal;
$master_pasca_bencana       = $ambil_observasi->pasca_bencana;

// Menentukan kelas nilai: Korban Terdampak
if ($master_korban_terdampak > 0 AND $master_korban_terdampak <= 20) {
    $kelas_korban_terdampak = 25;
}
elseif ($master_korban_terdampak > 20 AND $master_korban_terdampak <= 30) {
    $kelas_korban_terdampak = 50;
}
elseif ($master_korban_terdampak > 30 AND $master_korban_terdampak <= 50) {
    $kelas_korban_terdampak = 75;
}
elseif ($master_korban_terdampak > 50) {
    $kelas_korban_terdampak = 100;
}
else {
    $kelas_korban_terdampak = 0;
}

// Menentukan kelas nilai: Korban Mengungsi
if ($master_korban_mengungsi > 0 AND $master_korban_mengungsi <= 10) {
    $kelas_korban_mengungsi = 25;
}
elseif ($master_korban_mengungsi > 10 AND $master_korban_mengungsi <= 20) {
    $kelas_korban_mengungsi = 50;
}
elseif ($master_korban_mengungsi > 20 AND $master_korban_mengungsi <= 30) {
    $kelas_korban_mengungsi = 75;
}
elseif ($master_korban_mengungsi > 30) {
    $kelas_korban_mengungsi = 100;
}
else {
    $kelas_korban_mengungsi = 0;
}

// Menentukan kelas nilai: Korban Luka
if ($master_korban_luka > 0 AND $master_korban_luka <= 5) {
    $kelas_korban_luka = 25;
}
elseif ($master_korban_luka > 5 AND $master_korban_luka <= 10) {
    $kelas_korban_luka = 50;
}
elseif ($master_korban_luka > 10 AND $master_korban_luka <= 15) {
    $kelas_korban_luka = 75;
}
elseif ($master_korban_luka > 15) {
    $kelas_korban_luka = 100;
}
else {
    $kelas_korban_luka = 0;
}

// Menentukan kelas nilai: Korban Meninggal dan Hilang
$master_korban_meninggal_hilang = $master_korban_meninggal + $master_korban_hilang;
if ($master_korban_meninggal_hilang > 0 AND $master_korban_meninggal_hilang <= 2) {
    $kelas_korban_meninggal_hilang = 25;
}
elseif ($master_korban_meninggal_hilang > 2 AND $master_korban_meninggal_hilang <= 5) {
    $kelas_korban_meninggal_hilang = 50;
}
elseif ($master_korban_meninggal_hilang > 6 AND $master_korban_meninggal_hilang <= 10) {
    $kelas_korban_meninggal_hilang = 75;
}
elseif ($master_korban_meninggal_hilang > 10) {
    $kelas_korban_meninggal_hilang = 100;
}
else {
    $kelas_korban_meninggal_hilang = 0;
}

// Menentukan kelas nilai: Kondisi Pasca Bencana
if ($master_pasca_bencana == "Normal") {
    $kelas_pasca_bencana = 0;
}
elseif ($master_pasca_bencana == "Waspada") {
    $kelas_pasca_bencana = 30;
}
elseif ($master_pasca_bencana == "Siaga") {
    $kelas_pasca_bencana = 70;
}
elseif ($master_pasca_bencana == "Awas") {
    $kelas_pasca_bencana = 100;
}
else {
    $kelas_pasca_bencana = 0;
}

//--- Mengambil nilai bobot untuk setiap "Kriteria ke-i" pada setiap "Alternatif ke-i" ---//
// Kode Alternatif
$alternatif_1 = "ALT-001"; // Pangan
$alternatif_2 = "ALT-002"; // Sandang
$alternatif_3 = "ALT-003"; // Kematian
$alternatif_4 = "ALT-004"; // Lainnya

// Kode Kriteria
$kriteria_1 = "KRT-001"; // Jml. Korban Terdampak
$kriteria_2 = "KRT-002"; // Jml. Korban Mengungsi
$kriteria_3 = "KRT-003"; // Jml. Korban Luka
$kriteria_4 = "KRT-004"; // Jml. Korban Meninggal & Hilang
$kriteria_5 = "KRT-005"; // Kondisi Pasca Bencana

// Ambil Nilai Bobot Kriteria ke-i Alternatif ke-i
$bobot_11 = $analisis->tampil_bobot($alternatif_1, $kriteria_1)->fetchObject();
$bobot_12 = $analisis->tampil_bobot($alternatif_1, $kriteria_2)->fetchObject();
$bobot_13 = $analisis->tampil_bobot($alternatif_1, $kriteria_3)->fetchObject();
$bobot_14 = $analisis->tampil_bobot($alternatif_1, $kriteria_4)->fetchObject();
$bobot_15 = $analisis->tampil_bobot($alternatif_1, $kriteria_5)->fetchObject();
$bobot_21 = $analisis->tampil_bobot($alternatif_2, $kriteria_1)->fetchObject();
$bobot_22 = $analisis->tampil_bobot($alternatif_2, $kriteria_2)->fetchObject();
$bobot_23 = $analisis->tampil_bobot($alternatif_2, $kriteria_3)->fetchObject();
$bobot_24 = $analisis->tampil_bobot($alternatif_2, $kriteria_4)->fetchObject();
$bobot_25 = $analisis->tampil_bobot($alternatif_2, $kriteria_5)->fetchObject();
$bobot_31 = $analisis->tampil_bobot($alternatif_3, $kriteria_1)->fetchObject();
$bobot_32 = $analisis->tampil_bobot($alternatif_3, $kriteria_2)->fetchObject();
$bobot_33 = $analisis->tampil_bobot($alternatif_3, $kriteria_3)->fetchObject();
$bobot_34 = $analisis->tampil_bobot($alternatif_3, $kriteria_4)->fetchObject();
$bobot_35 = $analisis->tampil_bobot($alternatif_3, $kriteria_5)->fetchObject();
$bobot_41 = $analisis->tampil_bobot($alternatif_4, $kriteria_1)->fetchObject();
$bobot_42 = $analisis->tampil_bobot($alternatif_4, $kriteria_2)->fetchObject();
$bobot_43 = $analisis->tampil_bobot($alternatif_4, $kriteria_3)->fetchObject();
$bobot_44 = $analisis->tampil_bobot($alternatif_4, $kriteria_4)->fetchObject();
$bobot_45 = $analisis->tampil_bobot($alternatif_4, $kriteria_5)->fetchObject();

//--- Tahap 2: Normalisasi Bobot Kriteria ---//
// Paket Pangan
$normalisasi_11 = $bobot_11->bobot / 100;
$normalisasi_12 = $bobot_12->bobot / 100;
$normalisasi_13 = $bobot_13->bobot / 100;
$normalisasi_14 = $bobot_14->bobot / 100;
$normalisasi_15 = $bobot_15->bobot / 100;

// Paket Sandang
$normalisasi_21 = $bobot_21->bobot / 100;
$normalisasi_22 = $bobot_22->bobot / 100;
$normalisasi_23 = $bobot_23->bobot / 100;
$normalisasi_24 = $bobot_24->bobot / 100;
$normalisasi_25 = $bobot_25->bobot / 100;

// Paket Kematian
$normalisasi_31 = $bobot_31->bobot / 100;
$normalisasi_32 = $bobot_32->bobot / 100;
$normalisasi_33 = $bobot_33->bobot / 100;
$normalisasi_34 = $bobot_34->bobot / 100;
$normalisasi_35 = $bobot_35->bobot / 100;

// Paket Lainnya
$normalisasi_41 = $bobot_41->bobot / 100;
$normalisasi_42 = $bobot_42->bobot / 100;
$normalisasi_43 = $bobot_43->bobot / 100;
$normalisasi_44 = $bobot_44->bobot / 100;
$normalisasi_45 = $bobot_45->bobot / 100;

//--- Tahap 3: Menentukan Kelas Nilai Kriteria ---//
// (Proses sudah dilakukan pada Tahap 1)

//--- Tahap 4: Menghitung Nilai Utility Kriteria Setiap Alternatif ---//
// Paket Pangan
$utility_11 = $normalisasi_11 * $kelas_korban_terdampak;
$utility_12 = $normalisasi_12 * $kelas_korban_mengungsi;
$utility_13 = $normalisasi_13 * $kelas_korban_luka;
$utility_14 = $normalisasi_14 * $kelas_korban_meninggal_hilang;
$utility_15 = $normalisasi_15 * $kelas_pasca_bencana;

// Paket Sandang
$utility_21 = $normalisasi_21 * $kelas_korban_terdampak;
$utility_22 = $normalisasi_22 * $kelas_korban_mengungsi;
$utility_23 = $normalisasi_23 * $kelas_korban_luka;
$utility_24 = $normalisasi_24 * $kelas_korban_meninggal_hilang;
$utility_25 = $normalisasi_25 * $kelas_pasca_bencana;

// Paket Kematian
$utility_31 = $normalisasi_31 * $kelas_korban_terdampak;
$utility_32 = $normalisasi_32 * $kelas_korban_mengungsi;
$utility_33 = $normalisasi_33 * $kelas_korban_luka;
$utility_34 = $normalisasi_34 * $kelas_korban_meninggal_hilang;
$utility_35 = $normalisasi_35 * $kelas_pasca_bencana;

// Paket Lainnya
$utility_41 = $normalisasi_41 * $kelas_korban_terdampak;
$utility_42 = $normalisasi_42 * $kelas_korban_mengungsi;
$utility_43 = $normalisasi_43 * $kelas_korban_luka;
$utility_44 = $normalisasi_44 * $kelas_korban_meninggal_hilang;
$utility_45 = $normalisasi_45 * $kelas_pasca_bencana;

//--- Tahap 5: Menghitung Nilai Akhir dan Perankingan ---//
// Menghitung Nilai Akhir
$nilai_paket_pangan     = $utility_11 + $utility_12 + $utility_13 + $utility_14 + $utility_15;
$nilai_paket_sandang    = $utility_21 + $utility_22 + $utility_23 + $utility_24 + $utility_25;
$nilai_paket_kematian   = $utility_31 + $utility_32 + $utility_33 + $utility_34 + $utility_35;
$nilai_paket_lainnya    = $utility_41 + $utility_42 + $utility_43 + $utility_44 + $utility_45;

// Perankingan / Mencari Nilai Tertinggi
if ($nilai_paket_pangan > $nilai_paket_sandang AND $nilai_paket_pangan > $nilai_paket_kematian AND
    $nilai_paket_pangan > $nilai_paket_lainnya) {
    $paket_prioritas = "Paket Pangan";
}
elseif ($nilai_paket_sandang > $nilai_paket_pangan AND $nilai_paket_sandang > $nilai_paket_kematian AND
    $nilai_paket_sandang > $nilai_paket_lainnya) {
    $paket_prioritas = "Paket Sandang";
}
elseif ($nilai_paket_kematian > $nilai_paket_pangan AND $nilai_paket_kematian > $nilai_paket_sandang AND
    $nilai_paket_kematian > $nilai_paket_lainnya) {
    $paket_prioritas = "Paket Kematian";
}
elseif ($nilai_paket_lainnya > $nilai_paket_pangan AND $nilai_paket_lainnya > $nilai_paket_sandang AND
    $nilai_paket_lainnya > $nilai_paket_kematian) {
    $paket_prioritas = "Paket Lainnya";
}
else {
    $paket_prioritas = "Tidak Ditemukan";
}
// End: Analisis Logistik Prioritas Menggunakan Metode SMART -----------------------------------------------------------



// Start: Analisis Kebutuhan Bantuan Logistik dalam Bentuk Paket -------------------------------------------------------
// Deklarasi Variabel yang Dibutuhkan untuk Perhitungan
$jml_kepala_keluarga            = $ambil_observasi->pl_dewasa; // Untuk Paket Sandang dan Pangan
$jml_korban_meninggal_hilang    = $master_korban_hilang + $master_korban_meninggal; // Untuk Paket Kematian
$jml_korban_luka                = $ambil_observasi->korban_luka; // Untuk Paket Lainnya

// Hasil Perhitungan: Jumlah Kebutuhan Bantuan logistik dalam Bentuk Paket
$kebutuhan_paket_pangan         = $jml_kepala_keluarga;
$kebutuhan_paket_sandang        = $jml_kepala_keluarga;
$kebutuhan_paket_kematian       = $jml_korban_meninggal_hilang;
$kebutuhan_paket_lainnya        = ceil($jml_korban_luka / 10);
// End: Analisis Kebutuhan Bantuan Logistik dalam Bentuk Paket ---------------------------------------------------------



// Start: Analisis Kebutuhan Bantuan Logistik dalam Bentuk Satuan ------------------------------------------------------
// Deklarasi Variabel yang Dibutuhkan untuk Perhitungan
$jml_pl             = $ambil_observasi->pengungsi_laki_laki;
$jml_pl_balita      = $ambil_observasi->pl_balita;
$jml_pl_anak_anak   = $ambil_observasi->pl_anak_anak;
$jml_pl_remaja      = $ambil_observasi->pl_remaja;
$jml_pl_dewasa      = $ambil_observasi->pl_dewasa;
$jml_pl_lansia      = $ambil_observasi->pl_lansia;

$jml_pp             = $ambil_observasi->pengungsi_perempuan;
$jml_pp_balita      = $ambil_observasi->pp_balita;
$jml_pp_anak_anak   = $ambil_observasi->pp_anak_anak;
$jml_pp_remaja      = $ambil_observasi->pp_remaja;
$jml_pp_dewasa      = $ambil_observasi->pp_dewasa;
$jml_pp_lansia      = $ambil_observasi->pp_lansia;

// Proses Perhitungan: Kebutuhan Bantuan Logistik dalam Bentuk Satuan
$beras              = 0.4 * (($jml_pl + $jml_pp) - ($jml_pl_balita + $jml_pp_balita)); // liter/hari
$telur              = 3 * (($jml_pl + $jml_pp) - ($jml_pl_balita + $jml_pp_balita)); // butir/hari
$mie_instan         = 3 * (($jml_pl + $jml_pp) - ($jml_pl_balita + $jml_pp_balita)); // pcs/hari
$air_mineral        = 4 * (($jml_pl + $jml_pp) - ($jml_pl_balita + $jml_pp_balita)); // liter/hari

$pakaian_balita     = 1 * ($jml_pl_balita + $jml_pp_balita); // setel/hari
$pakaian_anak_l     = 1 * $jml_pl_anak_anak; // setel/hari
$pakaian_anak_p     = 1 * $jml_pp_anak_anak; // setel/hari
$pakaian_remaja_l   = 1 * $jml_pl_remaja; // setel/hari
$pakaian_remaja_p   = 1 * $jml_pp_remaja; // setel/hari
$pakaian_dewasa_l   = 1 * ($jml_pl_dewasa + $jml_pl_lansia); // setel/hari
$pakaian_dewasa_p   = 1 * ($jml_pp_dewasa + $jml_pp_lansia); // setel/hari

$selimut            = 1 * (($jml_pl + $jml_pp) - ($jml_pl_balita + $jml_pp_balita)); // buah
$sleeping_bag       = 1 * ($jml_pl_lansia + $jml_pp_lansia); // buah
$matras             = 1 * ($jml_pl + $jml_pp); // buah
$sabun_mandi        = 3 * ($jml_pl + $jml_pp); // batang/bulan
$sabun_cuci         = 1 * ($jml_pl + $jml_pp); // bungkus/bulan
$paket_kesehatan    = ceil($jml_korban_luka / 10); // paket/10 korban

$popok_bayi         = 12 * ($jml_pl_balita + $jml_pp_balita); // pcs/hari
$susu_bayi          = 990 * ($jml_pl_balita + $jml_pp_balita); // gram/hari
$selimut_bayi       = 1 * ($jml_pl_balita + $jml_pp_balita); // buah
$pembalut           = (4 * $jml_pp_remaja) * 0.5; // pcs/hari
$kantong_mayat      = 1 * $jml_korban_meninggal_hilang; // buah/korban meninggal atau hilang
$kain_kapan         = 1 * $jml_korban_meninggal_hilang; // buah/korban meninggal atau hilang
// End: Analisis Kebutuhan Bantuan Logistik dalam Bentuk Satuan --------------------------------------------------------



// Start: Flowchart/Alur Kerja Sistem dalam Menyusun Laporan -----------------------------------------------------------

// Menentukan peristiwa yang menjadi objek perhitungan
$_SESSION['id_peristiwa'] = $id_peristiwa;

// (((--- LAPORAN TAHAP 1 ---)))
// Cek ketersediaan data dan validitas Laporan Tahap #1 (laporan_tahap1 --> tb_observasi_lapangan):
// Jika variabel perhitungan laporan Tahap #1 TIDAK TERSEDIA (laporan_tahap1 --> tb_observasi_lapangan)
if ($id_laporan_tahap1 == 0) {

    // Tampilkan pesan bahwa variabel perhitungan untuk Laporan Tahap #1 TIDAK TERSEDIA/NULL
    $_SESSION['paket_prioritas']    = "(null)";
    $_SESSION['paket_pangan']       = "(null)";
    $_SESSION['paket_sandang']      = "(null)";
    $_SESSION['paket_kematian']     = "(null)";
    $_SESSION['paket_lainnya']      = "(null)";

    $_SESSION['korban_terdampak']   = "(null)";
    $_SESSION['korban_mengungsi']   = "(null)";
    $_SESSION['korban_luka']        = "(null)";
    $_SESSION['korban_meninggal']   = "(null)";
    $_SESSION['korban_hilang']      = "(null)";
    $_SESSION['pasca_bencana']      = "(null)";
}

// Jika variabel perhitungan laporan Tahap #1 TERSEDIA & BELUM PERNAH dilakukan perhitungan sebelumnya
// (laporan_tahap1 --> tb_observasi_lapangan)
elseif ($id_laporan_tahap1 == 1) {

    // Lakukan perhitungan untuk Laporan Tahap #1 dan Lakukan INSERT (tb_analisis_prioritas)
    $analisis->simpan_analisis_prioritas($id_peristiwa, $nilai_paket_pangan,
        $nilai_paket_sandang, $nilai_paket_kematian, $nilai_paket_lainnya);

    $_SESSION['paket_prioritas']    = $paket_prioritas;
    $_SESSION['paket_pangan']       = $nilai_paket_pangan;
    $_SESSION['paket_sandang']      = $nilai_paket_sandang;
    $_SESSION['paket_kematian']     = $nilai_paket_kematian;
    $_SESSION['paket_lainnya']      = $nilai_paket_lainnya;

    $_SESSION['korban_terdampak']   = $ambil_observasi->korban_terdampak;
    $_SESSION['korban_mengungsi']   = $ambil_observasi->korban_mengungsi;
    $_SESSION['korban_luka']        = $ambil_observasi->korban_luka;
    $_SESSION['korban_meninggal']   = $ambil_observasi->korban_meninggal;
    $_SESSION['korban_hilang']      = $ambil_observasi->korban_hilang;
    $_SESSION['pasca_bencana']      = $ambil_observasi->pasca_bencana;
}

// Jika variabel perhitungan laporan Tahap #1 TERSEDIA & SUDAH PERNAH dilakukan perhitungan sebelumnya, akan tetapi
// data yang digunakan pada perhitungan sebelumnya mengalami perubahan data (laporan_tahap1 --> tb_observasi_lapangan)
elseif ($id_laporan_tahap1 == 2) {

    // Lakukan perhitungan untuk Laporan Tahap #1 dan Lakukan UPDATE (tb_analisis_prioritas)
    $analisis->update_analisis_prioritas($id_peristiwa, $nilai_paket_pangan, $nilai_paket_sandang,
        $nilai_paket_kematian, $nilai_paket_lainnya);

    $_SESSION['paket_prioritas']    = $paket_prioritas;
    $_SESSION['paket_pangan']       = $nilai_paket_pangan;
    $_SESSION['paket_sandang']      = $nilai_paket_sandang;
    $_SESSION['paket_kematian']     = $nilai_paket_kematian;
    $_SESSION['paket_lainnya']      = $nilai_paket_lainnya;

    $_SESSION['korban_terdampak']   = $ambil_observasi->korban_terdampak;
    $_SESSION['korban_mengungsi']   = $ambil_observasi->korban_mengungsi;
    $_SESSION['korban_luka']        = $ambil_observasi->korban_luka;
    $_SESSION['korban_meninggal']   = $ambil_observasi->korban_meninggal;
    $_SESSION['korban_hilang']      = $ambil_observasi->korban_hilang;
    $_SESSION['pasca_bencana']      = $ambil_observasi->pasca_bencana;
}

// Jika hasil perhitungan Laporan Tahap #1 tersedia dan data tersebut valid (laporan_tahap1 --> tb_observasi_lapangan)
elseif ($id_laporan_tahap1 == 3) {

    // Ambil data perhitungan dari database (tb_analisis_prioritas)
    $_SESSION['paket_prioritas']    = $paket_prioritas;
    $_SESSION['paket_pangan']       = $ambil_analisis_prioritas->nilai_paket_pangan;
    $_SESSION['paket_sandang']      = $ambil_analisis_prioritas->nilai_paket_sandang;
    $_SESSION['paket_kematian']     = $ambil_analisis_prioritas->nilai_paket_kematian;
    $_SESSION['paket_lainnya']      = $ambil_analisis_prioritas->nilai_paket_lainnya;

    $_SESSION['korban_terdampak']   = $ambil_observasi->korban_terdampak;
    $_SESSION['korban_mengungsi']   = $ambil_observasi->korban_mengungsi;
    $_SESSION['korban_luka']        = $ambil_observasi->korban_luka;
    $_SESSION['korban_meninggal']   = $ambil_observasi->korban_meninggal;
    $_SESSION['korban_hilang']      = $ambil_observasi->korban_hilang;
    $_SESSION['pasca_bencana']      = $ambil_observasi->pasca_bencana;
}

// Jika dihadapkan pada kondisi selain kondisi yang sudah disebutkan di atas (just in case)
else {

    // Tampilkan pesan error pada setiap variabel perhitungan
    $_SESSION['paket_prioritas']    = "(error)";
    $_SESSION['paket_pangan']       = "(error)";
    $_SESSION['paket_sandang']      = "(error)";
    $_SESSION['paket_kematian']     = "(error)";
    $_SESSION['paket_lainnya']      = "(error)";

    $_SESSION['korban_terdampak']   = "(error)";
    $_SESSION['korban_mengungsi']   = "(error)";
    $_SESSION['korban_luka']        = "(error)";
    $_SESSION['korban_meninggal']   = "(error)";
    $_SESSION['korban_hilang']      = "(error)";
    $_SESSION['pasca_bencana']      = "(error)";
}


// (((--- LAPORAN TAHAP 2 ---)))
// Cek ketersediaan data dan validitas Laporan Tahap #1 (laporan_tahap1 --> tb_observasi_lapangan):
// Jika variabel perhitungan laporan Tahap #1 TIDAK TERSEDIA (laporan_tahap1 --> tb_observasi_lapangan)
if ($id_laporan_tahap2 == 0) {

    // Tampilkan pesan bahwa variabel perhitungan untuk Laporan Tahap #1 TIDAK TERSEDIA
    $_SESSION['pl']                 = "(null)";
    $_SESSION['pl_balita']          = "(null)";
    $_SESSION['pl_anak_anak']       = "(null)";
    $_SESSION['pl_remaja']          = "(null)";
    $_SESSION['pl_dewasa']          = "(null)";
    $_SESSION['pl_lansia']          = "(null)";
    $_SESSION['pp']                 = "(null)";
    $_SESSION['pp_balita']          = "(null)";
    $_SESSION['pp_anak_anak']       = "(null)";
    $_SESSION['pp_remaja']          = "(null)";
    $_SESSION['pp_dewasa']          = "(null)";
    $_SESSION['pp_lansia']          = "(null)";

    $_SESSION['kebutuhan_pp']       = "(null)";
    $_SESSION['kebutuhan_ps']       = "(null)";
    $_SESSION['kebutuhan_pk']       = "(null)";
    $_SESSION['kebutuhan_pl']       = "(null)";

    $_SESSION['total_pengungsi']    = "(null)";
    $_SESSION['total_umum']         = "(null)";
    $_SESSION['total_lansia']       = "(null)";
    $_SESSION['total_balita']       = "(null)";
    $_SESSION['meninggal_hilang']   = "(null)";
    $_SESSION['pl_dewasa_lansia']   = "(null)";
    $_SESSION['pp_dewasa_lansia']   = "(null)";

    $_SESSION['beras']              = "(null)";
    $_SESSION['telur']              = "(null)";
    $_SESSION['mie_instan']         = "(null)";
    $_SESSION['air_minum']          = "(null)";
    $_SESSION['pakaian_balita']     = "(null)";
    $_SESSION['pakaian_anak_l']     = "(null)";
    $_SESSION['pakaian_anak_p']     = "(null)";
    $_SESSION['pakaian_remaja_l']   = "(null)";
    $_SESSION['pakaian_remaja_p']   = "(null)";
    $_SESSION['pakaian_dewasa_l']   = "(null)";
    $_SESSION['pakaian_dewasa_p']   = "(null)";
    $_SESSION['selimut']            = "(null)";
    $_SESSION['sleeping_bag']       = "(null)";
    $_SESSION['matras']             = "(null)";
    $_SESSION['sabun_mandi']        = "(null)";
    $_SESSION['sabun_cuci']         = "(null)";
    $_SESSION['paket_kesehatan']    = "(null)";
    $_SESSION['popok_bayi']         = "(null)";
    $_SESSION['susu_bayi']          = "(null)";
    $_SESSION['selimut_bayi']       = "(null)";
    $_SESSION['pembalut']           = "(null)";
    $_SESSION['kantong_mayat']      = "(null)";
    $_SESSION['kain_kafan']         = "(null)";
}

// Jika variabel perhitungan laporan Tahap #2 TERSEDIA & BELUM PERNAH dilakukan perhitungan sebelumnya
// (laporan_tahap1 --> tb_observasi_lapangan)
elseif ($id_laporan_tahap2 == 1) {

    // Lakukan perhitungan untuk Laporan Tahap #2 dan Lakukan INSERT (tb_analisis_prioritas)
    $analisis->simpan_kebutuhan_logistik($id_peristiwa, $beras, $telur, $mie_instan, $air_mineral,
        $pakaian_balita, $pakaian_anak_l, $pakaian_anak_p, $pakaian_remaja_l, $pakaian_remaja_p,
        $pakaian_dewasa_l, $pakaian_dewasa_p, $selimut, $sleeping_bag, $matras, $sabun_mandi,
        $sabun_cuci, $paket_kesehatan, $popok_bayi, $susu_bayi, $selimut_bayi, $pembalut,
        $kantong_mayat, $kain_kapan);

    $_SESSION['pl']                 = $jml_pl;
    $_SESSION['pl_balita']          = $jml_pl_balita;
    $_SESSION['pl_anak_anak']       = $jml_pl_anak_anak;
    $_SESSION['pl_remaja']          = $jml_pl_remaja;
    $_SESSION['pl_dewasa']          = $jml_pl_dewasa;
    $_SESSION['pl_lansia']          = $jml_pl_lansia;
    $_SESSION['pp']                 = $jml_pp;
    $_SESSION['pp_balita']          = $jml_pp_balita;
    $_SESSION['pp_anak_anak']       = $jml_pp_anak_anak;
    $_SESSION['pp_remaja']          = $jml_pp_remaja;
    $_SESSION['pp_dewasa']          = $jml_pp_dewasa;
    $_SESSION['pp_lansia']          = $jml_pp_lansia;

    $_SESSION['kebutuhan_pp']       = $kebutuhan_paket_pangan;
    $_SESSION['kebutuhan_ps']       = $kebutuhan_paket_sandang;
    $_SESSION['kebutuhan_pk']       = $kebutuhan_paket_kematian;
    $_SESSION['kebutuhan_pl']       = $kebutuhan_paket_lainnya;

    $_SESSION['total_pengungsi']    = $jml_pl + $jml_pp;
    $_SESSION['pengungsi_umum']     = ($jml_pl + $jml_pp) - ($jml_pl_balita + $jml_pp_balita);
    $_SESSION['total_lansia']       = $jml_pl_lansia + $jml_pp_lansia;
    $_SESSION['total_balita']       = $jml_pl_balita + $jml_pp_balita;
    $_SESSION['meninggal_hilang']   = $jml_korban_meninggal_hilang;
    $_SESSION['pl_dewasa_lansia']   = $jml_pl_dewasa + $jml_pl_lansia;
    $_SESSION['pp_dewasa_lansia']   = $jml_pp_dewasa + $jml_pp_lansia;

    $_SESSION['beras']              = $beras;
    $_SESSION['telur']              = $telur;
    $_SESSION['mie_instan']         = $mie_instan;
    $_SESSION['air_minum']          = $air_mineral;
    $_SESSION['pakaian_balita']     = $pakaian_balita;
    $_SESSION['pakaian_anak_l']     = $pakaian_anak_l;
    $_SESSION['pakaian_anak_p']     = $pakaian_anak_p;
    $_SESSION['pakaian_remaja_l']   = $pakaian_remaja_l;
    $_SESSION['pakaian_remaja_p']   = $pakaian_remaja_p;
    $_SESSION['pakaian_dewasa_l']   = $pakaian_dewasa_l;
    $_SESSION['pakaian_dewasa_p']   = $pakaian_dewasa_p;
    $_SESSION['selimut']            = $selimut;
    $_SESSION['sleeping_bag']       = $sleeping_bag;
    $_SESSION['matras']             = $matras;
    $_SESSION['sabun_mandi']        = $sabun_mandi;
    $_SESSION['sabun_cuci']         = $sabun_cuci;
    $_SESSION['paket_kesehatan']    = $paket_kesehatan;
    $_SESSION['popok_bayi']         = $popok_bayi;
    $_SESSION['susu_bayi']          = $susu_bayi;
    $_SESSION['selimut_bayi']       = $selimut_bayi;
    $_SESSION['pembalut']           = $pembalut;
    $_SESSION['kantong_mayat']      = $kantong_mayat;
    $_SESSION['kain_kafan']         = $kain_kapan;
}

// Jika variabel perhitungan laporan Tahap #2 TERSEDIA & SUDAH PERNAH dilakukan perhitungan sebelumnya, akan tetapi
// data yang digunakan pada perhitungan sebelumnya mengalami perubahan data (laporan_tahap1 --> tb_observasi_lapangan)
elseif ($id_laporan_tahap2 == 2) {

    // Lakukan perhitungan untuk Laporan Tahap #2 dan Lakukan UPDATE (tb_analisis_prioritas)
    $analisis->update_kebutuhan_logistik($id_peristiwa, $beras, $telur, $mie_instan, $air_mineral,
        $pakaian_balita, $pakaian_anak_l, $pakaian_anak_p, $pakaian_remaja_l, $pakaian_remaja_p,
        $pakaian_dewasa_l, $pakaian_dewasa_p, $selimut, $sleeping_bag, $matras, $sabun_mandi, $sabun_cuci,
        $paket_kesehatan, $popok_bayi, $susu_bayi, $selimut_bayi, $pembalut, $kantong_mayat, $kain_kapan);

    $_SESSION['pl']                 = $jml_pl;
    $_SESSION['pl_balita']          = $jml_pl_balita;
    $_SESSION['pl_anak_anak']       = $jml_pl_anak_anak;
    $_SESSION['pl_remaja']          = $jml_pl_remaja;
    $_SESSION['pl_dewasa']          = $jml_pl_dewasa;
    $_SESSION['pl_lansia']          = $jml_pl_lansia;
    $_SESSION['pp']                 = $jml_pp;
    $_SESSION['pp_balita']          = $jml_pp_balita;
    $_SESSION['pp_anak_anak']       = $jml_pp_anak_anak;
    $_SESSION['pp_remaja']          = $jml_pp_remaja;
    $_SESSION['pp_dewasa']          = $jml_pp_dewasa;
    $_SESSION['pp_lansia']          = $jml_pp_lansia;

    $_SESSION['kebutuhan_pp']       = $kebutuhan_paket_pangan;
    $_SESSION['kebutuhan_ps']       = $kebutuhan_paket_sandang;
    $_SESSION['kebutuhan_pk']       = $kebutuhan_paket_kematian;
    $_SESSION['kebutuhan_pl']       = $kebutuhan_paket_lainnya;

    $_SESSION['total_pengungsi']    = $jml_pl + $jml_pp;
    $_SESSION['pengungsi_umum']     = ($jml_pl + $jml_pp) - ($jml_pl_balita + $jml_pp_balita);
    $_SESSION['total_lansia']       = $jml_pl_lansia + $jml_pp_lansia;
    $_SESSION['total_balita']       = $jml_pl_balita + $jml_pp_balita;
    $_SESSION['meninggal_hilang']   = $jml_korban_meninggal_hilang;
    $_SESSION['pl_dewasa_lansia']   = $jml_pl_dewasa + $jml_pl_lansia;
    $_SESSION['pp_dewasa_lansia']   = $jml_pp_dewasa + $jml_pp_lansia;

    $_SESSION['beras']              = $beras;
    $_SESSION['telur']              = $telur;
    $_SESSION['mie_instan']         = $mie_instan;
    $_SESSION['air_minum']          = $air_mineral;
    $_SESSION['pakaian_balita']     = $pakaian_balita;
    $_SESSION['pakaian_anak_l']     = $pakaian_anak_l;
    $_SESSION['pakaian_anak_p']     = $pakaian_anak_p;
    $_SESSION['pakaian_remaja_l']   = $pakaian_remaja_l;
    $_SESSION['pakaian_remaja_p']   = $pakaian_remaja_p;
    $_SESSION['pakaian_dewasa_l']   = $pakaian_dewasa_l;
    $_SESSION['pakaian_dewasa_p']   = $pakaian_dewasa_p;
    $_SESSION['selimut']            = $selimut;
    $_SESSION['sleeping_bag']       = $sleeping_bag;
    $_SESSION['matras']             = $matras;
    $_SESSION['sabun_mandi']        = $sabun_mandi;
    $_SESSION['sabun_cuci']         = $sabun_cuci;
    $_SESSION['paket_kesehatan']    = $paket_kesehatan;
    $_SESSION['popok_bayi']         = $popok_bayi;
    $_SESSION['susu_bayi']          = $susu_bayi;
    $_SESSION['selimut_bayi']       = $selimut_bayi;
    $_SESSION['pembalut']           = $pembalut;
    $_SESSION['kantong_mayat']      = $kantong_mayat;
    $_SESSION['kain_kafan']         = $kain_kapan;
}

// Jika hasil perhitungan Laporan Tahap #2 tersedia dan data tersebut valid (laporan_tahap1 --> tb_observasi_lapangan)
elseif ($id_laporan_tahap2 == 3) {

    // Ambil data perhitungan dari database (tb_analisis_prioritas)
    $_SESSION['pl']                 = $jml_pl;
    $_SESSION['pl_balita']          = $jml_pl_balita;
    $_SESSION['pl_anak_anak']       = $jml_pl_anak_anak;
    $_SESSION['pl_remaja']          = $jml_pl_remaja;
    $_SESSION['pl_dewasa']          = $jml_pl_dewasa;
    $_SESSION['pl_lansia']          = $jml_pl_lansia;
    $_SESSION['pp']                 = $jml_pp;
    $_SESSION['pp_balita']          = $jml_pp_balita;
    $_SESSION['pp_anak_anak']       = $jml_pp_anak_anak;
    $_SESSION['pp_remaja']          = $jml_pp_remaja;
    $_SESSION['pp_dewasa']          = $jml_pp_dewasa;
    $_SESSION['pp_lansia']          = $jml_pp_lansia;

    $_SESSION['kebutuhan_pp']       = $kebutuhan_paket_pangan;
    $_SESSION['kebutuhan_ps']       = $kebutuhan_paket_sandang;
    $_SESSION['kebutuhan_pk']       = $kebutuhan_paket_kematian;
    $_SESSION['kebutuhan_pl']       = $kebutuhan_paket_lainnya;

    $_SESSION['total_pengungsi']    = $jml_pl + $jml_pp;
    $_SESSION['pengungsi_umum']     = ($jml_pl + $jml_pp) - ($jml_pl_balita + $jml_pp_balita);
    $_SESSION['total_lansia']       = $jml_pl_lansia + $jml_pp_lansia;
    $_SESSION['total_balita']       = $jml_pl_balita + $jml_pp_balita;
    $_SESSION['meninggal_hilang']   = $jml_korban_meninggal_hilang;
    $_SESSION['pl_dewasa_lansia']   = $jml_pl_dewasa + $jml_pl_lansia;
    $_SESSION['pp_dewasa_lansia']   = $jml_pp_dewasa + $jml_pp_lansia;

    $_SESSION['beras']              = $beras;
    $_SESSION['telur']              = $telur;
    $_SESSION['mie_instan']         = $mie_instan;
    $_SESSION['air_minum']          = $air_mineral;
    $_SESSION['pakaian_balita']     = $pakaian_balita;
    $_SESSION['pakaian_anak_l']     = $pakaian_anak_l;
    $_SESSION['pakaian_anak_p']     = $pakaian_anak_p;
    $_SESSION['pakaian_remaja_l']   = $pakaian_remaja_l;
    $_SESSION['pakaian_remaja_p']   = $pakaian_remaja_p;
    $_SESSION['pakaian_dewasa_l']   = $pakaian_dewasa_l;
    $_SESSION['pakaian_dewasa_p']   = $pakaian_dewasa_p;
    $_SESSION['selimut']            = $selimut;
    $_SESSION['sleeping_bag']       = $sleeping_bag;
    $_SESSION['matras']             = $matras;
    $_SESSION['sabun_mandi']        = $sabun_mandi;
    $_SESSION['sabun_cuci']         = $sabun_cuci;
    $_SESSION['paket_kesehatan']    = $paket_kesehatan;
    $_SESSION['popok_bayi']         = $popok_bayi;
    $_SESSION['susu_bayi']          = $susu_bayi;
    $_SESSION['selimut_bayi']       = $selimut_bayi;
    $_SESSION['pembalut']           = $pembalut;
    $_SESSION['kantong_mayat']      = $kantong_mayat;
    $_SESSION['kain_kafan']         = $kain_kapan;
}

// Jika dihadapkan pada kondisi selain kondisi yang sudah disebutkan di atas (just in case)
else {

    // Tampilkan pesan error pada setiap variabel perhitungan
    $_SESSION['pl']                 = "(error)";
    $_SESSION['pl_balita']          = "(error)";
    $_SESSION['pl_anak_anak']       = "(error)";
    $_SESSION['pl_remaja']          = "(error)";
    $_SESSION['pl_dewasa']          = "(error)";
    $_SESSION['pl_lansia']          = "(error)";
    $_SESSION['pp']                 = "(error)";
    $_SESSION['pp_balita']          = "(error)";
    $_SESSION['pp_anak_anak']       = "(error)";
    $_SESSION['pp_remaja']          = "(error)";
    $_SESSION['pp_dewasa']          = "(error)";
    $_SESSION['pp_lansia']          = "(error)";

    $_SESSION['kebutuhan_pp']       = "(error)";
    $_SESSION['kebutuhan_ps']       = "(error)";
    $_SESSION['kebutuhan_pk']       = "(error)";
    $_SESSION['kebutuhan_pl']       = "(error)";

    $_SESSION['total_pengungsi']    = "(error)";
    $_SESSION['total_umum']         = "(error)";
    $_SESSION['total_lansia']       = "(error)";
    $_SESSION['total_balita']       = "(error)";
    $_SESSION['meninggal_hilang']   = "(error)";
    $_SESSION['pl_dewasa_lansia']   = "(error)";
    $_SESSION['pp_dewasa_lansia']   = "(error)";

    $_SESSION['beras']              = "(error)";
    $_SESSION['telur']              = "(error)";
    $_SESSION['mie_instan']         = "(error)";
    $_SESSION['air_minum']          = "(error)";
    $_SESSION['pakaian_balita']     = "(error)";
    $_SESSION['pakaian_anak_l']     = "(error)";
    $_SESSION['pakaian_anak_p']     = "(error)";
    $_SESSION['pakaian_remaja_l']   = "(error)";
    $_SESSION['pakaian_remaja_p']   = "(error)";
    $_SESSION['pakaian_dewasa_l']   = "(error)";
    $_SESSION['pakaian_dewasa_p']   = "(error)";
    $_SESSION['selimut']            = "(error)";
    $_SESSION['sleeping_bag']       = "(error)";
    $_SESSION['matras']             = "(error)";
    $_SESSION['sabun_mandi']        = "(error)";
    $_SESSION['sabun_cuci']         = "(error)";
    $_SESSION['paket_kesehatan']    = "(error)";
    $_SESSION['popok_bayi']         = "(error)";
    $_SESSION['susu_bayi']          = "(error)";
    $_SESSION['selimut_bayi']       = "(error)";
    $_SESSION['pembalut']           = "(error)";
    $_SESSION['kantong_mayat']      = "(error)";
    $_SESSION['kain_kafan']         = "(error)";
}

header("location:../../views/ketua/".$lokasi);

// End: Flowchart/Alur Kerja Sistem dalam Menyusun Laporan -------------------------------------------------------------
?>