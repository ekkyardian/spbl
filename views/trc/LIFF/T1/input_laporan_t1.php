<!DOCTYPE html>
<html lang="en">

<body class="no-skin">

<!--| Start: Content Area |-->
<div class="main-container ace-save-state" id="main-container">
    <div class="main-content">
        <div class="main-content-inner">

            <!-- Content -->
            <div id="liffAppContent">
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

                            <div class="space-10"></div>

                            <!-- NOTIFIKASI PROSES INPUT LAPORAN OBSERVASI -->
                            <?php
//                            if(isset($_GET['action'])) {
//                                if($_GET['action']=='failed') {
//                                    echo "<div class='alert alert-danger'>
//                                          <button type='button' class='close' data-dismiss='alert'>
//                                              <i class='ace-icon fa fa-times'></i>
//                                          </button> Gagal mengirim laporan
//                                          </div>
//                                    ";
//                                } elseif ($_GET['action']=='success') {
//                                    echo "<div class='alert alert-success'>
//                                         <button type='button' class='close' data-dismiss='alert'>
//                                             <i class='ace-icon fa fa-times'></i>
//                                         </button> <i class='ace-icon fa fa-check'></i> Laporan terkirim
//                                          </div>
//                                    ";
//                                }
//                            }
                            ?>

                            <!-- HALAMAN INPUT LAPORAN OBSERVASI -->
                            <form action="" method="post" enctype="multipart/form-data">
                                <label for="korban_terdampak">
                                    Korban Terdampak
                                </label>
                                <div class="input-group">
                                    <input type="number" class="form-control input-mask-product col-xs-11 col-sm-11 col-lg-11"
                                           id="korban_terdampak" name="korban_terdampak" value="" />
                                    <span class="input-group-addon">
                                        Orang
                                    </span>
                                </div>

                                <label for="korban_mengungsi">
                                    Korban Mengungsi
                                </label>
                                <div class="input-group">
                                    <input type="number" class="form-control input-mask-product col-xs-11 col-sm-11 col-lg-11"
                                           id="korban_mengungsi" name="korban_mengungsi" value="" />
                                    <span class="input-group-addon">Orang</span>
                                </div>

                                <label for="korban_luka">
                                    Korban Luka
                                </label>
                                <div class="input-group">
                                    <input type="number" class="form-control input-mask-product col-xs-11 col-sm-11 col-lg-11"
                                           id="korban_luka" name="korban_luka" value="" />
                                    <span class="input-group-addon">Orang</span>
                                </div>

                                <label for="korban_meninggal">
                                    Korban Meninggal
                                </label>
                                <div class="input-group">
                                    <input type="number" class="form-control input-mask-product col-xs-11 col-sm-11 col-lg-11"
                                           id="korban_meninggal" name="korban_meninggal"  value="" />
                                    <span class="input-group-addon">Orang</span>
                                </div>

                                <label for="korban_hilang">
                                    Korban Hilang
                                </label>
                                <div class="input-group">
                                    <input type="number" class="form-control input-mask-product col-xs-11 col-sm-11 col-lg-11"
                                           id="korban_hilang" name="korban_hilang" value="" />
                                    <span class="input-group-addon">Orang</span>
                                </div>

                                <label for="pasca_bencana">
                                    Kondisi Pasca Bencana
                                </label>
                                <div class="input-group">
                                    <select class="form-control col-xs-12 col-sm-12 col-lg-12" name="pasca_bencana" id="pasca_bencana">
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
//                                if (isset($_POST['simpan'])) {
//                                    $id_peristiwa       = "001/PRS/2020";
//                                    $korban_terdampak   = $_POST['korban_terdampak'];
//                                    $korban_mengungsi   = $_POST['korban_mengungsi'];
//                                    $korban_luka        = $_POST['korban_luka'];
//                                    $korban_meninggal   = $_POST['korban_meninggal'];
//                                    $korban_hilang      = $_POST['korban_hilang'];
//                                    $pasca_bencana      = $_POST['pasca_bencana'];
//
//                                    $LiffLaporanObservasi->update_observasi1($id_peristiwa, $korban_terdampak,
//                                        $korban_mengungsi, $korban_luka, $korban_meninggal, $korban_hilang, $pasca_bencana);
//                                    echo "<script>window.location='index.php?action=success'</script>";
//                                }
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--| End: Content Area |-->
</body>
</html>