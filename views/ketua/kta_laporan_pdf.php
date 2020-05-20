<?php
/**
 * Created by PhpStorm.
 * User: Ekky Ardian Fitran
 * Date: 18/04/2020
 * Time: 23:48
 */

session_start();
ob_start();
require_once('../../config/+koneksi.php');
require_once('../../models/database.php');
include "../../models/ketua/KtaLaporanCetak.php";

$connection = new Database($host, $user, $pass, $database);
$KtaLaporanCetak = new KtaLaporanCetak($connection);

if ($_SESSION['hak_akses']!='ketua') {
    header("location: ../../login.php?akses=ditolak");
}

$id_peristiwa = $_SESSION['id_peristiwa']; // Key id_persitiwa

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

    <!-- File php -->

    <!-- Personal CSS -->
    <link rel="stylesheet" href="../../assets/css/personal-style.css" type="text/css" />

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

<body>
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
                            $data_peristiwa = $KtaLaporanCetak->tampil_peristiwa($_SESSION['id_peristiwa'])
                                ->fetch_object();
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
                                    <?php echo strtoupper($_SESSION['paket_prioritas']); ?>
                                </td>
                            </tr>
                            <tr>
                                <td>Paket Pangan</td>
                                <td>:</td>
                                <td><?php echo $_SESSION['paket_pangan']; ?></td>
                            </tr>
                            <tr>
                                <td>Paket Sandang</td>
                                <td>:</td>
                                <td><?php echo $_SESSION['paket_sandang']; ?></td>
                            </tr>
                            <tr>
                                <td>Paket Kematian</td>
                                <td>:</td>
                                <td><?php echo $_SESSION['paket_kematian']; ?></td>
                            </tr>
                            <tr>
                                <td>Paket Lainnya</td>
                                <td>:</td>
                                <td><?php echo $_SESSION['paket_lainnya']; ?></td>
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
                                <td>Jumlah Korban Terdampak</td>
                                <td>:</td>
                                <td><?php echo $_SESSION['korban_terdampak']; ?> orang</td>
                            </tr>
                            <tr>
                                <td>Jumlah Korban Mengungsi</td>
                                <td>:</td>
                                <td><?php echo $_SESSION['korban_mengungsi']; ?> orang</td>
                            </tr>
                            <tr>
                                <td>Jumlah Korban Luka</td>
                                <td>:</td>
                                <td><?php echo $_SESSION['korban_luka']; ?> orang</td>
                            </tr>
                            <tr>
                                <td>Jumlah Korban Menghilag</td>
                                <td>:</td>
                                <td><?php echo $_SESSION['korban_hilang']; ?> orang</td>
                            </tr>
                            <tr>
                                <td>Jumlah Korban Meninggal</td>
                                <td>:</td>
                                <td><?php echo $_SESSION['korban_meninggal']; ?> orang</td>
                            </tr>
                            <tr>
                                <td>Kondisi Pasca Bencana</td>
                                <td>:</td>
                                <td><?php echo $_SESSION['pasca_bencana']; ?></td>
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
                                <td><?php echo $_SESSION['pl_balita']; ?> orang</td>
                            </tr>
                            <tr>
                                <td>Anak-anak</td>
                                <td>:</td>
                                <td><?php echo $_SESSION['pl_anak_anak']; ?> orang</td>
                            </tr>
                            <tr>
                                <td>Remaja</td>
                                <td>:</td>
                                <td><?php echo $_SESSION['pl_remaja']; ?> orang</td>
                            </tr>
                            <tr>
                                <td>Dewasa</td>
                                <td>:</td>
                                <td><?php echo $_SESSION['pl_dewasa']; ?> orang</td>
                            </tr>
                            <tr>
                                <td>Lansia</td>
                                <td>:</td>
                                <td><?php echo $_SESSION['pl_lansia']; ?> orang</td>
                            </tr>
                            <tr>
                                <td><strong>Total Sub A</strong></td>
                                <td><strong>:</strong></td>
                                <td><strong><?php echo $_SESSION['pl']; ?> orang</strong></td>
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
                                <td><?php echo $_SESSION['pp_balita']; ?> orang</td>
                            </tr>
                            <tr>
                                <td>Anak-anak</td>
                                <td>:</td>
                                <td><?php echo $_SESSION['pp_anak_anak']; ?> orang</td>
                            </tr>
                            <tr>
                                <td>Remaja</td>
                                <td>:</td>
                                <td><?php echo $_SESSION['pp_remaja']; ?> orang</td>
                            </tr>
                            <tr>
                                <td>Dewasa</td>
                                <td>:</td>
                                <td><?php echo $_SESSION['pp_dewasa']; ?> orang</td>
                            </tr>
                            <tr>
                                <td>Lansia</td>
                                <td>:</td>
                                <td><?php echo $_SESSION['pp_lansia']; ?> orang</td>
                            </tr>
                            <tr>
                                <td><strong>Total Sub A</strong></td>
                                <td><strong>:</strong></td>
                                <td><strong><?php echo $_SESSION['pp']; ?> orang</strong></td>
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
                                        $total_pengungsi = $_SESSION['pl'] + $_SESSION['pp'];
                                        echo $total_pengungsi." ";
                                        ?>
                                        orang</strong>
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
                                <th colspan="3"><strong>Kebutuhan Logistik: Paket *)</strong></th>
                            </tr>

                            <tr>
                                <td>Paket Pangan</td>
                                <td>:</td>
                                <td><?php echo $_SESSION['kebutuhan_pp']; ?> Paket</td>
                            </tr>
                            <tr>
                                <td>Paket Sandang</td>
                                <td>:</td>
                                <td><?php echo $_SESSION['kebutuhan_ps']; ?> Paket</td>
                            </tr>
                            <tr>
                                <td>Paket Kematian</td>
                                <td>:</td>
                                <td><?php echo $_SESSION['kebutuhan_pk']; ?> Paket</td>
                            </tr>
                            <tr>
                                <td>Paket Lainnya</td>
                                <td>:</td>
                                <td><?php echo $_SESSION['kebutuhan_pl']; ?> Paket</td>
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
                    <th>Kebutuhan Logistik: Satuan **)</th>
                </tr>
                <tr>
                    <td>
                        <table width="800px" class="logistik-satuan">
                            <tr>
                                <th align="center"><strong>No</strong></th>
                                <th><strong>Deskripsi</strong></th>
                                <th align="center"><strong>Volume</strong></th>
                                <th align="center"><strong>Faktor <br />Pengali</strong></th>
                                <th align="center"><strong>Total <br />Kebutuhan</strong></th>
                                <th align="center"><strong>Satuan</strong></th>
                                <th align="center"><strong>Periode</strong></th>
                            </tr>
                            <tr>
                                <td align="center"><strong>A</strong></td>
                                <td colspan="6"><strong>Bahan Makanan dan Minuman</strong></td>
                            </tr>
                            <tr>
                                <td align="center">1</td>
                                <td>Beras</td>
                                <td align="center"><?php echo $_SESSION['pengungsi_umum']; ?></td>
                                <td align="center">0,4</td>
                                <td align="center">
                                    <strong>
                                        <?php echo number_format($_SESSION['beras'], 0, ".", "."); ?>
                                    </strong>
                                </td>
                                <td align="center">Liter</td>
                                <td align="center">Harian</td>
                            </tr>
                            <tr>
                                <td align="center">2</td>
                                <td>Telur/Lauk pauk</td>
                                <td align="center"><?php echo $_SESSION['pengungsi_umum']; ?></td>
                                <td align="center">3</td>
                                <td align="center">
                                    <strong>
                                        <?php echo number_format($_SESSION['telur'], 0, ".", "."); ?>
                                    </strong>
                                </td>
                                <td align="center">Butir/buah</td>
                                <td align="center">Harian</td>
                            </tr>
                            <tr>
                                <td align="center">3</td>
                                <td>Mie instan</td>
                                <td align="center"><?php echo $_SESSION['pengungsi_umum']; ?></td>
                                <td align="center">3</td>
                                <td align="center">
                                    <strong>
                                        <?php echo number_format($_SESSION['mie_instan'], 0, ".", "."); ?>
                                    </strong>
                                </td>
                                <td align="center">Bungkus</td>
                                <td align="center">Harian</td>
                            </tr>
                            <tr>
                                <td align="center">4</td>
                                <td>Air minum (air mineral)</td>
                                <td align="center"><?php echo $_SESSION['pengungsi_umum']; ?></td>
                                <td align="center">4</td>
                                <td align="center">
                                    <strong>
                                        <?php echo number_format($_SESSION['air_minum'], 0, ".", "."); ?>
                                    </strong>
                                </td>
                                <td align="center">Liter</td>
                                <td align="center">Harian</td>
                            </tr>
                            <tr>
                                <td align="center"><strong>B</strong></td>
                                <td colspan="6"><strong>Pakaian</strong></td>
                            </tr>
                            <tr>
                                <td align="center">1</td>
                                <td>Ukuran balita</td>
                                <td align="center"><?php echo $_SESSION['total_balita']; ?></td>
                                <td align="center">1</td>
                                <td align="center">
                                    <strong>
                                        <?php echo number_format($_SESSION['pakaian_balita'], 0, ".", "."); ?>
                                    </strong>
                                </td>
                                <td align="center">Setel</td>
                                <td align="center">Harian</td>
                            </tr>
                            <tr>
                                <td align="center">2</td>
                                <td>Ukuran anak-anak:</td>
                                <td align="center"></td>
                                <td align="center"></td>
                                <td align="center"></td>
                                <td align="center"></td>
                                <td align="center"></td>
                            </tr>
                            <tr>
                                <td align="center"></td>
                                <td>&nbsp;&nbsp;>> Laki-laki</td>
                                <td align="center"><?php echo $_SESSION['pl_anak_anak']; ?></td>
                                <td align="center">1</td>
                                <td align="center">
                                    <strong>
                                        <?php echo number_format($_SESSION['pakaian_anak_l'], 0, ".", "."); ?>
                                    </strong>
                                </td>
                                <td align="center">Setel</td>
                                <td align="center">Harian</td>
                            </tr>
                            <tr>
                                <td align="center"></td>
                                <td>&nbsp;&nbsp;>> Perempuan</td>
                                <td align="center"><?php echo $_SESSION['pp_anak_anak']; ?></td>
                                <td align="center">1</td>
                                <td align="center">
                                    <strong>
                                        <?php echo number_format($_SESSION['pakaian_anak_p'], 0, ".", "."); ?>
                                    </strong>
                                </td>
                                <td align="center">Setel</td>
                                <td align="center">Harian</td>
                            </tr>
                            <tr>
                                <td align="center">3</td>
                                <td>Ukuran remaja:</td>
                                <td align="center"></td>
                                <td align="center"></td>
                                <td align="center"></td>
                                <td align="center"></td>
                                <td align="center"></td>
                            </tr>
                            <tr>
                                <td align="center"></td>
                                <td>&nbsp;&nbsp;>> Laki-laki</td>
                                <td align="center"><?php echo $_SESSION['pl_remaja']; ?></td>
                                <td align="center">1</td>
                                <td align="center">
                                    <strong>
                                        <?php echo number_format($_SESSION['pakaian_remaja_l'], 0, ".", "."); ?>
                                    </strong>
                                </td>
                                <td align="center">Setel</td>
                                <td align="center">Harian</td>
                            </tr>
                            <tr>
                                <td align="center"></td>
                                <td>&nbsp;&nbsp;>> Perempuan</td>
                                <td align="center"><?php echo $_SESSION['pp_remaja']; ?></td>
                                <td align="center">1</td>
                                <td align="center">
                                    <strong>
                                        <?php echo number_format($_SESSION['pakaian_remaja_p'], 0, ".", "."); ?>
                                    </strong>
                                </td>
                                <td align="center">Setel</td>
                                <td align="center">Harian</td>
                            </tr>
                            <tr>
                                <td align="center">4</td>
                                <td>Ukuran dewasa:</td>
                                <td align="center"></td>
                                <td align="center"></td>
                                <td align="center"></td>
                                <td align="center"></td>
                                <td align="center"></td>
                            </tr>
                            <tr>
                                <td align="center"></td>
                                <td>&nbsp;&nbsp;>> Laki-laki</td>
                                <td align="center"><?php echo $_SESSION['pl_dewasa_lansia']; ?></td>
                                <td align="center">1</td>
                                <td align="center">
                                    <strong>
                                        <?php echo number_format($_SESSION['pakaian_dewasa_l'], 0, ".", "."); ?>
                                    </strong>
                                </td>
                                <td align="center">Setel</td>
                                <td align="center">Harian</td>
                            </tr>
                            <tr>
                                <td align="center"></td>
                                <td>&nbsp;&nbsp;>> Perempuan</td>
                                <td align="center"><?php echo $_SESSION['pp_dewasa_lansia']; ?></td>
                                <td align="center">1</td>
                                <td align="center">
                                    <strong>
                                        <?php echo number_format($_SESSION['pakaian_dewasa_p'], 0, ".", "."); ?>
                                    </strong>
                                </td>
                                <td align="center">Setel</td>
                                <td align="center">Harian</td>
                            </tr>
                            <tr>
                                <td align="center"><strong>C</strong></td>
                                <td colspan="6"><strong>Kebutuhan Khusus untuk Korban Mengungsi</strong></td>
                            </tr>
                            <tr>
                                <td align="center">1</td>
                                <td>Selimut</td>
                                <td align="center"><?php echo $_SESSION['pengungsi_umum']; ?></td>
                                <td align="center">1</td>
                                <td align="center">
                                    <strong>
                                        <?php echo number_format($_SESSION['selimut'], 0, ".", "."); ?>
                                    </strong>
                                </td>
                                <td align="center">Buah</td>
                                <td align="center">1 kali</td>
                            </tr>
                            <tr>
                                <td align="center">2</td>
                                <td>Sleeping bag (untuk pengungsi lansia)</td>
                                <td align="center"><?php echo $_SESSION['total_lansia']; ?></td>
                                <td align="center">1</td>
                                <td align="center">
                                    <strong>
                                        <?php echo number_format($_SESSION['sleeping_bag'], 0, ".", "."); ?>
                                    </strong>
                                </td>
                                <td align="center">Buah</td>
                                <td align="center">1 kali</td>
                            </tr>
                            <tr>
                                <td align="center">3</td>
                                <td>Matras</td>
                                <td align="center"><?php echo $_SESSION['total_pengungsi']; ?></td>
                                <td align="center">1</td>
                                <td align="center">
                                    <strong>
                                        <?php echo number_format($_SESSION['matras'], 0, ".", "."); ?>
                                    </strong>
                                </td>
                                <td align="center">Buah</td>
                                <td align="center">1 kali</td>
                            </tr>
                            <tr>
                                <td align="center">4</td>
                                <td>Sabun mandi (sabun batang)</td>
                                <td align="center"><?php echo $_SESSION['pengungsi_umum']; ?></td>
                                <td align="center">3</td>
                                <td align="center">
                                    <strong>
                                        <?php echo number_format($_SESSION['sabun_mandi'], 0, ".", "."); ?>
                                    </strong>
                                </td>
                                <td align="center">Batang</td>
                                <td align="center">Bulanan</td>
                            </tr>
                            <tr>
                                <td align="center">5</td>
                                <td>Sabun cuci (200 gram)</td>
                                <td align="center"><?php echo $_SESSION['total_pengungsi']; ?></td>
                                <td align="center">1</td>
                                <td align="center">
                                    <strong>
                                        <?php echo number_format($_SESSION['sabun_cuci'], 0, ".", "."); ?>
                                    </strong>
                                </td>
                                <td align="center">Bungkus</td>
                                <td align="center">Bulanan</td>
                            </tr>
                            <tr>
                                <td align="center">6</td>
                                <td>Paket kesehatan/obat-obatan</td>
                                <td align="center"><?php echo $_SESSION['korban_luka']; ?></td>
                                <td align="center">0,10</td>
                                <td align="center">
                                    <strong>
                                        <?php echo number_format($_SESSION['paket_kesehatan'], 0, ".", "."); ?>
                                    </strong>
                                </td>
                                <td align="center">Paket</td>
                                <td align="center">Peristiwa</td>
                            </tr>
                            <tr>
                                <td align="center"><strong>D</strong></td>
                                <td colspan="6"><strong>Kebutuhan Khusus Lainnya</strong></td>
                            </tr>
                            <tr>
                                <td align="center">1</td>
                                <td>Popok cuci/sekali pakai untuk bayi</td>
                                <td align="center"><?php echo $_SESSION['total_balita']; ?></td>
                                <td align="center">12</td>
                                <td align="center">
                                    <strong>
                                        <?php echo number_format($_SESSION['popok_bayi'], 0, ".", "."); ?>
                                    </strong>
                                </td>
                                <td align="center">Pcs</td>
                                <td align="center">Harian</td>
                            </tr>
                            <tr>
                                <td align="center">2</td>
                                <td>Susu formula</td>
                                <td align="center"><?php echo $_SESSION['total_balita']; ?></td>
                                <td align="center">990</td>
                                <td align="center">
                                    <strong>
                                        <?php echo number_format($_SESSION['susu_bayi'], 0, ".", "."); ?>
                                    </strong>
                                </td>
                                <td align="center">Gram</td>
                                <td align="center">Harian</td>
                            </tr>
                            <tr>
                                <td align="center">3</td>
                                <td>Selimut untuk bayi (100 x 70 cm)</td>
                                <td align="center"><?php echo $_SESSION['total_balita']; ?></td>
                                <td align="center">1</td>
                                <td align="center">
                                    <strong>
                                        <?php echo number_format($_SESSION['selimut_bayi'], 0, ".", "."); ?>
                                    </strong>
                                </td>
                                <td align="center">Buah</td>
                                <td align="center">1 kali</td>
                            </tr>
                            <tr>
                                <td align="center">4</td>
                                <td>Pembalut</td>
                                <td align="center"><?php echo $_SESSION['pp_remaja']; ?></td>
                                <td align="center">2</td>
                                <td align="center">
                                    <strong>
                                        <?php echo number_format($_SESSION['pembalut'], 0, ".", "."); ?>
                                    </strong>
                                </td>
                                <td align="center">Pcs</td>
                                <td align="center">Harian</td>
                            </tr>
                            <tr>
                                <td align="center">5</td>
                                <td>Kantong mayat</td>
                                <td align="center"><?php echo $_SESSION['meninggal_hilang']; ?></td>
                                <td align="center">1</td>
                                <td align="center">
                                    <strong>
                                        <?php echo number_format($_SESSION['kantong_mayat'], 0, ".", "."); ?>
                                    </strong>
                                </td>
                                <td align="center">Buah</td>
                                <td align="center">Peristiwa</td>
                            </tr>
                            <tr>
                                <td align="center">6</td>
                                <td>Kain kafan</td>
                                <td align="center"><?php echo $_SESSION['meninggal_hilang']; ?></td>
                                <td align="center">1</td>
                                <td align="center">
                                    <strong>
                                        <?php echo number_format($_SESSION['kain_kafan'], 0, ".", "."); ?>
                                    </strong>
                                </td>
                                <td align="center">Buah</td>
                                <td align="center">Peristiwa</td>
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
                    <td align="right" width="30px" valign="top">*)</td>
                    <td style="text-align: justify">
                        Bantuan logistik dalam bentuk paket dapat didistribusikan apabila logistik tersebut
                        tersedia di BPBD tempat terjadi peristiwa bencana. Bantuan Paket Sandang dan Paket
                        Pangan masing-masing diberikan 1 paket per keluarga.
                    </td>
                </tr>
                <tr>
                    <td align="right" valign="top">**)</td>
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
</body>
</html>
<?php
$html = ob_get_contents();
ob_end_clean();
$mpdf->WriteHTML(utf8_encode($html));
ob_clean();
$mpdf->Output();
?>
