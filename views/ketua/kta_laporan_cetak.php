<?php
/**
 * Created by PhpStorm.
 * User: Ekky Ardian Fitran
 * Date: 18/04/2020
 * Time: 23:48
 */

ob_start();
require_once('../../config/+koneksi.php');
require_once('../../models/database.php');
include "../../models/ketua/KtaLaporanCetak.php";

$connection = new Database($host, $user, $pass, $database);
$KtaLaporanCetak = new KtaLaporanCetak($connection);

session_start();

if ($_SESSION['hak_akses']!='ketua') {
    header("location: ../../login.php?akses=ditolak");
}

$id = $_GET['id'];

// Start: Mencari nilai analisis prioritas

// End: Mencari nilai analisis prioritas
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


    <!-- bootstrap & fontawesome -->
    <link rel="stylesheet" href="../../assets/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="../../assets/font-awesome/4.5.0/css/font-awesome.min.css"/>

    <!-- text fonts -->
    <link rel="stylesheet" href="../../assets/css/fonts.googleapis.com.css"/>

    <!-- ace styles -->
    <link rel="stylesheet" href="../../assets/css/ace.min.css" class="ace-main-stylesheet" id="main-ace-style"/>

    <!--[if lte IE 9]>
    <link rel="stylesheet" href="../../assets/css/ace-part2.min.css" class="ace-main-stylesheet"/>
    <![endif]-->
    <link rel="stylesheet" href="../../assets/css/ace-skins.min.css"/>
    <link rel="stylesheet" href="../../assets/css/ace-rtl.min.css"/>

    <!--[if lte IE 9]>
    <link rel="stylesheet" href="../../assets/css/ace-ie.min.css"/>
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
<div class="main-container">
    <table width="800px" border="1px">
        <!--| Start: Kop Laporan |-->
        <tr>
            <td>
                <table width="800px" border="1px">
                    <tr>
                        <td rowspan="3">LOGO</td>
                        <td>BADAN PENANGGULANGAN BENCANA DAERAH (BPBD)</td>
                    </tr>
                    <tr>
                        <td>KOTA BOGOR</td>
                    </tr>
                    <tr>
                        <td>Jl. Pool Bina Marga No. 2, RT. 02 RW. 01, Kayu Manis, Kec. Tanah Sareal, Kota Bogor 16169</td>
                    </tr>
                    <tr>
                        <td colspan="2"><hr /></td>
                    </tr>
                </table>
            </td>
        </tr>
        <!--| End: Kop Laporan |-->

        <!--| Start: Deskripsi Peristiwa & Logistik Prioritas |-->
        <tr>
            <td>
                <table border="1">
                    <tr>
                        <td width="580px">
                            <!--| Start: Deskripsi Peristiwa |-->
                            <table width="100%" border="1px">
                                <tr>
                                    <td colspan="3">Deskripsi Peristiwa Bencana</td>
                                </tr>
                                <?php
                                $data_peristiwa = $KtaLaporanCetak->tampil_peristiwa($_GET['id'])->fetch_object();
                                ?>
                                <tr>
                                    <td>Nama Inisial</td>
                                    <td>:</td>
                                    <td><?php echo $data_peristiwa->nama_inisial; ?></td>
                                </tr>
                                <tr>
                                    <td>Jenis Bencana</td>
                                    <td>:</td>
                                    <td><?php echo $data_peristiwa->jenis_bencana; ?></td>
                                </tr>
                                <tr>
                                    <td>Cakupan Lokasi</td>
                                    <td>:</td>
                                    <td><?php echo $data_peristiwa->cakupan_lokasi; ?></td>
                                </tr>
                                <tr>
                                    <td>Waktu Kejadian</td>
                                    <td>:</td>
                                    <td>
                                        Tanggal <?php echo $data_peristiwa->tanggal_peristiwa; ?><br />
                                        Jam <?php echo $data_peristiwa->jam_peristiwa; ?> WIB
                                    </td>
                                </tr>
                            </table>
                            <!--| End: Deskripsi Peristiwa |-->
                        </td>

                        <td width="20px">&nbsp;</td>

                        <td width="200px">
                            <!--| Start: Logistik Prioritas |-->
                            <table width="100%" border="1">
                                <tr>
                                    <td colspan="3">Logistik Prioritas:</td>
                                </tr>
                                <tr>
                                    <td colspan="3">Paket Sandang</td>
                                </tr>
                                <tr>
                                    <td colspan="3">&nbsp;</td>
                                </tr>
                                <tr>
                                    <td>Paket Pangan</td>
                                    <td>:</td>
                                    <td>100</td>
                                </tr>
                                <tr>
                                    <td>Paket Sandang</td>
                                    <td>:</td>
                                    <td>100</td>
                                </tr>
                                <tr>
                                    <td>Paket Kematian</td>
                                    <td>:</td>
                                    <td>100</td>
                                </tr>
                                <tr>
                                    <td>Paket Lainnya</td>
                                    <td>:</td>
                                    <td>100</td>
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

        <!--| Start: Laporan Hasil Observasi Lapangan |-->
        <tr>
            <td>
                <table width="800px" border="1">
                    <tr>
                        <td colspan="6">Laporan Hasil Observasi Lapangan</td>
                    </tr>
                    <tr>
                        <th>No</th>
                        <th>Deskripsi</th>
                        <th>Satuan</th>
                        <th>Vol.</th>
                        <th>Pengali</th>
                        <th>Total Kebutuhan</th>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                </table>
            </td>
        </tr>
        <!--| End: Laporan Hasil Observasi Lapangan |-->

        <!--| Start: Rincian Logistik yang Dibutuhkan |-->
        <tr>
            <td></td>
        </tr>
        <!--| End: Rincian Logistik yang Dibutuhkan |-->
    </table>
</div>
</body>
</html>
