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
require_once ("../../models/trc/TrcHasilObservasi.php");

$connection     = new Database($host, $user, $pass, $database);
$analisis       = new KtaLaporanCetak($connection);

$id_peristiwa               = $_POST['id_peristiwa'];
$id_laporan_tahap1          = $_POST['laporan_tahap1'];
$id_laporan_tahap2          = $_POST['laporan_tahap2'];

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
$master_korban_terdampak    = $_POST['korban_terdampak'];
$master_korban_mengungsi    = $_POST['korban_mengungsi'];
$master_korban_luka         = $_POST['korban_luka'];
$master_korban_hilang       = $_POST['korban_hilang'];
$master_korban_meninggal    = $_POST['korban_meninggal'];
$master_pasca_bencana       = $_POST['pasca_bencana'];

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



// Start: Analisis Kebutuhan Bantuan Logistik dalam Bentuk Satuan ------------------------------------------------------
// Deklarasi Variabel yang Dibutuhkan untuk Perhitungan
$jml_pl_balita      = $_POST['pl_balita'];
$jml_pl_anak_anak   = $_POST['pl_anak_anak'];
$jml_pl_remaja      = $_POST['pl_remaja'];
$jml_pl_dewasa      = $_POST['pl_dewasa'];
$jml_pl_lansia      = $_POST['pl_lansia'];
$jml_pl             = $_POST['jml_pl'];

$jml_pp_balita      = $_POST['pp_balita'];
$jml_pp_anak_anak   = $_POST['pp_anak_anak'];
$jml_pp_remaja      = $_POST['pp_remaja'];
$jml_pp_dewasa      = $_POST['pp_dewasa'];
$jml_pp_lansia      = $_POST['pp_lansia'];
$jml_pp             = $_POST['jml_pp'];

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

$selimut            = 1 * (($jml_pl + $jml_pp) - ($jml_pl_balita + $jml_pp_balita + $jml_pl_lansia + $jml_pp_lansia)); // buah
$sleeping_bag       = 1 * ($jml_pl_lansia + $jml_pp_lansia); // buah
$matras             = 1 * ($jml_pl + $jml_pp); // buah
$sabun_mandi        = 3 * ($jml_pl + $jml_pp); // batang/bulan
$sabun_cuci         = 1 * ($jml_pl + $jml_pp); // bungkus/bulan
$paket_kesehatan    = ceil($master_korban_luka / 10); // paket/10 korban

$popok_bayi         = 12 * ($jml_pl_balita + $jml_pp_balita); // pcs/hari
$susu_bayi          = 990 * ($jml_pl_balita + $jml_pp_balita); // gram/hari
$selimut_bayi       = 1 * ($jml_pl_balita + $jml_pp_balita); // buah
$pembalut           = (4 * $jml_pp_remaja) * 0.5; // pcs/hari
$kantong_mayat      = 1 * $master_korban_meninggal_hilang; // buah/korban meninggal atau hilang
$kain_kapan         = 1 * $master_korban_meninggal_hilang; // buah/korban meninggal atau hilang
// End: Analisis Kebutuhan Bantuan Logistik dalam Bentuk Satuan --------------------------------------------------------



// Start: Analisis Kebutuhan Bantuan Logistik dalam Bentuk Paket -------------------------------------------------------
// Deklarasi Variabel yang Dibutuhkan untuk Perhitungan
$jml_kepala_keluarga            = $jml_pl_dewasa; // Untuk Paket Sandang dan Pangan
$jml_korban_meninggal_hilang    = $master_korban_hilang + $master_korban_meninggal; // Untuk Paket Kematian
$jml_korban_luka                = $master_korban_luka; // Untuk Paket Lainnya

// Hasil Perhitungan: Jumlah Kebutuhan Bantuan logistik dalam Bentuk Paket
$kebutuhan_paket_pangan         = ceil(($jml_pl + $jml_pp) / 5);
$kebutuhan_paket_sandang        = ceil(($jml_pl + $jml_pp) / 5);
$kebutuhan_paket_kematian       = $jml_korban_meninggal_hilang;
$kebutuhan_paket_lainnya        = ceil($jml_korban_luka / 10);
// End: Analisis Kebutuhan Bantuan Logistik dalam Bentuk Paket ---------------------------------------------------------



// Start: Update Hasil Obervasi Lapangan -------------------------------------------------------------------------------
$TrcHasilObservasi = new TrcHasilObservasi($connection);
$TrcHasilObservasi->update_observasi($id_peristiwa, $master_korban_terdampak, $master_korban_mengungsi,
    $master_korban_luka, $master_korban_meninggal, $master_korban_hilang, $master_pasca_bencana, $jml_pl, 
    $jml_pl_balita, $jml_pl_anak_anak, $jml_pl_remaja, $jml_pl_dewasa, $jml_pl_lansia, $jml_pp, $jml_pp_balita, 
    $jml_pp_anak_anak, $jml_pp_remaja, $jml_pp_dewasa, $jml_pp_lansia);
// // End: Simpan Hasil Obervasi Lapangan ---------------------------------------------------------------------------------



// Start: Flowchart/Alur Kerja Sistem dalam Menyusun Laporan -----------------------------------------------------------

// Menentukan peristiwa yang menjadi objek perhitungan
// (((--- LAPORAN TAHAP 1 ---)))
// Cek ketersediaan data dan validitas Laporan Tahap #1 (laporan_tahap1 --> tb_observasi_lapangan):
// Jika variabel perhitungan laporan Tahap #1 TIDAK TERSEDIA (laporan_tahap1 --> tb_observasi_lapangan)
if ($id_laporan_tahap1 == 0) {

    // Tampilkan pesan bahwa variabel perhitungan untuk Laporan Tahap #1 TIDAK TERSEDIA/NULL
    $keterangan = "Tidak dapat melakukan analisis prioritas. Laporan tahap 1 belum dilaporkan.";
}

// Jika variabel perhitungan laporan Tahap #1 TERSEDIA & BELUM PERNAH dilakukan perhitungan sebelumnya
// (laporan_tahap1 --> tb_observasi_lapangan)
elseif ($id_laporan_tahap1 == 1) {

    // Lakukan perhitungan untuk Laporan Tahap #1 dan Lakukan INSERT (tb_analisis_prioritas)
    // WARNING! Alur ini seharusnya tidak akan pernah terpilih (Karena Trigger)
    $analisis->simpan_analisis_prioritas($id_peristiwa, $nilai_paket_pangan,
        $nilai_paket_sandang, $nilai_paket_kematian, $nilai_paket_lainnya);
}

// Jika variabel perhitungan laporan Tahap #1 TERSEDIA & SUDAH PERNAH dilakukan perhitungan sebelumnya, akan tetapi
// data yang digunakan pada perhitungan sebelumnya mengalami perubahan data (laporan_tahap1 --> tb_observasi_lapangan)
elseif ($id_laporan_tahap1 == 2) {

    // Lakukan perhitungan untuk Laporan Tahap #1 dan Lakukan UPDATE (tb_analisis_prioritas)
    $analisis->update_analisis_prioritas($id_peristiwa, $nilai_paket_pangan, $nilai_paket_sandang,
        $nilai_paket_kematian, $nilai_paket_lainnya);
}

// Jika hasil perhitungan Laporan Tahap #1 tersedia dan data tersebut valid (laporan_tahap1 --> tb_observasi_lapangan)
elseif ($id_laporan_tahap1 == 3) {

    // Ambil data perhitungan dari database (tb_analisis_prioritas)
    // WARNING! Alur ini juga seharusnya tidak akan pernah terpilih (Karena Trigger)
    $keterangan = "Hasil perhitungan analisis prioritas up to date.";
}

// Jika dihadapkan pada kondisi selain kondisi yang sudah disebutkan di atas (just in case)
else {

    // Tampilkan pesan error pada setiap variabel perhitungan
    $keterangan = "Terjadi kesalahan ketika melakukan perhitungan analisis prioritas.";
}


// (((--- LAPORAN TAHAP 2 ---)))
// Cek ketersediaan data dan validitas Laporan Tahap #1 (laporan_tahap1 --> tb_observasi_lapangan):
// Jika variabel perhitungan laporan Tahap #1 TIDAK TERSEDIA (laporan_tahap1 --> tb_observasi_lapangan)
if ($id_laporan_tahap2 == 0) {

    // Tampilkan pesan bahwa variabel perhitungan untuk Laporan Tahap #1 TIDAK TERSEDIA
    $keterangan = "Tidak dapat melakukan analisis kebutuhan logistik. Laporan tahap 2 belum dilaporkan.";
}

// Jika variabel perhitungan laporan Tahap #2 TERSEDIA & BELUM PERNAH dilakukan perhitungan sebelumnya
// (laporan_tahap1 --> tb_observasi_lapangan)
elseif ($id_laporan_tahap2 == 1) {

    // Lakukan perhitungan untuk Laporan Tahap #2 dan Lakukan INSERT (tb_analisis_prioritas)
    // WARNING! Alur ini seharusnya tidak akan pernah terpilih (Karena Trigger)
    $analisis->simpan_kebutuhan_logistik($id_peristiwa, $beras, $telur, $mie_instan, $air_mineral,
        $pakaian_balita, $pakaian_anak_l, $pakaian_anak_p, $pakaian_remaja_l, $pakaian_remaja_p,
        $pakaian_dewasa_l, $pakaian_dewasa_p, $selimut, $sleeping_bag, $matras, $sabun_mandi,
        $sabun_cuci, $paket_kesehatan, $popok_bayi, $susu_bayi, $selimut_bayi, $pembalut,
        $kantong_mayat, $kain_kapan);
}

// Jika variabel perhitungan laporan Tahap #2 TERSEDIA & SUDAH PERNAH dilakukan perhitungan sebelumnya, akan tetapi
// data yang digunakan pada perhitungan sebelumnya mengalami perubahan data (laporan_tahap1 --> tb_observasi_lapangan)
elseif ($id_laporan_tahap2 == 2) {

    // Lakukan perhitungan untuk Laporan Tahap #2 dan Lakukan UPDATE (tb_analisis_prioritas)
    $analisis->update_kebutuhan_log($id_peristiwa, $beras, $telur, $mie_instan, $air_mineral, $pakaian_balita,
        $pakaian_anak_l, $pakaian_anak_p, $pakaian_remaja_l, $pakaian_remaja_p, $pakaian_dewasa_l, $pakaian_dewasa_p,
        $selimut, $sleeping_bag, $matras, $sabun_mandi, $sabun_cuci, $paket_kesehatan, $popok_bayi, $susu_bayi,
        $selimut_bayi, $pembalut, $kantong_mayat, $kain_kapan);
}

// Jika hasil perhitungan Laporan Tahap #2 tersedia dan data tersebut valid (laporan_tahap1 --> tb_observasi_lapangan)
elseif ($id_laporan_tahap2 == 3) {

    // Ambil data perhitungan dari database (tb_analisis_prioritas)
    // WARNING! Alur ini juga seharusnya tidak akan pernah terpilih (Karena Trigger)
    $keterangan = "Hasil perhitungan kebutuhan logistik up to date.";
}

// Jika dihadapkan pada kondisi selain kondisi yang sudah disebutkan di atas (just in case)
else {

    // Tampilkan pesan error pada setiap variabel perhitungan
    $keterangan = "Terjadi kesalahan ketika melakukan perhitungan logistik prioritas.";
}
// End: Flowchart/Alur Kerja Sistem dalam Menyusun Laporan -------------------------------------------------------------

echo "<script>window.location.reload('location:../../views/trc/?pages=hasil_observasi');</script>";
?>