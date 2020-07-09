<!-- Start: Pemanggilan dan pendeklarasian class -->
<?php
require_once ('../../../../config/+koneksi.php');
require_once ('../../../../models/database.php');
require_once('../../../../models/trc/liff/LiffLaporanObservasi.php');

$connection = new Database($host, $user, $pass, $database);
$LiffLaporanObservasi = new LiffLaporanObservasi($connection);

if (isset($_POST['lineID'])) {
    $lineID = $_POST['lineID'];
}
?>
<!-- End: Pemanggilan dan pendeklarasian class -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
    <meta charset="utf-8"/>
    <title>SPBL</title>

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
                    TRC | Observasi Lapangan
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
                    <div class="well">
                        <h4 class="blue smaller lighter">Laporan Tahap Ke-1</h4>
                        Masukkan/update data laporan hasil observasi tahap ke-1 sesuai kolom berikut. Pastikan data yang diinput
                        valid dan sesuai dengan data yang tejadi di lokasi bencana.
                    </div>
                </div>
            </div>

            <!-- Content -->
            <div id="liffAppContent">
                <!-- ACTION BUTTONS -->
<!--                <div class="buttonGroup">-->
<!--                    <div class="buttonRow">-->
<!--                        <button id="openWindowButton">Open External Window</button> <!-- Tidak diperlukan -->
<!--                    </div>-->
<!--                    <div class="buttonRow">-->
<!--                        <button id="scanQrCodeButton">Open QR Code Reader</button> <!-- Tidak diperlukan -->
<!--                        <button id="sendMessageButton">Send Message</button> <!-- Tidak diperlukan -->
<!--                    </div>-->
<!--                    <div class="buttonRow">-->
<!--                        <button id="getAccessToken">Get Access Token</button>-->
<!--                        <button id="getProfileButton">Get Profile</button>-->
<!--                    </div>-->
<!--                    <div class="buttonRow">-->
<!--                        <button id="shareTargetPicker">Open Share Target Picker</button>-->
<!--                    </div>-->
<!--                </div>-->

<!--                <div id="shareTargetPickerMessage"></div>-->

                <!-- ACCESS TOKEN DATA -->
<!--                <div id="accessTokenData" class="hidden textLeft">-->
<!--                    <h2>Access Token</h2>-->
<!--                    <a href="#" onclick="toggleAccessToken()">Close Access Token</a>-->
<!--                    <table>-->
<!--                        <tr>-->
<!--                            <th>accessToken</th>-->
<!--                            <td id="accessTokenField"></td>-->
<!--                        </tr>-->
<!--                    </table>-->
<!--                </div>-->

                <!-- SCAN QR RESULT | Tidak diperlukan -->
<!--                <div id="scanQr" class="hidden textLeft">-->
<!--                    <h2>QR Code reader</h2>-->
<!--                    <a href="#" onclick="toggleQrCodeReader()">Close QR Code Reader Result</a>-->
<!--                    <table>-->
<!--                        <tr>-->
<!--                            <th>scanCode Result</th>-->
<!--                            <td id="scanQrField"></td>-->
<!--                        </tr>-->
<!--                    </table>-->
<!--                </div>-->

<!--                <input type="text" id="lineId" name="lineId" value="" />-->

                <script src="../../../../assets/js/jquery-2.1.4.min.js"></script>
                <script type="text/javascript">
                    $(document).ready(function() {
                        var lineID = "Success";
                        $.ajax({
                            //url: "index.php",
                            type: "POST",
                            data: {lineID: lineID },
                            success: function(data) {
                                $(lineID).text(data)
                            }
                        });
                    });
                </script>
                <?php
                echo "Line ID: ".$lineID;
                ?>

                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-lg-12">
                        <div class="page-content">

                            <!-- PROFILE INFO -->
                            <div id="profileInfo" class="textLeft">
                                <div class="widget-box">
                                    <div class="widget-header">
                                        <h4 class="smaller">LINE Profile</h4>
                                    </div>
                                    <div class="widget-body">
                                        <div class="widget-main">
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
                                    </div>
                                </div>
                            </div>

                            <!-- LOGIN LOGOUT BUTTONS -->
                            <div class="buttonGroup">
                                <button id="liffLoginButton">Log in</button>
                                <button id="liffLogoutButton">Log out</button>
                            </div>

<!--                            <div class="page-header">&nbsp;</div>-->

                            <div class="space-10"></div>

                            <?php
                            if(isset($_GET['action'])) {
                                if($_GET['action']=='failed') {
                                    echo "<div class='alert alert-danger'>
                            <button type='button' class='close' data-dismiss='alert'>
                                <i class='ace-icon fa fa-times'></i>
                            </button> Gagal mengirim laporan
                            </div>";
                                } elseif ($_GET['action']=='success') {
                                    echo "<div class='alert alert-success'>
                            <button type='button' class='close' data-dismiss='alert'>
                                <i class='ace-icon fa fa-times'></i>
                            </button> <i class='ace-icon fa fa-check'></i> Laporan terkirim
                            </div>";
                                }
                            }
                            ?>

                            <form action="" method="post" enctype="multipart/form-data">

                                <?php
                                $id_peristiwa = "001/PRS/2020";
                                $tampil_observasi = $LiffLaporanObservasi->tampil_observasi1($id_peristiwa)->fetchObject();


                                ?>

                                <input type="hidden" name="id_line" id="id_line" value="Ua275161a7af915419f9dd93c19904bdc" >
                                <label for="korban_terdampak">
                                    Korban Terdampak
                                </label>
                                <div class="input-group">
                                    <input type="number" class="form-control input-mask-product col-xs-11 col-sm-11 col-lg-11"
                                           id="korban_terdampak" name="korban_terdampak" value="<?php echo $tampil_observasi->korban_terdampak; ?>" />
                                    <span class="input-group-addon">
                                    Orang
                                </span>
                                </div>

                                <label for="korban_mengungsi">
                                    Korban Mengungsi
                                </label>
                                <div class="input-group">
                                    <input type="number" class="form-control input-mask-product col-xs-11 col-sm-11 col-lg-11"
                                           id="korban_mengungsi" name="korban_mengungsi" value="<?php echo $tampil_observasi->korban_mengungsi; ?>" />
                                    <span class="input-group-addon">
                                    Orang
                                </span>
                                </div>

                                <label for="korban_luka">
                                    Korban Luka
                                </label>
                                <div class="input-group">
                                    <input type="number" class="form-control input-mask-product col-xs-11 col-sm-11 col-lg-11"
                                           id="korban_luka" name="korban_luka" value="<?php echo $tampil_observasi->korban_luka; ?>" />
                                    <span class="input-group-addon">
                                    Orang
                                </span>
                                </div>

                                <label for="korban_meninggal">
                                    Korban Meninggal
                                </label>
                                <div class="input-group">
                                    <input type="number" class="form-control input-mask-product col-xs-11 col-sm-11 col-lg-11"
                                           id="korban_meninggal" name="korban_meninggal"  value="<?php echo $tampil_observasi->korban_meninggal; ?>" />
                                    <span class="input-group-addon">
                                    Orang
                                </span>
                                </div>

                                <label for="korban_hilang">
                                    Korban Hilang
                                </label>
                                <div class="input-group">
                                    <input type="number" class="form-control input-mask-product col-xs-11 col-sm-11 col-lg-11"
                                           id="korban_hilang" name="korban_hilang" value="<?php echo $tampil_observasi->korban_hilang; ?>" />
                                    <span class="input-group-addon">
                                    Orang
                                </span>
                                </div>

                                <label for="pasca_bencana">
                                    Kondisi Pasca Bencana
                                </label>
                                <div class="input-group">
                                    <select class="form-control col-xs-12 col-sm-12 col-lg-12" name="pasca_bencana" id="pasca_bencana">
                                        <option value="<?php echo $tampil_observasi->pasca_bencana; ?>"><?php echo $tampil_observasi->pasca_bencana; ?></option>
                                        <option value="Normal">Normal</option>
                                        <option value="Waspada">Waspada</option>
                                        <option value="Siaga">Siaga</option>
                                        <option value="Awas">Awas</option>
                                    </select>
                                </div>

                                <div class="space-10"></div>

                                <div class="buttonGroup">
                                    <div class="buttonRow">
                                        <button class="btn btn-primary" id="simpan" name="simpan">
                                            <i class="ace-icon glyphicon glyphicon-ok bigger-120"></i>
                                            Kirim
                                        </button>
                                        <button class="btn btn-danger" id="closeWindowButton">
                                            <i class="ace-icon glyphicon glyphicon-remove bigger-120"></i>
                                            Batal
                                        </button>
                                    </div>
                                </div>

                                <!-- Proses Simpan Data -->
                                <?php
                                if (isset($_POST['simpan'])) {
                                    $id_peristiwa       = "001/PRS/2020";
                                    $korban_terdampak   = $_POST['korban_terdampak'];
                                    $korban_mengungsi   = $_POST['korban_mengungsi'];
                                    $korban_luka        = $_POST['korban_luka'];
                                    $korban_meninggal   = $_POST['korban_meninggal'];
                                    $korban_hilang      = $_POST['korban_hilang'];
                                    $pasca_bencana      = $_POST['pasca_bencana'];

                                    $LiffLaporanObservasi->update_observasi1($id_peristiwa, $korban_terdampak,
                                        $korban_mengungsi, $korban_luka, $korban_meninggal, $korban_hilang, $pasca_bencana);
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

            <script charset="utf-8" src="https://static.line-scdn.net/liff/edge/2.1/sdk.js"></script>
            <script src="../liff-starter.js"></script>
        </div>
    </div>
</div>
<!--| End: Content Area |-->

<!-- basic scripts -->

<!--[if !IE]> -->
<script src="../../../../assets/js/jquery-2.1.4.min.js"></script>

<!-- <![endif]-->

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

</body>
</html>
