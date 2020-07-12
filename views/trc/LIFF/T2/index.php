<?php
/**
 * Created by PhpStorm.
 * User: Ekky Ardian Fitran
 * Date: 10/07/2020
 * Time: 16:09
 */

require_once ('../../../../config/+koneksi.php');
require_once ('../../../../models/database.php');
require_once ('../../../../models/trc/liff/LiffLaporanObservasi.php');

$connection = new Database($host, $user, $pass, $database);
$LiffLaporanObservasi = new LiffLaporanObservasi($connection);

if( isset($_POST['ajax']) && isset($_POST['lineID']) ){
    $lineID = $_POST['lineID'];

    // Mengambil ID USER berdasarkan ID LINE yang digunakan untuk login LIFF
    $ambilIdUser = $LiffLaporanObservasi->cek_user($lineID);
    $dataIdUser = $ambilIdUser->fetchObject();
    $hasil_idUser = $dataIdUser->id_user;

    // Mengecek apakah ada penugasan untuk User dengan ID LINE tersebut
    $peristiwa = $LiffLaporanObservasi->cek_peristiwa($hasil_idUser);
    $cekPeristiwa = $peristiwa->rowCount();

    if ($cekPeristiwa > 0) {
        $tampil_peristiwa   = $peristiwa->fetchObject();
        $hasil_peristiwa    = $tampil_peristiwa->id_peristiwa;
        $tampil_observasi   = $LiffLaporanObservasi->tampil_observasi1($hasil_peristiwa)->fetchObject();

        // Mengambil data laporan tahap 1 dari database
        $e_pl_balita        = $tampil_observasi->pl_balita;
        $e_pl_anak_anak     = $tampil_observasi->pl_anak_anak;
        $e_pl_remaja        = $tampil_observasi->pl_remaja;
        $e_pl_dewasa        = $tampil_observasi->pl_dewasa;
        $e_pl_lansia        = $tampil_observasi->pl_lansia;
        $e_pp_balita        = $tampil_observasi->pp_balita;
        $e_pp_anak_anak     = $tampil_observasi->pp_anak_anak;
        $e_pp_remaja        = $tampil_observasi->pp_remaja;
        $e_pp_dewasa        = $tampil_observasi->pp_dewasa;
        $e_pp_lansia        = $tampil_observasi->pp_lansia;

        // Mengambil data peristiwa bencana dari database
        $e_namaInisial      = $tampil_peristiwa->nama_inisial;
        $e_jenisBencana     = $tampil_peristiwa->jenis_bencana;
        $e_cakupanLokasi    = $tampil_peristiwa->cakupan_lokasi;
        $e_tanggalPeristiwa = $tampil_peristiwa->tanggal_peristiwa;
        $e_jamPeristiwa     = $tampil_peristiwa->jam_peristiwa;

        echo "
              <script>
                  // Untuk kebutuhan proses query
                  document.getElementById('txtLineId').value = '$lineID';
                  document.getElementById('txtIdUser').value = '$hasil_idUser';
                  document.getElementById('txtIdPeristiwa').value = '$hasil_peristiwa';
                  
                  // Menampilkan data observasi lapangan tahap 2
                  document.getElementById('pl_balita').value = '$e_pl_balita';
                  document.getElementById('pl_anak_anak').value = '$e_pl_anak_anak';
                  document.getElementById('pl_remaja').value = '$e_pl_remaja';
                  document.getElementById('pl_dewasa').value = '$e_pl_dewasa';
                  document.getElementById('pl_lansia').value = '$e_pl_lansia';
                  document.getElementById('pp_balita').value = '$e_pp_balita';
                  document.getElementById('pp_anak_anak').value = '$e_pp_anak_anak';
                  document.getElementById('pp_remaja').value = '$e_pp_remaja';
                  document.getElementById('pp_dewasa').value = '$e_pp_dewasa';
                  document.getElementById('pp_lansia').value = '$e_pp_lansia';
                  
                  // Menampilkan data peristiwa bencana
                  document.getElementById('namaInisial').textContent = '$e_namaInisial';
                  document.getElementById('jenisBencana').textContent = '$e_jenisBencana';
                  document.getElementById('cakupanLokasi').textContent = '$e_cakupanLokasi';
                  document.getElementById('tanggalPeristiwa').textContent = '$e_tanggalPeristiwa';
                  document.getElementById('jamPeristiwa').textContent = '$e_jamPeristiwa';
              </script>
        ";
    }
    else {
        echo "
              <script>
                  document.getElementById(\"liffAppContent\").classList.add('hidden');
                  document.getElementById(\"tidakAdaPenugasan\").classList.remove('hidden');
              </script>
        ";
    }

    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
    <meta charset="utf-8"/>
    <title>SPBL | BPBD Kota Bogor</title>

    <meta name="description" content=""/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0"/>

    <!-- bootstrap & fontawesome -->
    <link rel="stylesheet" href="../../../../assets/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="../../../../assets/font-awesome/4.5.0/css/font-awesome.min.css"/>

    <!-- text fonts -->
    <link rel="stylesheet" href="../../../../assets/css/fonts.googleapis.com.css"/>

    <!-- ace styles -->
    <link rel="stylesheet" href="../../../../assets/css/ace.min.css" class="ace-main-stylesheet" id="main-ace-style"/>

    <!--[if lte IE 9]>
    <link rel="stylesheet" href="../../../../assets/css/ace-part2.min.css" class="ace-main-stylesheet"/>
    <![endif]-->
    <link rel="stylesheet" href="../../../../assets/css/ace-skins.min.css"/>
    <link rel="stylesheet" href="../../../../assets/css/ace-rtl.min.css"/>

    <!--[if lte IE 9]>
    <link rel="stylesheet" href="../../../../assets/css/ace-ie.min.css"/>
    <![endif]-->

    <!-- ace settings handler -->
    <script src="../../../../assets/js/ace-extra.min.js"></script>

    <!--[if lte IE 8]>
    <script src="../../../../assets/js/html5shiv.min.js"></script>
    <script src="../../../../assets/js/respond.min.js"></script>
    <![endif]-->
</head>

<body class="no-skin">

<div id="navbar" class="navbar navbar-default ace-save-state">
    <div class="navbar-container ace-save-state" id="navbar-container">
        <div class="navbar-header pull-left">
            <a href="?pages=beranda" class="navbar-brand">
                <small>
                    <i class="fa fa-pencil-square-o"></i>
                    Observasi Lapangan | Tahap ke-2
                </small>
            </a>
        </div>
    </div>
</div>

<!--| Start: Content Area |-->
<div class="main-container ace-save-state" id="main-container">
    <div class="main-content">
        <div class="main-content-inner">

            <!-- Header -->
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-lg-12">
                    <div class="alert alert-info">
                        <!-- PROFILE INFO -->
                        <div id="profileInfo" class="textLeft">
                            <table>
                                <tr>
                                    <td rowspan="6">
                                        <div id="profilePictureDiv">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td rowspan="6">&nbsp;&nbsp;</td>
                                </tr>
                                <tr>
                                    <th>LINE Id:</th>
                                </tr>
                                <tr>
                                    <td id="userIdProfileField"></td>
                                </tr>
                                <tr>
                                    <th>Display Name:</th>
                                </tr>
                                <tr>
                                    <td id="displayNameField"></td>
                                </tr>
                            </table>
                        </div>

                        <!-- LOGIN LOGOUT BUTTONS -->
                        <div class="buttonGroup">
                            <button id="liffLoginButton">Log in</button>
                            <button id="liffLogoutButton">Log out</button>
                        </div>
                    </div>
                </div>
            </div>

            <form method='post' action>
                <span id='response'></span>
            </form>

            <!-- Content -->
            <div id="liffAppContent">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-lg-12">
                        <div class="page-content">

                            <!-- NOTIFIKASI PROSES INPUT LAPORAN OBSERVASI -->
                            <?php
                            if(isset($_GET['action'])) {
                                if($_GET['action']=='failed') {
                                    echo "<div class='alert alert-danger'>
                                          <button type='button' class='close' data-dismiss='alert'>
                                              <i class='ace-icon fa fa-times'></i>
                                          </button> Gagal mengirim laporan
                                          </div>
                                    ";
                                } elseif ($_GET['action']=='success') {
                                    echo "<div class='alert alert-success'>
                                         <button type='button' class='close' data-dismiss='alert'>
                                             <i class='ace-icon fa fa-times'></i>
                                         </button> <i class='ace-icon fa fa-check'></i> Laporan terkirim
                                          </div>
                                    ";
                                }
                            }
                            ?>

                            <!-- DATA PERISTIWA BENCANA -->
                            <div class="widget-box">
                                <div class="widget-header">
                                    <h4 class="smaller">Data Bencana:</h4>
                                </div>
                                <div class="widget-body">
                                    <div class="widget-main">
                                        <table>
                                            <tr>
                                                <th class="col-xs-5" valign="top">Nama Inisial</th>
                                                <td class="col-xs-0" valign="top">:</td>
                                                <td class="col-xs-7" id="namaInisial" valign="top"></td>
                                            </tr>
                                            <tr>
                                                <th class="col-xs-5" valign="top">Jenis Bencana</th>
                                                <td class="col-xs-0" valign="top">:</td>
                                                <td class="col-xs-7" id="jenisBencana" valign="top"></td>
                                            </tr>
                                            <tr>
                                                <th class="col-xs-5" valign="top">Cakupan Lokasi</th>
                                                <td class="col-xs-0" valign="top">:</td>
                                                <td class="col-xs-7" id="cakupanLokasi" valign="top"></td>
                                            </tr>
                                            <tr>
                                                <th class="col-xs-5" valign="top">Waktu Kejadian</th>
                                                <td class="col-xs-0" valign="top">:</td>
                                                <td class="col-xs-7" valign="top">
                                                    <span id="tanggalPeristiwa"></span>,
                                                    <span id="jamPeristiwa"></span> WIB
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>

                            <div class="space-10"></div>

                            <!-- HALAMAN INPUT LAPORAN OBSERVASI -->
                            <form action="" method="post" enctype="multipart/form-data">
                                <!-- HIDDEN DATA -->
                                <input type="hidden" id="txtLineId" name="txtLineId" value="" />
                                <input type="hidden" id="txtIdUser" name="txtIdUser" value="" />
                                <input type="hidden" id="txtIdPeristiwa" name="txtIdPeristiwa" value="" />

                                <table>
                                    <tr>
                                        <td colspan="3"><strong>Pengungsi Laki-laki:</strong></td>
                                    </tr>
                                    <tr>
                                        <td class="col-xs-5" style="border-spacing: 1em 0;">
                                            <label for="pl_balita">Balita</label>
                                        </td>
                                        <td class="col-xs-0" style="border-spacing: 1em 0;">:</td>
                                        <td class="col-xs-7" align="center" style="border-spacing: 1em 0;">
                                            <div class="input-group">
                                                <input type="number" class="form-control input-mask-product col-xs-12 col-sm-12 col-lg-12"
                                                       id="pl_balita" name="pl_balita" value="" />
                                                <span class="input-group-addon">Orang</span>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="col-xs-5" style="border-spacing: 1em 0;">
                                            <label for="pl_anak_anak">Anak-anak</label>
                                        </td>
                                        <td class="col-xs-0" style="border-spacing: 1em 0;">:</td>
                                        <td class="col-xs-7" align="center" style="border-spacing: 1em 0;">
                                            <div class="input-group">
                                                <input type="number" class="form-control input-mask-product col-xs-12 col-sm-12 col-lg-12"
                                                       id="pl_anak_anak" name="pl_anak_anak" value="" />
                                                <span class="input-group-addon">Orang</span>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="col-xs-5" style="border-spacing: 1em 0;">
                                            <label for="pl_remaja">Remaja</label>
                                        </td>
                                        <td class="col-xs-0" style="border-spacing: 1em 0;">:</td>
                                        <td class="col-xs-7" align="center" style="border-spacing: 1em 0;">
                                            <div class="input-group">
                                                <input type="number" class="form-control input-mask-product col-xs-12 col-sm-12 col-lg-12"
                                                       id="pl_remaja" name="pl_remaja" value="" />
                                                <span class="input-group-addon">Orang</span>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="col-xs-5" style="border-spacing: 1em 0;">
                                            <label for="pl_dewasa">Dewasa</label>
                                        </td>
                                        <td class="col-xs-0" style="border-spacing: 1em 0;">:</td>
                                        <td class="col-xs-7" align="center" style="border-spacing: 1em 0;">
                                            <div class="input-group">
                                                <input type="number" class="form-control input-mask-product col-xs-12 col-sm-12 col-lg-12"
                                                       id="pl_dewasa" name="pl_dewasa" value="" />
                                                <span class="input-group-addon">Orang</span>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="col-xs-5" style="border-spacing: 1em 0;">
                                            <label for="pl_lansia">Lansia</label>
                                        </td>
                                        <td class="col-xs-0" style="border-spacing: 1em 0;">:</td>
                                        <td class="col-xs-7" align="center" style="border-spacing: 1em 0;">
                                            <div class="input-group">
                                                <input type="number" class="form-control input-mask-product col-xs-12 col-sm-12 col-lg-12"
                                                       id="pl_lansia" name="pl_lansia" value="" />
                                                <span class="input-group-addon">Orang</span>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="3">&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td colspan="3"><strong>Pengungsi Perempuan:</strong></td>
                                    </tr>
                                    <tr>
                                        <td class="col-xs-5" style="border-spacing: 1em 0;">
                                            <label for="pp_balita">Balita</label>
                                        </td>
                                        <td class="col-xs-0" style="border-spacing: 1em 0;">:</td>
                                        <td class="col-xs-7" align="center" style="border-spacing: 1em 0;">
                                            <div class="input-group">
                                                <input type="number" class="form-control input-mask-product col-xs-12 col-sm-12 col-lg-12"
                                                       id="pp_balita" name="pp_balita" value="" />
                                                <span class="input-group-addon">Orang</span>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="col-xs-5" style="border-spacing: 1em 0;">
                                            <label for="pp_anak_anak">Anak-anak</label>
                                        </td>
                                        <td class="col-xs-0" style="border-spacing: 1em 0;">:</td>
                                        <td class="col-xs-7" align="center" style="border-spacing: 1em 0;">
                                            <div class="input-group">
                                                <input type="number" class="form-control input-mask-product col-xs-12 col-sm-12 col-lg-12"
                                                       id="pp_anak_anak" name="pp_anak_anak" value="" />
                                                <span class="input-group-addon">Orang</span>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="col-xs-5" style="border-spacing: 1em 0;">
                                            <label for="pp_remaja">Remaja</label>
                                        </td>
                                        <td class="col-xs-0" style="border-spacing: 1em 0;">:</td>
                                        <td class="col-xs-7" align="center" style="border-spacing: 1em 0;">
                                            <div class="input-group">
                                                <input type="number" class="form-control input-mask-product col-xs-12 col-sm-12 col-lg-12"
                                                       id="pp_remaja" name="pp_remaja" value="" />
                                                <span class="input-group-addon">Orang</span>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="col-xs-5" style="border-spacing: 1em 0;">
                                            <label for="pp_dewasa">Dewasa</label>
                                        </td>
                                        <td class="col-xs-0" style="border-spacing: 1em 0;">:</td>
                                        <td class="col-xs-7" align="center" style="border-spacing: 1em 0;">
                                            <div class="input-group">
                                                <input type="number" class="form-control input-mask-product col-xs-12 col-sm-12 col-lg-12"
                                                       id="pp_dewasa" name="pp_dewasa" value="" />
                                                <span class="input-group-addon">Orang</span>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="col-xs-5" style="border-spacing: 1em 0;">
                                            <label for="pp_lansia">Lansia</label>
                                        </td>
                                        <td class="col-xs-0" style="border-spacing: 1em 0;">:</td>
                                        <td class="col-xs-7" align="center" style="border-spacing: 1em 0;">
                                            <div class="input-group">
                                                <input type="number" class="form-control input-mask-product col-xs-12 col-sm-12 col-lg-12"
                                                       id="pp_lansia" name="pp_lansia" value="" />
                                                <span class="input-group-addon">Orang</span>
                                            </div>
                                        </td>
                                    </tr>
                                </table>

                                <div class="space-10"></div>

                                <div class="buttonGroup">
                                    <div class="buttonRow">
                                        <button class="btn btn-primary" id="simpan" name="simpan">
                                            <i class="ace-icon glyphicon glyphicon-ok bigger-120"></i>
                                            Kirim
                                        </button>
                                        <button class="btn btn-danger" id="closeWindowButton">
                                            <i class="ace-icon glyphicon glyphicon-remove bigger-120"></i>
                                            Tutup
                                        </button>
                                    </div>
                                </div>

                                <!-- Proses Simpan Data -->
                                <?php
                                if (isset($_POST['simpan'])) {
                                    $id_peristiwa   = $_POST['txtIdPeristiwa'];
                                    $pl_balita      = $_POST['pl_balita'];
                                    $pl_anak_anak   = $_POST['pl_anak_anak'];
                                    $pl_remaja      = $_POST['pl_remaja'];
                                    $pl_dewasa      = $_POST['pl_dewasa'];
                                    $pl_lansia      = $_POST['pl_lansia'];
                                    $pl             = $pl_balita + $pl_anak_anak + $pl_remaja + $pl_dewasa + $pl_lansia;
                                    $pp_balita      = $_POST['pp_balita'];
                                    $pp_anak_anak   = $_POST['pp_anak_anak'];
                                    $pp_remaja      = $_POST['pp_remaja'];
                                    $pp_dewasa      = $_POST['pp_dewasa'];
                                    $pp_lansia      = $_POST['pp_lansia'];
                                    $pp             = $pp_balita + $pp_anak_anak + $pp_remaja + $pp_dewasa + $pp_lansia;

                                    $LiffLaporanObservasi->update_observasi2($id_peristiwa, $pl, $pl_balita, $pl_anak_anak, $pl_remaja, $pl_dewasa, $pl_lansia, $pp, $pp_balita, $pp_anak_anak, $pp_remaja, $pp_dewasa, $pp_lansia);
                                    echo "<script>window.location='index.php?action=success'</script>";
                                }
                                ?>
                            </form>

                            <div class="space-10"></div>

                            <div id="statusMessage">
                                <div id="isInClientMessage"></div>
                                <div id="apiReferenceMessage">
                                    <p>Available LIFF methods vary depending on the browser you use to open the LIFF app.</p>
                                    <p>Please refer to the <a href="https://developers.line.biz/en/reference/liff/#initialize-liff-app">API reference page</a> for more information.</p>
                                </div>
                            </div>

                            <!-- LIFF ID ERROR -->
                            <div id="liffIdErrorMessage" class="hidden">
                                <p>You have not assigned any value for LIFF ID.</p>
                                <p>If you are running the app using Node.js, please set the LIFF ID as an environment variable in your Heroku account follwing the below steps: </p>
                                <code id="code-block">
                                    <ol>
                                        <li>Go to `Dashboard` in your Heroku account.</li>
                                        <li>Click on the app you just created.</li>
                                        <li>Click on `Settings` and toggle `Reveal Config Vars`.</li>
                                        <li>Set `MY_LIFF_ID` as the key and the LIFF ID as the value.</li>
                                        <li>Your app should be up and running. Enter the URL of your app in a web browser.</li>
                                    </ol>
                                </code>
                                <p>If you are using any other platform, please add your LIFF ID in the <code>index.html</code> file.</p>
                                <p>For more information about how to add your LIFF ID, see <a href="https://developers.line.biz/en/reference/liff/#initialize-liff-app">Initializing the LIFF app</a>.</p>
                            </div>

                            <!-- LIFF INIT ERROR -->
                            <div id="liffInitErrorMessage" class="hidden">
                                <p>Something went wrong with LIFF initialization.</p>
                                <p>LIFF initialization can fail if a user clicks "Cancel" on the "Grant permission" screen, or if an error occurs in the process of <code>liff.init()</code>.</p>
                            </div>

                            <!-- NODE.JS LIFF ID ERROR -->
                            <div id="nodeLiffIdErrorMessage" class="hidden">
                                <p>Unable to receive the LIFF ID as an environment variable.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-xs-12 col-sm-12 col-lg-12">
                    <div class="page-content">
                        <!-- TIDAK ADA PENUGASAN -->
                        <div id="tidakAdaPenugasan" class="hidden">
                            <div class='alert alert-danger'>
                                <p>
                                    <strong>Tidak menemukan penugasan.</strong>
                                </p>
                                <p style="text-align: justify">
                                    Tidak ada penugasan yang terkait untuk akun yang Anda gunakan saat ini.
                                    Pastikan Anda mengguna-kan akun yang benar (sesuai penugasan) saat mengakses sistem.
                                    Apabila hal ini merupakan kekeliruan, mohon hubungi Staf Admin untuk melakukan
                                    pengecekan.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <script charset="utf-8" src="https://static.line-scdn.net/liff/edge/2.1/sdk.js"></script>
        </div>
    </div>
</div>
<!--| End: Content Area |-->

<!-- basic scripts -->

<!--[if !IE]> -->
<script src="../../../../assets/js/jquery-2.1.4.min.js"></script>

<!--[if IE]>
<script src="../../../../assets/js/jquery-1.11.3.min.js"></script>
<![endif]-->
<script type="text/javascript">
    if ('ontouchstart' in document.documentElement) document.write("<script src='../../../../assets/js/jquery.mobile.custom.min.js'>" + "<" + "/script>");
</script>
<script src="../../../../assets/js/bootstrap.min.js"></script>

<!-- page specific plugin scripts -->
<script src="../../../../assets/js/jquery.dataTables.min.js"></script>
<script src="../../../../assets/js/jquery.dataTables.bootstrap.min.js"></script>
<script src="../../../../assets/js/dataTables.buttons.min.js"></script>
<script src="../../../../assets/js/buttons.flash.min.js"></script>
<script src="../../../../assets/js/buttons.html5.min.js"></script>
<script src="../../../../assets/js/buttons.print.min.js"></script>
<script src="../../../../assets/js/buttons.colVis.min.js"></script>
<script src="../../../../assets/js/dataTables.select.min.js"></script>
<script src="../../../../assets/js/bootbox.js"></script>

<!-- ace scripts -->
<script src="../../../../assets/js/ace-elements.min.js"></script>
<script src="../../../../assets/js/ace.min.js"></script>

<!-- inline scripts related to this page -->
<script src="../../../../assets/js/jquery-2.1.4.min.js"></script>
<script type="text/javascript">
    window.onload = function() {
        const useNodeJS = false;   // if you are not using a node server, set this value to false
        const defaultLiffId = "1654238427-EJYxr6o5";   // change the default LIFF value if you are not using a node server

        // DO NOT CHANGE THIS
        let myLiffId = "";

        // if node is used, fetch the environment variable and pass it to the LIFF method
        // otherwise, pass defaultLiffId
        if (useNodeJS) {
            fetch('/send-id')
                .then(function(reqResponse) {
                    return reqResponse.json();
                })
                .then(function(jsonResponse) {
                    myLiffId = jsonResponse.id;
                    initializeLiffOrDie(myLiffId);
                })
                .catch(function(error) {
                    document.getElementById("liffAppContent").classList.add('hidden');
                    document.getElementById("nodeLiffIdErrorMessage").classList.remove('hidden');
                });
        } else {
            myLiffId = defaultLiffId;
            initializeLiffOrDie(myLiffId);
        }
    };

    /**
     * Check if myLiffId is null. If null do not initiate liff.
     * @param {string} myLiffId The LIFF ID of the selected element
     */
    function initializeLiffOrDie(myLiffId) {
        if (!myLiffId) {
            document.getElementById("liffAppContent").classList.add('hidden');
            document.getElementById("liffIdErrorMessage").classList.remove('hidden');
        } else {
            initializeLiff(myLiffId);
        }
    }

    /**
     * Initialize LIFF
     * @param {string} myLiffId The LIFF ID of the selected element
     */
    function initializeLiff(myLiffId) {
        liff
            .init({
                liffId: myLiffId
            })
            .then(() => {
                // start to use LIFF's api
                initializeApp();
            })
            .catch((err) => {
                document.getElementById("liffAppContent").classList.add('hidden');
                document.getElementById("liffInitErrorMessage").classList.remove('hidden');
            });
    }

    /**
     * Initialize the app by calling functions handling individual app components
     */
    function initializeApp() {
        displayLiffData();
        displayIsInClientInfo();
        registerButtonHandlers();

        // check if the user is logged in/out, and disable inappropriate button
        if (liff.isLoggedIn()) {
            document.getElementById('liffLoginButton').disabled = true;
        } else {
            document.getElementById('liffLogoutButton').disabled = true;
        }
    }

    /**
     * Display data generated by invoking LIFF methods
     */
    function displayLiffData() {
        // document.getElementById('browserLanguage').textContent = liff.getLanguage();
        // document.getElementById('sdkVersion').textContent = liff.getVersion();
        // document.getElementById('lineVersion').textContent = liff.getVersion();
        // document.getElementById('isInClient').textContent = liff.isInClient();
        // document.getElementById('isLoggedIn').textContent = liff.isLoggedIn();
        // document.getElementById('deviceOS').textContent = liff.getOS();
    }

    /**
     * Toggle the login/logout buttons based on the isInClient status, and display a message accordingly
     */
    function displayIsInClientInfo() {
        if (liff.isInClient()) {
            document.getElementById('liffLoginButton').classList.toggle('hidden');
            document.getElementById('liffLogoutButton').classList.toggle('hidden');
            document.getElementById('isInClientMessage').textContent = 'You are opening the app in the in-app browser of LINE.';
        } else {
            document.getElementById('isInClientMessage').textContent = 'You are opening the app in an external browser.';
        }
    }

    /**
     * Register event handlers for the buttons displayed in the app
     */
    function registerButtonHandlers() {
        // openWindow call
        // document.getElementById('openWindowButton').addEventListener('click', function() {
        //     liff.openWindow({
        //         url: 'https://line.me',
        //         external: true
        //     });
        // });

        // closeWindow call
        document.getElementById('closeWindowButton').addEventListener('click', function() {
            if (!liff.isInClient()) {
                sendAlertIfNotInClient();
            } else {
                liff.closeWindow();
            }
        });

        // sendMessages call
        // document.getElementById('sendMessageButton').addEventListener('click', function() {
        //     if (!liff.isInClient()) {
        //         sendAlertIfNotInClient();
        //     } else {
        //         liff.sendMessages([{
        //             'type': 'text',
        //             'text': "You've successfully sent a message! Hooray!"
        //         }]).then(function() {
        //             window.alert('Message sent');
        //         }).catch(function(error) {
        //             window.alert('Error sending message: ' + error);
        //         });
        //     }
        // });

        // scanCode call
        // document.getElementById('scanQrCodeButton').addEventListener('click', function() {
        //     if (!liff.isInClient()) {
        //         sendAlertIfNotInClient();
        //     } else {
        //         liff.scanCode().then(result => {
        //             // e.g. result = { value: "Hello LIFF app!" }
        //             const stringifiedResult = JSON.stringify(result);
        //             document.getElementById('scanQrField').textContent = stringifiedResult;
        //             toggleQrCodeReader();
        //         }).catch(err => {
        //             document.getElementById('scanQrField').textContent = "scanCode failed!";
        //         });
        //     }
        // });

        // get access token
        // document.getElementById('getAccessToken').addEventListener('click', function() {
        //     if (!liff.isLoggedIn() && !liff.isInClient()) {
        //         alert('To get an access token, you need to be logged in. Please tap the "login" button below and try again.');
        //     } else {
        //         const accessToken = liff.getAccessToken();
        //         document.getElementById('accessTokenField').textContent = accessToken;
        //         toggleAccessToken();
        //     }
        // });

        // get profile call
        //document.getElementById('getProfileButton').addEventListener('click', function() {
        liff.getProfile().then(function(profile) {

            $(document).ready(function () {
                var lineID = profile.userId;

                $.ajax({
                    url: 'index.php',
                    type: 'post',
                    data: {ajax: 1, lineID: lineID},
                    success: function (response) {
                        $('#response').html(response);
                    }
                });
            });

            document.getElementById('userIdProfileField').textContent = profile.userId;
            document.getElementById('displayNameField').textContent = profile.displayName;

            // LINE Profile 2 (Ketika tidak ditemukan penugasan)
            // document.getElementById('userIdProfileField2').textContent = profile.userId;
            // document.getElementById('displayNameField2').textContent = profile.displayName;

            const profilePictureDiv = document.getElementById('profilePictureDiv');
            // const profilePictureDiv2 = document.getElementById('profilePictureDiv2');
            if (profilePictureDiv.firstElementChild) {
                profilePictureDiv.removeChild(profilePictureDiv.firstElementChild);
            }
            // if (profilePictureDiv2.firstElementChild) {
            //     profilePictureDiv2.removeChild(profilePictureDiv2.firstElementChild);
            // }

            const img = document.createElement('img');
            img.src = profile.pictureUrl;
            img.alt = 'Profile Picture';
            img.style.height  = '66px';
            img.style.width   = '66px';
            profilePictureDiv.appendChild(img);
            // profilePictureDiv2.appendChild(img);

            //document.getElementById('statusMessageField').textContent = profile.statusMessage;
            //toggleProfileData();
        }).catch(function(error) {
            window.alert('Error getting profile: ' + error);
        });
        //});

        // document.getElementById('shareTargetPicker').addEventListener('click', function() {
        //     if (!liff.isInClient()) {
        //         sendAlertIfNotInClient();
        //     } else {
        //         if (liff.isApiAvailable('shareTargetPicker')) {
        //             liff.shareTargetPicker([
        //                 {
        //                     'type': 'text',
        //                     'text': 'Hello, World!'
        //                 }
        //             ])
        //                 .then(
        //                     document.getElementById('shareTargetPickerMessage').textContent = "Share target picker was launched."
        //                 ).catch(function(res) {
        //                 document.getElementById('shareTargetPickerMessage').textContent = "Failed to launch share target picker."
        //             })
        //         }
        //     }
        // });

        // login call, only when external browser is used
        document.getElementById('liffLoginButton').addEventListener('click', function() {
            if (!liff.isLoggedIn()) {
                // set `redirectUri` to redirect the user to a URL other than the front page of your LIFF app.
                liff.login();
            }
        });

        // logout call only when external browse
        document.getElementById('liffLogoutButton').addEventListener('click', function() {
            if (liff.isLoggedIn()) {
                liff.logout();
                window.location.reload();
            }
        });
    }

    /**
     * Alert the user if LIFF is opened in an external browser and unavailable buttons are tapped
     */
    function sendAlertIfNotInClient() {
        alert('This button is unavailable as LIFF is currently being opened in an external browser.');
    }

    /**
     * Toggle access token data field
     */
    function toggleAccessToken() {
        toggleElement('accessTokenData');
    }

    /**
     * Toggle profile info field
     */
    // function toggleProfileData() {
    //     toggleElement('profileInfo');
    // }

    /**
     * Toggle scanCode result field
     */
    function toggleQrCodeReader() {
        toggleElement('scanQr');
    }

    /**
     * Toggle specified element
     * @param {string} elementId The ID of the selected element
     */
    function toggleElement(elementId) {
        const elem = document.getElementById(elementId);
        if (elem.offsetWidth > 0 && elem.offsetHeight > 0) {
            elem.style.display = 'none';
        } else {
            elem.style.display = 'block';
        }
    }
</script>

</body>
</html>