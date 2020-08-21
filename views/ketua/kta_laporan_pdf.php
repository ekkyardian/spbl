<?php
/**
 * Created by PhpStorm.
 * User: Ekky Ardian Fitran
 * Date: 18/04/2020
 * Time: 23:48
 */

session_start();


if ($_SESSION['hak_akses']=='ketua' OR $_SESSION['hak_akses']=='admin') {

ob_start();
require_once('../../config/+koneksi.php');
require_once('../../models/database.php');
include "../../models/ketua/KtaLaporanCetak.php";

$connection = new Database($host, $user, $pass, $database);
$KtaLaporanCetak = new KtaLaporanCetak($connection);

$id_peristiwa = $_GET['peristiwa'];

// Pengambilan data tabel: tb_analisis_prioritas, dan inisialisasi variable --------------------------------------------
$analisis_prioritas = $KtaLaporanCetak->tampil_analisis_prioritas($id_peristiwa)->fetchObject();

$paket_pangan   = $analisis_prioritas->paket_pangan;
$paket_sandang  = $analisis_prioritas->paket_sandang;
$paket_kematian = $analisis_prioritas->paket_kematian;
$paket_lainnya  = $analisis_prioritas->paket_lainnya;

// Perankingan Bantuan Logistik Prioritas
if ($paket_pangan > $paket_sandang AND $paket_pangan > $paket_kematian AND
$paket_pangan > $paket_lainnya) {
    $paket_prioritas = "Paket Pangan";
}
else if ($paket_sandang > $paket_pangan AND $paket_sandang > $paket_kematian AND
$paket_sandang > $paket_lainnya) {
    $paket_prioritas = "Paket Sandang";
}
else if ($paket_kematian > $paket_pangan AND $paket_kematian > $paket_sandang AND
$paket_kematian > $paket_lainnya) {
    $paket_prioritas = "Paket Kematian";
}
else if ($paket_lainnya > $paket_pangan AND $paket_lainnya > $paket_sandang AND
$paket_lainnya > $paket_kematian) {
    $paket_prioritas = "Paket Lainnya";
}
else {
    $paket_prioritas = "Tidak Ditemukan";
}

// Pengambilan data tabel: tb_observasi_lapangan, dan inisialisasi variable --------------------------------------------
$observasi_lapangan = $KtaLaporanCetak->tampil_observasi_lapangan($id_peristiwa)->fetchObject();

$korban_terdampak    = $observasi_lapangan->korban_terdampak;
$korban_mengungsi    = $observasi_lapangan->korban_mengungsi;
$korban_luka         = $observasi_lapangan->korban_luka;
$korban_meninggal    = $observasi_lapangan->korban_meninggal;
$korban_hilang       = $observasi_lapangan->korban_hilang;
$meninggal_hilang    = $korban_meninggal + $korban_hilang;
$pasca_bencana       = $observasi_lapangan->pasca_bencana;
$pl                  = $observasi_lapangan->pengungsi_laki_laki;
$pl_balita           = $observasi_lapangan->pl_balita;
$pl_anak_anak        = $observasi_lapangan->pl_anak_anak;
$pl_remaja           = $observasi_lapangan->pl_remaja;
$pl_dewasa           = $observasi_lapangan->pl_dewasa;
$pl_lansia           = $observasi_lapangan->pl_lansia;
$pp                  = $observasi_lapangan->pengungsi_perempuan;
$pp_balita           = $observasi_lapangan->pp_balita;
$pp_anak_anak        = $observasi_lapangan->pp_anak_anak;
$pp_remaja           = $observasi_lapangan->pp_remaja;
$pp_dewasa           = $observasi_lapangan->pp_dewasa;
$pp_lansia           = $observasi_lapangan->pp_lansia;

// Analisis Kebutuhan Logistik: Paket ----------------------------------------------------------------------------------
$kebutuhan_paket_pangan     = $pl_dewasa + $pl_lansia;
$kebutuhan_paket_sandang    = $pl_dewasa + $pl_lansia;
$kebutuhan_paket_kematian   = $korban_meninggal + $korban_hilang;
$kebutuhan_paket_lainnya    = ceil($korban_luka / 10);

// Pengambilan data tabel: tb_kebutuhan_logistik, dan inisialisasi variable --------------------------------------------
$kebutuhan_logistik = $KtaLaporanCetak->tampil_kebutuhan_logistik($id_peristiwa)->fetchObject();

$beras              = $kebutuhan_logistik->beras;
$telur              = $kebutuhan_logistik->telur;
$mie_instan         = $kebutuhan_logistik->mie_instan;
$air_minum          = $kebutuhan_logistik->air_minum;
$pakaian_balita     = $kebutuhan_logistik->pakaian_balita;
$pakaian_anak_l     = $kebutuhan_logistik->pakaian_anak_l;
$pakaian_anak_p     = $kebutuhan_logistik->pakaian_anak_p;
$pakaian_remaja_l   = $kebutuhan_logistik->pakaian_remaja_l;
$pakaian_remaja_p   = $kebutuhan_logistik->pakaian_remaja_p;
$pakaian_dewasa_l   = $kebutuhan_logistik->pakaian_dewasa_l;
$pakaian_dewasa_p   = $kebutuhan_logistik->pakaian_dewasa_p;
$selimut            = $kebutuhan_logistik->selimut;
$sleeping_bag       = $kebutuhan_logistik->sleeping_bag;
$matras             = $kebutuhan_logistik->matras;
$sabun_mandi        = $kebutuhan_logistik->sabun_mandi;
$sabun_cuci         = $kebutuhan_logistik->sabun_cuci;
$paket_kesehatan    = $kebutuhan_logistik->paket_kesehatan;
$popok_bayi         = $kebutuhan_logistik->popok_bayi;
$susu_bayi          = $kebutuhan_logistik->susu_bayi;
$selimut_bayi       = $kebutuhan_logistik->selimut_bayi;
$pembalut           = $kebutuhan_logistik->pembalut;
$kantong_mayat      = $kebutuhan_logistik->kantong_mayat;
$kain_kafan         = $kebutuhan_logistik->kain_kafan;
$pengungsi_umum     = ($pl + $pp) - ($pl_balita + $pp_balita);
$pengungsi_balita   = $pl_balita + $pp_balita;
$pengungsi_lansia   = $pl_lansia + $pp_lansia;
$dewasa_lansia_l    = $pl_dewasa + $pl_lansia;
$dewasa_lansia_p    = $pp_dewasa + $pp_lansia;

require_once '../../assets/mpdf/vendor/autoload.php';
$mpdf = new \Mpdf\Mpdf();
ob_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
    <meta charset="utf-8"/>
    <title>SPBL</title>

    <meta name="description" content=""/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0"/>

    <!-- Personal CSS -->
    <link rel="stylesheet" href="../../assets/css/personal-style.css" type="text/css" />

    <!-- bootstrap & fontawesome -->
<!--    <link rel="stylesheet" href="../../assets/css/bootstrap.min.css"/>-->
<!--    <link rel="stylesheet" href="../../assets/font-awesome/4.5.0/css/font-awesome.min.css"/>-->

    <!-- text fonts -->
    <link rel="stylesheet" href="../../assets/css/fonts.googleapis.com.css" type="text/css" />

    <!-- ace styles -->
    <link rel="stylesheet" href="../../assets/css/ace.min.css" class="ace-main-stylesheet" id="main-ace-style" type="text/css"/>

    <!--[if lte IE 9]>
    <link rel="stylesheet" href="../../assets/css/ace-part2.min.css" class="ace-main-stylesheet" type="text/css"/>
    <![endif]-->
    <link rel="stylesheet" href="../../assets/css/ace-skins.min.css" type="text/css"/>
    <link rel="stylesheet" href="../../assets/css/ace-rtl.min.css" type="text/css"/>

    <!--[if lte IE 9]>
    <link rel="stylesheet" href="../../assets/css/ace-ie.min.css" type="text/css"/>
    <![endif]-->

    <!-- ace settings handler -->
    <script src="../../assets/js/ace-extra.min.js"></script>

    <!--[if lte IE 8]>
    <script src="../../assets/js/html5shiv.min.js"></script>
    <script src="../../assets/js/respond.min.js"></script>
    <![endif]-->

    <style type="text/css">
        .tanpa-border {
            border: 0;
            box-shadow: none;
        }
    </style>
</head>

<body style="background-color: #ffffff;">
<div class="main-container">
    <table width="800px">
        <!--| Start: Kop Laporan |-->
        <tr>
            <td>
                <table width="800px" class="kop-laporan">
                    <tr>
                        <td rowspan="3">
                            <img src="../../assets/images/gallery/Logo-BPBD-Kota-Bogor.jpeg" width="100" height="100">
                        </td>
                        <td align="center" style="font-size: 23px; font-weight: bold">
                            BADAN PENANGGULANGAN BENCANA DAERAH (BPBD)
                        </td>
                    </tr>
                    <tr>
                        <td align="center" style="font-size: 23px; font-weight: bold">KOTA BOGOR</td>
                    </tr>
                    <tr>
                        <td align="center">
                            Jl. Pool Bina Marga No. 2, RT. 02 RW. 01, Kayu Manis, Kec. Tanah Sareal, Kota
                            Bogor 16169
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2"><hr /></td>
                    </tr>
                </table>
            </td>
        </tr>
        <!--| End: Kop Laporan |-->

        <tr><td>&nbsp;</td></tr>
        <tr><td>
                <table width="100%" class="judul-laporan">
                    <tr>
                        <td align="center" style="font-size: 18px; font-weight: bold">LAPORAN HASIL ANALISIS</td>
                    </tr>
                </table>
            </td></tr>
        <tr><td>&nbsp;</td></tr>

        <!--| Start: Deskripsi Peristiwa & Logistik Prioritas |-->
        <tr>
            <td>
                <table border="0">
                    <tr>
                        <td width="580px" valign="top">

                            <!--| Start: Deskripsi Peristiwa |-->
                            <table width="100%" class="deskripsi-table">
                                <tr>
                                    <th colspan="3">
                                        Deskripsi Peristiwa Bencana
                                    </th>
                                </tr>
                                <?php
                                $data_peristiwa = $KtaLaporanCetak->tampil_peristiwa($id_peristiwa)
                                    ->fetchObject();
                                ?>
                                <tr>
                                    <td width="90">Nama Inisial</td>
                                    <td width="10">:</td>
                                    <td width="300"><?php echo $data_peristiwa->nama_inisial; ?></td>
                                </tr>
                                <tr>
                                    <td>Jenis Bencana</td>
                                    <td>:</td>
                                    <td><?php echo $data_peristiwa->jenis_bencana; ?></td>
                                </tr>
                                <tr>
                                    <td valign="top">Cakupan Lokasi</td>
                                    <td valign="top">:</td>
                                    <td valign="top"><?php echo $data_peristiwa->cakupan_lokasi; ?></td>
                                </tr>
                                <tr>
                                    <td valign="top">Waktu Kejadian</td>
                                    <td valign="top">:</td>
                                    <td valign="top">
                                        Tanggal <?php echo $data_peristiwa->tanggal_peristiwa; ?><br />
                                        Jam <?php echo $data_peristiwa->jam_peristiwa; ?> WIB
                                    </td>
                                </tr>
                            </table>
                            <!--| End: Deskripsi Peristiwa |-->

                        </td>

                        <td width="20px">&nbsp;</td>

                        <td width="200px" valign="top">

                            <!--| Start: Logistik Prioritas |-->
                            <table width="100%" class="deskripsi-table">
                                <tr>
                                    <th colspan="3">
                                        Bantuan Logistik Prioritas <br />
                                    </th>
                                </tr>
                                <tr>
                                    <td colspan="3" style="text-align: center; font-family: 'Arial Black'; font-size: 17px; color: #e67817">
                                        <?php echo strtoupper($paket_prioritas); ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Paket Pangan</td>
                                    <td>:</td>
                                    <td><?php echo $paket_pangan; ?></td>
                                </tr>
                                <tr>
                                    <td>Paket Sandang</td>
                                    <td>:</td>
                                    <td><?php echo $paket_sandang; ?></td>
                                </tr>
                                <tr>
                                    <td>Paket Kematian</td>
                                    <td>:</td>
                                    <td><?php echo $paket_kematian; ?></td>
                                </tr>
                                <tr>
                                    <td>Paket Lainnya</td>
                                    <td>:</td>
                                    <td><?php echo $paket_lainnya; ?></td>
                                </tr>
                            </table>
                            <!--| End: Logistik Prioritas |-->

                        </td>
                    </tr>
                </table>
            </td>
        </tr>
        <!--| End: Deskripsi Peristiwa & Logistik Prioritas |-->

        <tr><td>&nbsp;</td></tr>

        <tr>
            <td>
                <table>
                    <tr>
                        <td width="390px" height="240px" valign="top">

                            <!--| Start: Hasil Observasi Lapangan Tahap #1 |-->
                            <table width="100%" class="deskripsi-table">
                                <tr>
                                    <th colspan="3">Hasil Observasi Lapangan Tahap #1</th>
                                </tr>
                                <tr>
                                    <td width="250px">Jumlah Korban Terdampak</td>
                                    <td>:</td>
                                    <td><?php echo $korban_terdampak; ?> orang</td>
                                </tr>
                                <tr>
                                    <td>Jumlah Korban Mengungsi</td>
                                    <td>:</td>
                                    <td><?php echo $korban_mengungsi; ?> orang</td>
                                </tr>
                                <tr>
                                    <td>Jumlah Korban Luka</td>
                                    <td>:</td>
                                    <td><?php echo $korban_luka; ?> orang</td>
                                </tr>
                                <tr>
                                    <td>Jumlah Korban Menghilag</td>
                                    <td>:</td>
                                    <td><?php echo $korban_hilang; ?> orang</td>
                                </tr>
                                <tr>
                                    <td>Jumlah Korban Meninggal</td>
                                    <td>:</td>
                                    <td><?php echo $korban_meninggal; ?> orang</td>
                                </tr>
                                <tr>
                                    <td>Kondisi Pasca Bencana</td>
                                    <td>:</td>
                                    <td><?php echo $pasca_bencana; ?></td>
                                </tr>
                            </table>
                            <!--| End: Hasil Observasi Lapangan Tahap #1 |-->

                        </td>

                        <td width="20px" rowspan="2">&nbsp;</td>

                        <td width="390px" rowspan="2" valign="top">

                            <!--| Start: Hasil Observasi Lapangan Tahap #2 |-->
                            <table width="100%" class="deskripsi-table">
                                <tr>
                                    <th colspan="3">Hasil Observasi Lapangan Tahap #2</th>
                                </tr>
                                <tr>
                                    <td colspan="3"><strong>A. Korban Bencana: Laki-laki</strong></td>
                                </tr>
                                <tr>
                                    <td>Balita</td>
                                    <td>:</td>
                                    <td><?php echo $pl_balita; ?> orang</td>
                                </tr>
                                <tr>
                                    <td>Anak-anak</td>
                                    <td>:</td>
                                    <td><?php echo $pl_anak_anak; ?> orang</td>
                                </tr>
                                <tr>
                                    <td>Remaja</td>
                                    <td>:</td>
                                    <td><?php echo $pl_remaja; ?> orang</td>
                                </tr>
                                <tr>
                                    <td>Dewasa</td>
                                    <td>:</td>
                                    <td><?php echo $pl_dewasa; ?> orang</td>
                                </tr>
                                <tr>
                                    <td>Lansia</td>
                                    <td>:</td>
                                    <td><?php echo $pl_lansia; ?> orang</td>
                                </tr>
                                <tr>
                                    <td><strong>Total Sub A</strong></td>
                                    <td><strong>:</strong></td>
                                    <td><strong><?php echo $pl; ?> orang</strong></td>
                                </tr>
                                <tr>
                                    <td colspan="3">&nbsp;</td>
                                </tr>
                                <tr>
                                    <td colspan="3"><strong>B. Korban Bencana: Perempuan</strong></td>
                                </tr>
                                <tr>
                                    <td>Balita</td>
                                    <td>:</td>
                                    <td><?php echo $pp_balita; ?> orang</td>
                                </tr>
                                <tr>
                                    <td>Anak-anak</td>
                                    <td>:</td>
                                    <td><?php echo $pp_anak_anak; ?> orang</td>
                                </tr>
                                <tr>
                                    <td>Remaja</td>
                                    <td>:</td>
                                    <td><?php echo $pp_remaja; ?> orang</td>
                                </tr>
                                <tr>
                                    <td>Dewasa</td>
                                    <td>:</td>
                                    <td><?php echo $pp_dewasa; ?> orang</td>
                                </tr>
                                <tr>
                                    <td>Lansia</td>
                                    <td>:</td>
                                    <td><?php echo $pp_lansia; ?> orang</td>
                                </tr>
                                <tr>
                                    <td><strong>Total Sub A</strong></td>
                                    <td><strong>:</strong></td>
                                    <td><strong><?php echo $pp; ?> orang</strong></td>
                                </tr>
                                <tr>
                                    <td colspan="3">&nbsp;</td>
                                </tr>
                                <tr>
                                    <td><strong>Total (Sub A + Sub B)</strong></td>
                                    <td><strong>:</strong></td>
                                    <td>
                                        <strong>
                                            <?php
                                            $total_pengungsi = $pl + $pp;
                                            echo $total_pengungsi." orang";
                                            ?>
                                        </strong>
                                    </td>
                                </tr>
                            </table>
                            <!--| End: Hasil Observasi Lapangan Tahap #2 |-->

                        </td>
                    </tr>

                    <tr>
                        <td valign="top">

                            <!--| Start: Rincian Bantuan Logistik yang Dibutuhkan (Dalam Bentuk Paket) |-->
                            <table width="100%" class="deskripsi-table">
                                <tr>
                                    <th colspan="3"><strong>Kebutuhan Logistik: Paket *</strong></th>
                                </tr>

                                <tr>
                                    <td width="250px">Paket Pangan</td>
                                    <td>:</td>
                                    <td><?php echo $kebutuhan_paket_pangan; ?> Paket</td>
                                </tr>
                                <tr>
                                    <td>Paket Sandang</td>
                                    <td>:</td>
                                    <td><?php echo $kebutuhan_paket_sandang; ?> Paket</td>
                                </tr>
                                <tr>
                                    <td>Paket Kematian</td>
                                    <td>:</td>
                                    <td><?php echo $kebutuhan_paket_kematian; ?> Paket</td>
                                </tr>
                                <tr>
                                    <td>Paket Lainnya</td>
                                    <td>:</td>
                                    <td><?php echo $kebutuhan_paket_lainnya; ?> Paket</td>
                                </tr>
                            </table>
                            <!--| End: Rincian Bantuan Logistik yang Dibutuhkan (Dalam Bentuk Paket) |-->

                        </td>
                    </tr>
                </table>
            </td>
        </tr>

        <tr><td>&nbsp;</td></tr> <!-- height="270px" -->

        <!--| Start: Rincian Bantuan Logistik yang Dibutuhkan (Dalam Bentuk Satuan) |-->
        <tr>
            <td>
                <table class="deskripsi-combine">
                    <tr>
                        <th>Kebutuhan Logistik: Satuan **</th>
                    </tr>
                    <tr>
                        <td>
                            <table width="800px" class="logistik-satuan">
                                <tr>
                                    <th style="text-align: center;"><strong>No</strong></th>
                                    <th style="text-align: left;"><strong>Deskripsi</strong></th>
                                    <th style="text-align: left;"><strong>Volume</strong></th>
                                    <th style="text-align: left;"><strong>Faktor <br />Pengali</strong></th>
                                    <th style="text-align: left;"><strong>Total <br />Kebutuhan</strong></th>
                                    <th style="text-align: left;"><strong>Satuan</strong></th>
                                    <th style="text-align: left;"><strong>Periode</strong></th>
                                </tr>
                                <tr>
                                    <td style="text-align: center;"><strong>A</strong></td>
                                    <td colspan="6"><strong>Bahan Makanan dan Minuman</strong></td>
                                </tr>
                                <tr>
                                    <td style="text-align: center;">1</td>
                                    <td>Beras</td>
                                    <td><?php echo $pengungsi_umum; ?></td>
                                    <td>0,4</td>
                                    <td>
                                        <strong>
                                            <?php echo number_format($beras, 0, ".", "."); ?>
                                        </strong>
                                    </td>
                                    <td>Liter</td>
                                    <td>Harian</td>
                                </tr>
                                <tr>
                                    <td style="text-align: center;">2</td>
                                    <td>Telur/Lauk pauk</td>
                                    <td><?php echo $pengungsi_umum; ?></td>
                                    <td>3</td>
                                    <td>
                                        <strong>
                                            <?php echo number_format($telur, 0, ".", "."); ?>
                                        </strong>
                                    </td>
                                    <td>Butir/buah</td>
                                    <td>Harian</td>
                                </tr>
                                <tr>
                                    <td style="text-align: center;">3</td>
                                    <td>Mie instan</td>
                                    <td><?php echo $pengungsi_umum; ?></td>
                                    <td>3</td>
                                    <td>
                                        <strong>
                                            <?php echo number_format($mie_instan, 0, ".", "."); ?>
                                        </strong>
                                    </td>
                                    <td>Bungkus</td>
                                    <td>Harian</td>
                                </tr>
                                <tr>
                                    <td style="text-align: center;">4</td>
                                    <td>Air minum (air mineral)</td>
                                    <td><?php echo $pengungsi_umum; ?></td>
                                    <td>4</td>
                                    <td>
                                        <strong>
                                            <?php echo number_format($air_minum, 0, ".", "."); ?>
                                        </strong>
                                    </td>
                                    <td>Liter</td>
                                    <td>Harian</td>
                                </tr>
                                <tr>
                                    <td style="text-align: center;"><strong>B</strong></td>
                                    <td colspan="6"><strong>Pakaian</strong></td>
                                </tr>
                                <tr>
                                    <td style="text-align: center;">1</td>
                                    <td>Ukuran balita</td>
                                    <td><?php echo $pengungsi_balita; ?></td>
                                    <td>1</td>
                                    <td>
                                        <strong>
                                            <?php echo number_format($pakaian_balita, 0, ".", "."); ?>
                                        </strong>
                                    </td>
                                    <td>Setel</td>
                                    <td>Harian</td>
                                </tr>
                                <tr>
                                    <td style="text-align: center;">2</td>
                                    <td colspan="6">Ukuran anak-anak:</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>&nbsp;&nbsp;>> Laki-laki</td>
                                    <td><?php echo $pl_anak_anak; ?></td>
                                    <td>1</td>
                                    <td>
                                        <strong>
                                            <?php echo number_format($pakaian_anak_l, 0, ".", "."); ?>
                                        </strong>
                                    </td>
                                    <td>Setel</td>
                                    <td>Harian</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>&nbsp;&nbsp;>> Perempuan</td>
                                    <td><?php echo $pp_anak_anak; ?></td>
                                    <td>1</td>
                                    <td>
                                        <strong>
                                            <?php echo number_format($pakaian_anak_p, 0, ".", "."); ?>
                                        </strong>
                                    </td>
                                    <td>Setel</td>
                                    <td>Harian</td>
                                </tr>
                                <tr>
                                    <td style="text-align: center;">3</td>
                                    <td colspan="6">Ukuran remaja:</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>&nbsp;&nbsp;>> Laki-laki</td>
                                    <td><?php echo $pl_remaja; ?></td>
                                    <td>1</td>
                                    <td>
                                        <strong>
                                            <?php echo number_format($pakaian_remaja_l, 0, ".", "."); ?>
                                        </strong>
                                    </td>
                                    <td>Setel</td>
                                    <td>Harian</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>&nbsp;&nbsp;>> Perempuan</td>
                                    <td><?php echo $pp_remaja; ?></td>
                                    <td>1</td>
                                    <td>
                                        <strong>
                                            <?php echo number_format($pakaian_remaja_p, 0, ".", "."); ?>
                                        </strong>
                                    </td>
                                    <td>Setel</td>
                                    <td>Harian</td>
                                </tr>
                                <tr>
                                    <td style="text-align: center;">4</td>
                                    <td colspan="6">Ukuran dewasa:</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>&nbsp;&nbsp;>> Laki-laki</td>
                                    <td><?php echo $dewasa_lansia_l; ?></td>
                                    <td>1</td>
                                    <td>
                                        <strong>
                                            <?php echo number_format($pakaian_dewasa_l, 0, ".", "."); ?>
                                        </strong>
                                    </td>
                                    <td>Setel</td>
                                    <td>Harian</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>&nbsp;&nbsp;>> Perempuan</td>
                                    <td><?php echo $dewasa_lansia_p; ?></td>
                                    <td>1</td>
                                    <td>
                                        <strong>
                                            <?php echo number_format($pakaian_dewasa_p, 0, ".", "."); ?>
                                        </strong>
                                    </td>
                                    <td>Setel</td>
                                    <td>Harian</td>
                                </tr>
                                <tr>
                                    <td style="text-align: center;"><strong>C</strong></td>
                                    <td colspan="6"><strong>Peralatan Tidur dan Kebutuhan Sehari-hari</strong></td>
                                </tr>
                                <tr>
                                    <td style="text-align: center;">1</td>
                                    <td>Selimut</td>
                                    <td><?php echo $pengungsi_umum; ?></td>
                                    <td>1</td>
                                    <td>
                                        <strong>
                                            <?php echo number_format($selimut, 0, ".", "."); ?>
                                        </strong>
                                    </td>
                                    <td>Buah</td>
                                    <td>1 kali</td>
                                </tr>
                                <tr>
                                    <td style="text-align: center;">2</td>
                                    <td>Sleeping bag (untuk pengungsi lansia)</td>
                                    <td><?php echo $pengungsi_lansia; ?></td>
                                    <td>1</td>
                                    <td>
                                        <strong>
                                            <?php echo number_format($sleeping_bag, 0, ".", "."); ?>
                                        </strong>
                                    </td>
                                    <td>Buah</td>
                                    <td>1 kali</td>
                                </tr>
                                <tr>
                                    <td style="text-align: center;">3</td>
                                    <td>Matras</td>
                                    <td><?php echo $korban_mengungsi; ?></td>
                                    <td>1</td>
                                    <td>
                                        <strong>
                                            <?php echo number_format($matras, 0, ".", "."); ?>
                                        </strong>
                                    </td>
                                    <td>Buah</td>
                                    <td>1 kali</td>
                                </tr>
                                <tr>
                                    <td style="text-align: center;">4</td>
                                    <td>Sabun mandi (sabun batang)</td>
                                    <td><?php echo $pengungsi_umum; ?></td>
                                    <td>3</td>
                                    <td>
                                        <strong>
                                            <?php echo number_format($sabun_mandi, 0, ".", "."); ?>
                                        </strong>
                                    </td>
                                    <td>Batang</td>
                                    <td>Bulanan</td>
                                </tr>
                                <tr>
                                    <td style="text-align: center;">5</td>
                                    <td>Sabun cuci (200 gram)</td>
                                    <td><?php echo $korban_mengungsi; ?></td>
                                    <td>1</td>
                                    <td>
                                        <strong>
                                            <?php echo number_format($sabun_cuci, 0, ".", "."); ?>
                                        </strong>
                                    </td>
                                    <td>Bungkus</td>
                                    <td>Bulanan</td>
                                </tr>
                                <tr>
                                    <td style="text-align: center;">6</td>
                                    <td>Paket kesehatan/obat-obatan</td>
                                    <td><?php echo $korban_luka; ?></td>
                                    <td>0,10</td>
                                    <td>
                                        <strong>
                                            <?php echo number_format($paket_kesehatan, 0, ".", "."); ?>
                                        </strong>
                                    </td>
                                    <td>Paket</td>
                                    <td>Peristiwa</td>
                                </tr>
                                <tr>
                                    <td style="text-align: center;"><strong>D</strong></td>
                                    <td colspan="6"><strong>Kebutuhan Khusus</strong></td>
                                </tr>
                                <tr>
                                    <td style="text-align: center;">1</td>
                                    <td>Popok cuci/sekali pakai untuk bayi</td>
                                    <td><?php echo $pengungsi_balita; ?></td>
                                    <td>12</td>
                                    <td>
                                        <strong>
                                            <?php echo number_format($popok_bayi, 0, ".", "."); ?>
                                        </strong>
                                    </td>
                                    <td>Pcs</td>
                                    <td>Harian</td>
                                </tr>
                                <tr>
                                    <td style="text-align: center;">2</td>
                                    <td>Susu formula</td>
                                    <td><?php echo $pengungsi_balita; ?></td>
                                    <td>990</td>
                                    <td>
                                        <strong>
                                            <?php echo number_format($susu_bayi, 0, ".", "."); ?>
                                        </strong>
                                    </td>
                                    <td>Gram</td>
                                    <td>Harian</td>
                                </tr>
                                <tr>
                                    <td style="text-align: center;">3</td>
                                    <td>Selimut untuk bayi (100 x 70 cm)</td>
                                    <td><?php echo $pengungsi_balita; ?></td>
                                    <td>1</td>
                                    <td>
                                        <strong>
                                            <?php echo number_format($selimut_bayi, 0, ".", "."); ?>
                                        </strong>
                                    </td>
                                    <td>Buah</td>
                                    <td>1 kali</td>
                                </tr>
                                <tr>
                                    <td style="text-align: center;">4</td>
                                    <td>Pembalut</td>
                                    <td><?php echo $pp_remaja; ?></td>
                                    <td>2</td>
                                    <td>
                                        <strong>
                                            <?php echo number_format($pembalut, 0, ".", "."); ?>
                                        </strong>
                                    </td>
                                    <td>Pcs</td>
                                    <td>Harian</td>
                                </tr>
                                <tr>
                                    <td style="text-align: center;">5</td>
                                    <td>Kantong mayat</td>
                                    <td><?php echo $meninggal_hilang; ?></td>
                                    <td>1</td>
                                    <td>
                                        <strong>
                                            <?php echo number_format($kantong_mayat, 0, ".", "."); ?>
                                        </strong>
                                    </td>
                                    <td>Buah</td>
                                    <td>Peristiwa</td>
                                </tr>
                                <tr>
                                    <td style="text-align: center;">6</td>
                                    <td>Kain kafan</td>
                                    <td><?php echo $meninggal_hilang; ?></td>
                                    <td>1</td>
                                    <td>
                                        <strong>
                                            <?php echo number_format($kain_kafan, 0, ".", "."); ?>
                                        </strong>
                                    </td>
                                    <td>Buah</td>
                                    <td>Peristiwa</td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
        <!--| End: Rincian Bantuan Logistik yang Dibutuhkan (Dalam Bentuk Satuan) |-->

        <tr>
            <td height="20px"></td>
        </tr>

        <!--| Start: Kolom Catatan |-->
        <tr>
            <td>
                <table width="100%">
                    <tr>
                        <th colspan="2" style="text-align: left">Catatan:</th>
                    </tr>
                    <tr>
                        <td align="right" width="30px" valign="top">*</td>
                        <td style="text-align: justify">
                            Bantuan logistik dalam bentuk paket dapat didistribusikan apabila logistik tersebut
                            tersedia di BPBD tempat terjadi peristiwa bencana. Bantuan Paket Sandang dan Paket
                            Pangan masing-masing diberikan 1 paket per keluarga (5 orang). Bantuan logistik dalam
                            bentuk paket lebih ditujukan untuk memenuhi kebutuhan korban terdampak yang tidak
                            mengungsi.
                        </td>
                    </tr>
                    <tr>
                        <td align="right" valign="top">**</td>
                        <td style="text-align: justify">
                            Bantuan logistik dalam bentuk satuan diprioritaskan untuk korban bencana yang mengungsi.
                            Total kebutuhan setiap item mengacu pada standar minimum yang sudah diatur dalam
                            <strong>PERKA BNPB Nomor 18 Tahun 2009 tentang Pedoman Standarisasi
                            Logistik Penanggulangan Bencana</strong>.
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
        <!--| End: Kolom Catatan |-->

        <tr>
            <td height="50px"></td>
        </tr>

        <!--| Start: Kolom Catatan |-->
        <tr>
            <td>
                <table width="100%" class="informasi-cetak">
                    <tr>
                        <td style="text-align: center"><?php date_default_timezone_set('Asia/Jakarta'); ?>
                            <i>--- Laporan ini dicetak oleh <strong><?php echo $_SESSION['username']; ?></strong>
                                pada tanggal <strong><?php echo date('d'.'/'.'m'.'/'.'Y'); ?></strong>
                                pukul <strong><?php echo date('H:i'); ?> WIB</strong> ---
                            </i>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
        <!--| End: Kolom Catatan |-->

    </table>
</div>
</body>
</html>

<?php
$namaInisial = $KtaLaporanCetak->tampil_peristiwa($id_peristiwa)->fetchObject();
$fileName = $namaInisial->nama_inisial;

$html = ob_get_contents();
ob_end_clean();
$mpdf->WriteHTML(utf8_encode($html));
ob_clean();
$mpdf->Output("Laporan Analisis - ".$fileName.".pdf", 'D');
}
else {
    header("location: ../../index.php?akses=ditolak");
}
?>