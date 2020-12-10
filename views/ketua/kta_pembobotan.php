<?php
/**
 * Created by PhpStorm.
 * User: Ekky Ardian Fitran
 * Date: 05/04/2020
 * Time: 16:52
 */

$KtaPembobotan = new KtaPembobotan($connection);

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

// Ambil bobot alternatif ke-i kriteria ke-i
$bobot_11   = $KtaPembobotan->tampil_bobot($alternatif_1, $kriteria_1)->fetchObject();
$bobot_12   = $KtaPembobotan->tampil_bobot($alternatif_1, $kriteria_2)->fetchObject();
$bobot_13   = $KtaPembobotan->tampil_bobot($alternatif_1, $kriteria_3)->fetchObject();
$bobot_14   = $KtaPembobotan->tampil_bobot($alternatif_1, $kriteria_4)->fetchObject();
$bobot_15   = $KtaPembobotan->tampil_bobot($alternatif_1, $kriteria_5)->fetchObject();
$bobot_21   = $KtaPembobotan->tampil_bobot($alternatif_2, $kriteria_1)->fetchObject();
$bobot_22   = $KtaPembobotan->tampil_bobot($alternatif_2, $kriteria_2)->fetchObject();
$bobot_23   = $KtaPembobotan->tampil_bobot($alternatif_2, $kriteria_3)->fetchObject();
$bobot_24   = $KtaPembobotan->tampil_bobot($alternatif_2, $kriteria_4)->fetchObject();
$bobot_25   = $KtaPembobotan->tampil_bobot($alternatif_2, $kriteria_5)->fetchObject();
$bobot_31   = $KtaPembobotan->tampil_bobot($alternatif_3, $kriteria_1)->fetchObject();
$bobot_32   = $KtaPembobotan->tampil_bobot($alternatif_3, $kriteria_2)->fetchObject();
$bobot_33   = $KtaPembobotan->tampil_bobot($alternatif_3, $kriteria_3)->fetchObject();
$bobot_34   = $KtaPembobotan->tampil_bobot($alternatif_3, $kriteria_4)->fetchObject();
$bobot_35   = $KtaPembobotan->tampil_bobot($alternatif_3, $kriteria_5)->fetchObject();
$bobot_41   = $KtaPembobotan->tampil_bobot($alternatif_4, $kriteria_1)->fetchObject();
$bobot_42   = $KtaPembobotan->tampil_bobot($alternatif_4, $kriteria_2)->fetchObject();
$bobot_43   = $KtaPembobotan->tampil_bobot($alternatif_4, $kriteria_3)->fetchObject();
$bobot_44   = $KtaPembobotan->tampil_bobot($alternatif_4, $kriteria_4)->fetchObject();
$bobot_45   = $KtaPembobotan->tampil_bobot($alternatif_4, $kriteria_5)->fetchObject();

// Ambil id_bobot alternatif ke-i kriteria ke-i
$id_bobot_11   = $KtaPembobotan->tampil_bobot($alternatif_1, $kriteria_1)->fetchObject();
$id_bobot_12   = $KtaPembobotan->tampil_bobot($alternatif_1, $kriteria_2)->fetchObject();
$id_bobot_13   = $KtaPembobotan->tampil_bobot($alternatif_1, $kriteria_3)->fetchObject();
$id_bobot_14   = $KtaPembobotan->tampil_bobot($alternatif_1, $kriteria_4)->fetchObject();
$id_bobot_15   = $KtaPembobotan->tampil_bobot($alternatif_1, $kriteria_5)->fetchObject();
$id_bobot_21   = $KtaPembobotan->tampil_bobot($alternatif_2, $kriteria_1)->fetchObject();
$id_bobot_22   = $KtaPembobotan->tampil_bobot($alternatif_2, $kriteria_2)->fetchObject();
$id_bobot_23   = $KtaPembobotan->tampil_bobot($alternatif_2, $kriteria_3)->fetchObject();
$id_bobot_24   = $KtaPembobotan->tampil_bobot($alternatif_2, $kriteria_4)->fetchObject();
$id_bobot_25   = $KtaPembobotan->tampil_bobot($alternatif_2, $kriteria_5)->fetchObject();
$id_bobot_31   = $KtaPembobotan->tampil_bobot($alternatif_3, $kriteria_1)->fetchObject();
$id_bobot_32   = $KtaPembobotan->tampil_bobot($alternatif_3, $kriteria_2)->fetchObject();
$id_bobot_33   = $KtaPembobotan->tampil_bobot($alternatif_3, $kriteria_3)->fetchObject();
$id_bobot_34   = $KtaPembobotan->tampil_bobot($alternatif_3, $kriteria_4)->fetchObject();
$id_bobot_35   = $KtaPembobotan->tampil_bobot($alternatif_3, $kriteria_5)->fetchObject();
$id_bobot_41   = $KtaPembobotan->tampil_bobot($alternatif_4, $kriteria_1)->fetchObject();
$id_bobot_42   = $KtaPembobotan->tampil_bobot($alternatif_4, $kriteria_2)->fetchObject();
$id_bobot_43   = $KtaPembobotan->tampil_bobot($alternatif_4, $kriteria_3)->fetchObject();
$id_bobot_44   = $KtaPembobotan->tampil_bobot($alternatif_4, $kriteria_4)->fetchObject();
$id_bobot_45   = $KtaPembobotan->tampil_bobot($alternatif_4, $kriteria_5)->fetchObject();
?>

<body class="no-skin">
<div class="breadcrumbs ace-save-state" id="breadcrumbs">

    <!--| Start: URL Navigasi (Breadcrumb) |-->
    <ul class="breadcrumb">
        <li>
            <i class="ace-icon fa fa-bookmark home-icon"></i>
            <a href="?pages=beranda">SPBL</a>
        </li>
        <li class="active">Pembobotan</li>
    </ul>
    <!--| End: URL Navigasi (Breadcrumb) |-->

    <!--| Start: Search Navigasi |-->
    <div class="nav-search" id="nav-search"></div>
    <!--| End: Search Navigasi |-->

</div>
<div class="page-content">

    <!--| Start: Content Area |-->
    <div class="page-header">
        <h1>
            Pembobotan
            <small>
                <i class="ace-icon fa fa-angle-double-right"></i>
                Kriteria dan Pembobotan Metode SMART
            </small>
        </h1>
    </div>

    <!--| Start: Notifikasi |-->
    <div class="row">
        <div class="col-sm-12">
            <?php
            if(isset($_GET['notifikasi'])) {
                if($_GET['notifikasi']=='gagal') {
                    echo "
                    <div class='alert alert-danger'>
                        <button type='button' class='close' data-dismiss='alert'>
                            <i class='ace-icon fa fa-times'></i>
                        </button>
                        <strong>Gagal menyimpan perubahan.</strong> Nilai total bobot tidak boleh kurang ataupun lebih dari 100!
                    </div>
                    ";
                } else if($_GET['notifikasi']=='sukses') {
                    echo "
                <div class='alert alert-success'>
                    <button type='button' class='close' data-dismiss='alert'>
                        <i class='ace-icon fa fa-times'></i>
                    </button>
                    <strong>Berhasil.</strong> Nilai bobot baru telah disimpan.
                </div>
                ";
                }
            }
            ?>
        </div>
    </div>
    <!--| End: Notifikasi |-->

    <div class="row">

        <!--| Start: Alternatif Pangan |-->
        <div class="col-sm-3">
            <div class="table-header center">
                Alternatif: <strong>Paket Pangan</strong>
            </div>

            <form name="alt_pangan" method="post" enctype="multipart/form-data">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th class="center">No</th>
                    <th>Kriteria</th>
                    <th class="center">Utility</th>
                    <th  class="center">Bobot</th>
                </tr>
                </thead>

                <tbody>
                <!--| Start: Pangan -> Jml. Korban Terdampak |-->
                <tr>
                    <td class="center" rowspan="5">1</td>
                    <td><strong>Jumlah Korban Terdampak</strong></td>
                    <td></td>
                    <td class="center" rowspan="5"><?php echo $bobot_11->bobot; ?></td>
                </tr>
                <ul>
                <tr>
                    <td><li>1 s.d. 20</li></td>
                    <td class="center">25</td>
                </tr>
                <tr>
                    <td><li>21 s.d. 30</li></td>
                    <td class="center">50</td>
                </tr>
                <tr>
                    <td><li>31 s.d. 50</li></td>
                    <td class="center">75</td>
                </tr>
                <tr>
                    <td><li>> 50</li></td>
                    <td class="center">100</td>
                </tr>
                </ul>
                <!--| End: Pangan -> Jml. Korban Terdampak |-->

                <!--| Start: Pangan -> Jml. Korban Mengungsi |-->
                <tr>
                    <td class="center" rowspan="6">2</td>
                    <td><strong>Jumlah Korban Mengungsi</strong></td>
                    <td></td>
                    <td class="center" rowspan="6"><?php echo $bobot_12->bobot; ?></td>
                </tr>
                <ul>
                    <tr>
                        <td><li>0</li></td>
                        <td class="center">0</td>
                    </tr>
                    <tr>
                        <td><li>1 s.d. 10</li></td>
                        <td class="center">25</td>
                    </tr>
                    <tr>
                        <td><li>11 s.d. 20</li></td>
                        <td class="center">50</td>
                    </tr>
                    <tr>
                        <td><li>21 s.d. 30</li></td>
                        <td class="center">75</td>
                    </tr>
                    <tr>
                        <td><li>> 30</li></td>
                        <td class="center">100</td>
                    </tr>
                </ul>
                <!--| End: Pangan -> Jml. Korban Mengungsi |-->

                <!--| Start: Pangan -> Jml. Korban Luka |-->
                <tr>
                    <td class="center" rowspan="6">3</td>
                    <td><strong>Jumlah Korban Luka</strong></td>
                    <td></td>
                    <td class="center" rowspan="6"><?php echo $bobot_13->bobot; ?></td>
                </tr>
                <ul>
                    <tr>
                        <td><li>0</li></td>
                        <td class="center">0</td>
                    </tr>
                    <tr>
                        <td><li>1 s.d. 5</li></td>
                        <td class="center">25</td>
                    </tr>
                    <tr>
                        <td><li>6 s.d. 10</li></td>
                        <td class="center">50</td>
                    </tr>
                    <tr>
                        <td><li>11 s.d. 15</li></td>
                        <td class="center">75</td>
                    </tr>
                    <tr>
                        <td><li>> 15</li></td>
                        <td class="center">100</td>
                    </tr>
                </ul>
                <!--| End: Pangan -> Jml. Korban Luka |-->

                <!--| Start: Pangan -> Jml. Korban Meninggal dan Hilang |-->
                <tr>
                    <td class="center" rowspan="6">4</td>
                    <td><strong>Jumlah Korban Meninggal dan Hilang</strong></td>
                    <td></td>
                    <td class="center" rowspan="6"><?php echo $bobot_14->bobot; ?></td>
                </tr>
                <ul>
                    <tr>
                        <td><li>0</li></td>
                        <td class="center">0</td>
                    </tr>
                    <tr>
                        <td><li>1</li></td>
                        <td class="center">25</td>
                    </tr>
                    <tr>
                        <td><li>2</li></td>
                        <td class="center">50</td>
                    </tr>
                    <tr>
                        <td><li>3</li></td>
                        <td class="center">75</td>
                    </tr>
                    <tr>
                        <td><li>> 3</li></td>
                        <td class="center"></td>
                    </tr>
                </ul>
                <!--| End: Pangan -> Jml. Korban Meninggal dan Hilang |-->

                <!--| Start: Pangan -> Kondisi Pasca Bencana |-->
                <tr>
                    <td class="center" rowspan="5">5</td>
                    <td><strong>Kondisi Pasca Bencana</strong></td>
                    <td></td>
                    <td class="center" rowspan="5"><?php echo $bobot_15->bobot; ?></td>
                </tr>
                <ul>
                    <tr>
                        <td><li>Normal</li></td>
                        <td class="center">0</td>
                    </tr>
                    <tr>
                        <td><li>Waspada</li></td>
                        <td class="center">30</td>
                    </tr>
                    <tr>
                        <td><li>Siaga</li></td>
                        <td class="center">70</td>
                    </tr>
                    <tr>
                        <td><li>Awas</li></td>
                        <td class="center">100</td>
                    </tr>
                </ul>
                <!--| End: Pangan -> Kondisi Pasca Bencana |-->
                </tbody>

                <tfoot>
                <!--| Start: SUM dan Tombol Aksi |-->
                <tr>
                    <td class="center" colspan="3"><strong>Total</strong></td>
                    <td class="center">
                        <strong>
                            <?php
                            $total_pangan = $bobot_11->bobot + $bobot_12->bobot + $bobot_13->bobot + $bobot_14->bobot + $bobot_15->bobot;
                            echo $total_pangan;
                            ?>
                        </strong>
                    </td>
                </tr>
                <tr>
                    <td class="center" colspan="4">
                        <a id="btn-edit-pangan" role="button" data-toggle="modal" data-target="#modal-edit-pangan"
                           data-bobot_11="<?php echo $bobot_11->bobot; ?>"
                           data-bobot_12="<?php echo $bobot_12->bobot; ?>"
                           data-bobot_13="<?php echo $bobot_13->bobot; ?>"
                           data-bobot_14="<?php echo $bobot_14->bobot; ?>"
                           data-bobot_15="<?php echo $bobot_15->bobot; ?>">
                            <button type="submit" name="edit_pangan" id="edit_pangan" class="btn btn-sm btn-primary col-sm-12">
                                <i class="ace-icon fa fa-pencil-square-o"></i>
                                Perbarui
                            </button>
                        </a>
                    </td>
                </tr>
                <!--| End: SUM dan Tombol Aksi |-->
                </tfoot>
            </table>
            </form>
        </div>

        <!--| Start: Modal Edit Pangan |-->
        <div id="modal-edit-pangan" class="modal fade" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header no-padding no-border">
                        <div class="table-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                                <span class="white">&times;</span>
                            </button>
                            <strong>Alternatif: Paket Pangan</strong>
                        </div>
                    </div>
                    <form action="" id="form-edit-pangan" method="post" enctype="multipart/form-data">
                        <div class="modal-body" id="modal-body-edit-pangan">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th colspan="2">Kriteria</th>
                                    <th>Bobot</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <input type="hidden" id="id_bobot_11" name="id_bobot_11" value="<?php echo $id_bobot_11->id_bobot; ?>" />
                                    <td class="col-xs-3 col-sm-3">Korban Terdampak</td>
                                    <td class="col-xs-1 col-sm-1"></td>
                                    <td>
                                        <input type="number" id="korban_terdampak_1" name="korban_terdampak_1"
                                               maxlength="3" class="col-xs-12 col-sm-12" />
                                    </td>
                                </tr>
                                <tr>
                                    <input type="hidden" id="id_bobot_12" name="id_bobot_12" value="<?php echo $id_bobot_12->id_bobot; ?>" />
                                    <td class="col-xs-3 col-sm-3">Korban Mengungsi</td>
                                    <td class="col-xs-1 col-sm-1"></td>
                                    <td>
                                        <input type="number" id="korban_mengungsi_1" name="korban_mengungsi_1"
                                               maxlength="3" class="col-xs-12 col-sm-12" />
                                    </td>
                                </tr>
                                <tr>
                                    <input type="hidden" id="id_bobot_13" name="id_bobot_13" value="<?php echo $id_bobot_13->id_bobot; ?>" />
                                    <td class="col-xs-3 col-sm-3">Korban Luka</td>
                                    <td class="col-xs-1 col-sm-1"></td>
                                    <td>
                                        <input type="number" id="korban_luka_1" name="korban_luka_1"
                                               maxlength="3" class="col-xs-12 col-sm-12" />
                                    </td>
                                </tr>
                                <tr>
                                    <input type="hidden" id="id_bobot_14" name="id_bobot_14" value="<?php echo $id_bobot_14->id_bobot; ?>" />
                                    <td class="col-xs-3 col-sm-3">Korban Meninggal dan Hilang</td>
                                    <td class="col-xs-1 col-sm-1"></td>
                                    <td>
                                        <input type="number" id="korban_meninggal_hilang_1" name="korban_meninggal_hilang_1"
                                               maxlength="3" class="col-xs-12 col-sm-12" />
                                    </td>
                                </tr>
                                <tr>
                                    <input type="hidden" id="id_bobot_15" name="id_bobot_15" value="<?php echo $id_bobot_15->id_bobot; ?>" />
                                    <td class="col-xs-3 col-sm-3">Pasca Bencana</td>
                                    <td class="col-xs-1 col-sm-1"></td>
                                    <td>
                                        <input type="number" id="pasca_bencana_1" name="pasca_bencana_1"
                                               maxlength="3" class="col-xs-12 col-sm-12" />
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="modal-footer no-margin-top">
                            <button class="btn btn-sm btn-danger" data-dismiss="modal">
                                <i class="ace-icon fa fa-times"></i>
                                Batal
                            </button>

                            <button type="submit" name="update" class="btn btn-sm btn-primary">
                                <i class="ace-icon fa fa-floppy-o"></i>
                                Simpan
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <!--| Start: Proses Edit Data Pangan |-->
            <script src="../../assets/js/jquery-2.1.4.min.js"></script>
            <script type="text/javascript">
                $(document).on("click", "#btn-edit-pangan", function () {
                    var j_korban_terdampak_1            = $(this).data('bobot_11');
                    var j_korban_mengungsi_1            = $(this).data('bobot_12');
                    var j_korban_luka_1                 = $(this).data('bobot_13');
                    var j_korban_meninggal_hilang_1     = $(this).data('bobot_14');
                    var j_pasca_bencana_1               = $(this).data('bobot_15');

                    $("#modal-body-edit-pangan #korban_terdampak_1").val(j_korban_terdampak_1);
                    $("#modal-body-edit-pangan #korban_mengungsi_1").val(j_korban_mengungsi_1);
                    $("#modal-body-edit-pangan #korban_luka_1").val(j_korban_luka_1);
                    $("#modal-body-edit-pangan #korban_meninggal_hilang_1").val(j_korban_meninggal_hilang_1);
                    $("#modal-body-edit-pangan #pasca_bencana_1").val(j_pasca_bencana_1);
                });

                $(document).ready(function (e) {
                    $("#form-edit-pangan").on("submit", (function (e) {
                        e.preventDefault();
                        $.ajax({
                            url: '../../models/ketua/pu_pembobotan_pangan.php',
                            type: 'POST',
                            data: new FormData(this),
                            contentType: false,
                            cache: false,
                            processData: false,
                            success: function (msg) {
                                $('.table').html(msg);
                            }
                        });
                    }));
                });
            </script>
            <!--| End: Proses Edit Data Pangan |-->
        </div>
        <!--| End: Modal Edit Data Pangan |-->
        <!--| End: Alternatif Pangan |-->

        <!--| Start: Alternatif Sandang |-->
        <div class="col-sm-3">
            <div class="table-header center">
                Alternatif: <strong>Paket Sandang</strong>
            </div>

            <form name="alt_sandang" method="post" enctype="multipart/form-data">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th class="center">No</th>
                        <th>Kriteria</th>
                        <th class="center">Utility</th>
                        <th  class="center">Bobot</th>
                    </tr>
                    </thead>

                    <tbody>
                    <!--| Start: Sandang -> Jml. Korban Terdampak |-->
                    <tr>
                        <td class="center" rowspan="5">1</td>
                        <td><strong>Jumlah Korban Terdampak</strong></td>
                        <td></td>
                        <td class="center" rowspan="5"><?php echo $bobot_21->bobot; ?></td>
                    </tr>
                    <ul>
                        <tr>
                            <td><li>1 s.d. 20</li></td>
                            <td class="center">25</td>
                        </tr>
                        <tr>
                            <td><li>21 s.d. 30</li></td>
                            <td class="center">50</td>
                        </tr>
                        <tr>
                            <td><li>31 s.d. 50</li></td>
                            <td class="center">75</td>
                        </tr>
                        <tr>
                            <td><li>> 50</li></td>
                            <td class="center">100</td>
                        </tr>
                    </ul>
                    <!--| End: Sandang -> Jml. Korban Terdampak |-->

                    <!--| Start: Sandang -> Jml. Korban Mengungsi |-->
                    <tr>
                        <td class="center" rowspan="6">2</td>
                        <td><strong>Jumlah Korban Mengungsi</strong></td>
                        <td></td>
                        <td class="center" rowspan="6"><?php echo $bobot_22->bobot; ?></td>
                    </tr>
                    <ul>
                        <tr>
                            <td><li>0</li></td>
                            <td class="center">0</td>
                        </tr>
                        <tr>
                            <td><li>1 s.d. 10</li></td>
                            <td class="center">25</td>
                        </tr>
                        <tr>
                            <td><li>11 s.d. 20</li></td>
                            <td class="center">50</td>
                        </tr>
                        <tr>
                            <td><li>21 s.d. 30</li></td>
                            <td class="center">75</td>
                        </tr>
                        <tr>
                            <td><li>> 30</li></td>
                            <td class="center">100</td>
                        </tr>
                    </ul>
                    <!--| End: Sandang -> Jml. Korban Mengungsi |-->

                    <!--| Start: Sandang -> Jml. Korban Luka |-->
                    <tr>
                        <td class="center" rowspan="6">3</td>
                        <td><strong>Jumlah Korban Luka</strong></td>
                        <td></td>
                        <td class="center" rowspan="6"><?php echo $bobot_23->bobot; ?></td>
                    </tr>
                    <ul>
                        <tr>
                            <td><li>0</li></td>
                            <td class="center">0</td>
                        </tr>
                        <tr>
                            <td><li>1 s.d. 5</li></td>
                            <td class="center">25</td>
                        </tr>
                        <tr>
                            <td><li>6 s.d. 10</li></td>
                            <td class="center">50</td>
                        </tr>
                        <tr>
                            <td><li>11 s.d. 15</li></td>
                            <td class="center">75</td>
                        </tr>
                        <tr>
                            <td><li>> 15</li></td>
                            <td class="center">100</td>
                        </tr>
                    </ul>
                    <!--| End: Sandang -> Jml. Korban Luka |-->

                    <!--| Start: Sandang -> Jml. Korban Meninggal dan Hilang |-->
                    <tr>
                        <td class="center" rowspan="6">4</td>
                        <td><strong>Jumlah Korban Meninggal dan Hilang</strong></td>
                        <td></td>
                        <td class="center" rowspan="6"><?php echo $bobot_24->bobot; ?></td>
                    </tr>
                    <ul>
                        <tr>
                            <td><li>0</li></td>
                            <td class="center">0</td>
                        </tr>
                        <tr>
                            <td><li>1</li></td>
                            <td class="center">25</td>
                        </tr>
                        <tr>
                            <td><li>2</li></td>
                            <td class="center">50</td>
                        </tr>
                        <tr>
                            <td><li>3</li></td>
                            <td class="center">75</td>
                        </tr>
                        <tr>
                            <td><li>> 3</li></td>
                            <td class="center"></td>
                        </tr>
                    </ul>
                    <!--| End: Sandang -> Jml. Korban Meninggal dan Hilang |-->

                    <!--| Start: Sandang -> Kondisi Pasca Bencana |-->
                    <tr>
                        <td class="center" rowspan="5">5</td>
                        <td><strong>Kondisi Pasca Bencana</strong></td>
                        <td></td>
                        <td class="center" rowspan="5"><?php echo $bobot_25->bobot; ?></td>
                    </tr>
                    <ul>
                        <tr>
                            <td><li>Normal</li></td>
                            <td class="center">0</td>
                        </tr>
                        <tr>
                            <td><li>Waspada</li></td>
                            <td class="center">30</td>
                        </tr>
                        <tr>
                            <td><li>Siaga</li></td>
                            <td class="center">70</td>
                        </tr>
                        <tr>
                            <td><li>Awas</li></td>
                            <td class="center">100</td>
                        </tr>
                    </ul>
                    <!--| End: Sandang -> Kondisi Pasca Bencana |-->
                    </tbody>

                    <tfoot>
                    <!--| Start: SUM dan Tombol Aksi |-->
                    <tr>
                        <td class="center" colspan="3"><strong>Total</strong></td>
                        <td class="center">
                            <strong>
                                <?php
                                $total_sandang = $bobot_21->bobot + $bobot_22->bobot + $bobot_23->bobot + $bobot_24->bobot + $bobot_25->bobot;
                                echo $total_sandang;
                                ?>
                            </strong>
                        </td>
                    </tr>
                    <tr>
                        <td class="center" colspan="4">
                            <a id="btn-edit-sandang" role="button" data-toggle="modal" data-target="#modal-edit-sandang"
                               data-bobot_21="<?php echo $bobot_21->bobot; ?>"
                               data-bobot_22="<?php echo $bobot_22->bobot; ?>"
                               data-bobot_23="<?php echo $bobot_23->bobot; ?>"
                               data-bobot_24="<?php echo $bobot_24->bobot; ?>"
                               data-bobot_25="<?php echo $bobot_25->bobot; ?>">
                                <button type="submit" name="edit_sandang" id="edit_sandang" class="btn btn-sm btn-primary col-sm-12">
                                    <i class="ace-icon fa fa-pencil-square-o"></i>
                                    Perbarui
                                </button>
                            </a>
                        </td>
                    </tr>
                    <!--| End: SUM dan Tombol Aksi |-->
                    </tfoot>
                </table>
            </form>
        </div>
        <!--| Start: Modal Edit Data Sandang |-->
        <div id="modal-edit-sandang" class="modal fade" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header no-padding no-border">
                        <div class="table-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                                <span class="white">&times;</span>
                            </button>
                            <strong>Alternatif: Paket Sandang</strong>
                        </div>
                    </div>
                    <form action="" id="form-edit-sandang" method="post" enctype="multipart/form-data">
                        <div class="modal-body" id="modal-body-edit-sandang">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th colspan="2">Kriteria</th>
                                    <th>Bobot</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <input type="hidden" id="id_bobot_21" name="id_bobot_21" value="<?php echo $id_bobot_21->id_bobot; ?>" />
                                    <td class="col-xs-3 col-sm-3">Korban Terdampak</td>
                                    <td class="col-xs-1 col-sm-1"></td>
                                    <td>
                                        <input type="number" id="korban_terdampak_2" name="korban_terdampak_2"
                                               maxlength="3" class="col-xs-12 col-sm-12" />
                                    </td>
                                </tr>
                                <tr>
                                    <input type="hidden" id="id_bobot_22" name="id_bobot_22" value="<?php echo $id_bobot_22->id_bobot; ?>" />
                                    <td class="col-xs-3 col-sm-3">Korban Mengungsi</td>
                                    <td class="col-xs-1 col-sm-1"></td>
                                    <td>
                                        <input type="number" id="korban_mengungsi_2" name="korban_mengungsi_2"
                                               maxlength="3" class="col-xs-12 col-sm-12" />
                                    </td>
                                </tr>
                                <tr>
                                    <input type="hidden" id="id_bobot_23" name="id_bobot_23" value="<?php echo $id_bobot_23->id_bobot; ?>" />
                                    <td class="col-xs-3 col-sm-3">Korban Luka</td>
                                    <td class="col-xs-1 col-sm-1"></td>
                                    <td>
                                        <input type="number" id="korban_luka_2" name="korban_luka_2"
                                               maxlength="3" class="col-xs-12 col-sm-12" />
                                    </td>
                                </tr>
                                <tr>
                                    <input type="hidden" id="id_bobot_24" name="id_bobot_24" value="<?php echo $id_bobot_24->id_bobot; ?>" />
                                    <td class="col-xs-3 col-sm-3">Korban Meninggal dan Hilang</td>
                                    <td class="col-xs-1 col-sm-1"></td>
                                    <td>
                                        <input type="number" id="korban_meninggal_hilang_2" name="korban_meninggal_hilang_2"
                                               maxlength="3" class="col-xs-12 col-sm-12" />
                                    </td>
                                </tr>
                                <tr>
                                    <input type="hidden" id="id_bobot_25" name="id_bobot_25" value="<?php echo $id_bobot_25->id_bobot; ?>" />
                                    <td class="col-xs-3 col-sm-3">Pasca Bencana</td>
                                    <td class="col-xs-1 col-sm-1"></td>
                                    <td>
                                        <input type="number" id="pasca_bencana_2" name="pasca_bencana_2"
                                               maxlength="3" class="col-xs-12 col-sm-12" />
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="modal-footer no-margin-top">
                            <button class="btn btn-sm btn-danger" data-dismiss="modal">
                                <i class="ace-icon fa fa-times"></i>
                                Batal
                            </button>

                            <button type="submit" name="update" class="btn btn-sm btn-primary">
                                <i class="ace-icon fa fa-floppy-o"></i>
                                Simpan
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <!--| Start: Proses Edit Data Sandang |-->
            <script src="../../assets/js/jquery-2.1.4.min.js"></script>
            <script type="text/javascript">
                $(document).on("click", "#btn-edit-sandang", function () {
                    var j_korban_terdampak_2            = $(this).data('bobot_21');
                    var j_korban_mengungsi_2            = $(this).data('bobot_22');
                    var j_korban_luka_2                 = $(this).data('bobot_23');
                    var j_korban_meninggal_hilang_2     = $(this).data('bobot_24');
                    var j_pasca_bencana_2               = $(this).data('bobot_25');

                    $("#modal-body-edit-sandang #korban_terdampak_2").val(j_korban_terdampak_2);
                    $("#modal-body-edit-sandang #korban_mengungsi_2").val(j_korban_mengungsi_2);
                    $("#modal-body-edit-sandang #korban_luka_2").val(j_korban_luka_2);
                    $("#modal-body-edit-sandang #korban_meninggal_hilang_2").val(j_korban_meninggal_hilang_2);
                    $("#modal-body-edit-sandang #pasca_bencana_2").val(j_pasca_bencana_2);
                });

                $(document).ready(function (e) {
                    $("#form-edit-sandang").on("submit", (function (e) {
                        e.preventDefault();
                        $.ajax({
                            url: '../../models/ketua/pu_pembobotan_sandang.php',
                            type: 'POST',
                            data: new FormData(this),
                            contentType: false,
                            cache: false,
                            processData: false,
                            success: function (msg) {
                                $('.table').html(msg);
                            }
                        });
                    }));
                });
            </script>
            <!--| End: Proses Edit Data Sandang |-->
        </div>
        <!--| End: Modal Edit Data Sandang |-->
        <!--| End: Alternatif Sandang |-->

        <!--| Start: Alternatif Kematian |-->
        <div class="col-sm-3">
            <div class="table-header center">
                Alternatif: <strong>Paket Kematian</strong>
            </div>

            <form name="alt_kematian" method="post" enctype="multipart/form-data">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th class="center">No</th>
                        <th>Kriteria</th>
                        <th class="center">Utility</th>
                        <th  class="center">Bobot</th>
                    </tr>
                    </thead>

                    <tbody>
                    <!--| Start: Kematian -> Jml. Korban Terdampak |-->
                    <tr>
                        <td class="center" rowspan="5">1</td>
                        <td><strong>Jumlah Korban Terdampak</strong></td>
                        <td></td>
                        <td class="center" rowspan="5"><?php echo $bobot_31->bobot; ?></td>
                    </tr>
                    <ul>
                        <tr>
                            <td><li>1 s.d. 20</li></td>
                            <td class="center">25</td>
                        </tr>
                        <tr>
                            <td><li>21 s.d. 30</li></td>
                            <td class="center">50</td>
                        </tr>
                        <tr>
                            <td><li>31 s.d. 50</li></td>
                            <td class="center">75</td>
                        </tr>
                        <tr>
                            <td><li>> 50</li></td>
                            <td class="center">100</td>
                        </tr>
                    </ul>
                    <!--| End: Kematian -> Jml. Korban Terdampak |-->

                    <!--| Start: Kematian -> Jml. Korban Mengungsi |-->
                    <tr>
                        <td class="center" rowspan="6">2</td>
                        <td><strong>Jumlah Korban Mengungsi</strong></td>
                        <td></td>
                        <td class="center" rowspan="6"><?php echo $bobot_32->bobot; ?></td>
                    </tr>
                    <ul>
                        <tr>
                            <td><li>0</li></td>
                            <td class="center">0</td>
                        </tr>
                        <tr>
                            <td><li>1 s.d. 10</li></td>
                            <td class="center">25</td>
                        </tr>
                        <tr>
                            <td><li>11 s.d. 20</li></td>
                            <td class="center">50</td>
                        </tr>
                        <tr>
                            <td><li>21 s.d. 30</li></td>
                            <td class="center">75</td>
                        </tr>
                        <tr>
                            <td><li>> 30</li></td>
                            <td class="center">100</td>
                        </tr>
                    </ul>
                    <!--| End: Kematian -> Jml. Korban Mengungsi |-->

                    <!--| Start: Kematian -> Jml. Korban Luka |-->
                    <tr>
                        <td class="center" rowspan="6">3</td>
                        <td><strong>Jumlah Korban Luka</strong></td>
                        <td></td>
                        <td class="center" rowspan="6"><?php echo $bobot_33->bobot; ?></td>
                    </tr>
                    <ul>
                        <tr>
                            <td><li>0</li></td>
                            <td class="center">0</td>
                        </tr>
                        <tr>
                            <td><li>1 s.d. 5</li></td>
                            <td class="center">25</td>
                        </tr>
                        <tr>
                            <td><li>6 s.d. 10</li></td>
                            <td class="center">50</td>
                        </tr>
                        <tr>
                            <td><li>11 s.d. 15</li></td>
                            <td class="center">75</td>
                        </tr>
                        <tr>
                            <td><li>> 15</li></td>
                            <td class="center">100</td>
                        </tr>
                    </ul>
                    <!--| End: Kematian -> Jml. Korban Luka |-->

                    <!--| Start: Kematian -> Jml. Korban Meninggal dan Hilang |-->
                    <tr>
                        <td class="center" rowspan="6">4</td>
                        <td><strong>Jumlah Korban Meninggal dan Hilang</strong></td>
                        <td></td>
                        <td class="center" rowspan="6"><?php echo $bobot_34->bobot; ?></td>
                    </tr>
                    <ul>
                        <tr>
                            <td><li>0</li></td>
                            <td class="center">0</td>
                        </tr>
                        <tr>
                            <td><li>1</li></td>
                            <td class="center">25</td>
                        </tr>
                        <tr>
                            <td><li>2</li></td>
                            <td class="center">50</td>
                        </tr>
                        <tr>
                            <td><li>3</li></td>
                            <td class="center">75</td>
                        </tr>
                        <tr>
                            <td><li>> 3</li></td>
                            <td class="center"></td>
                        </tr>
                    </ul>
                    <!--| End: Kematian -> Jml. Korban Meninggal dan Hilang |-->

                    <!--| Start: Kematian -> Kondisi Pasca Bencana |-->
                    <tr>
                        <td class="center" rowspan="5">5</td>
                        <td><strong>Kondisi Pasca Bencana</strong></td>
                        <td></td>
                        <td class="center" rowspan="5"><?php echo $bobot_35->bobot; ?></td>
                    </tr>
                    <ul>
                        <tr>
                            <td><li>Normal</li></td>
                            <td class="center">0</td>
                        </tr>
                        <tr>
                            <td><li>Waspada</li></td>
                            <td class="center">30</td>
                        </tr>
                        <tr>
                            <td><li>Siaga</li></td>
                            <td class="center">70</td>
                        </tr>
                        <tr>
                            <td><li>Awas</li></td>
                            <td class="center">100</td>
                        </tr>
                    </ul>
                    <!--| End: Kematian -> Kondisi Pasca Bencana |-->
                    </tbody>

                    <tfoot>
                    <!--| End: SUM dan Tombol Aksi |-->
                    <tr>
                        <td class="center" colspan="3"><strong>Total</strong></td>
                        <td class="center">
                            <strong>
                                <?php
                                $total_kematian = $bobot_31->bobot + $bobot_32->bobot + $bobot_33->bobot + $bobot_34->bobot + $bobot_35->bobot;
                                echo $total_kematian;
                                ?>
                            </strong>
                        </td>
                    </tr>
                    <tr>
                        <td class="center" colspan="4">
                            <a id="btn-edit-kematian" role="button" data-toggle="modal" data-target="#modal-edit-kematian"
                               data-bobot_31="<?php echo $bobot_31->bobot; ?>"
                               data-bobot_32="<?php echo $bobot_32->bobot; ?>"
                               data-bobot_33="<?php echo $bobot_33->bobot; ?>"
                               data-bobot_34="<?php echo $bobot_34->bobot; ?>"
                               data-bobot_35="<?php echo $bobot_35->bobot; ?>">
                                <button type="submit" name="edit_kematian" id="edit_kematian" class="btn btn-sm btn-primary col-sm-12">
                                    <i class="ace-icon fa fa-pencil-square-o"></i>
                                    Perbarui
                                </button>
                            </a>
                        </td>
                    </tr>
                    <!--| End: SUM dan Tombol Aksi |-->
                    </tfoot>
                </table>
            </form>
        </div>
        
        <!--| Start: Modal Edit Kematian |-->
        <div id="modal-edit-kematian" class="modal fade" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header no-padding no-border">
                        <div class="table-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                                <span class="white">&times;</span>
                            </button>
                            <strong>Alternatif: Paket Kematian</strong>
                        </div>
                    </div>
                    <form action="" id="form-edit-kematian" method="post" enctype="multipart/form-data">
                        <div class="modal-body" id="modal-body-edit-kematian">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th colspan="2">Kriteria</th>
                                    <th>Bobot</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <input type="hidden" id="id_bobot_31" name="id_bobot_31" value="<?php echo $id_bobot_31->id_bobot; ?>" />
                                    <td class="col-xs-3 col-sm-3">Korban Terdampak</td>
                                    <td class="col-xs-1 col-sm-1"></td>
                                    <td>
                                        <input type="number" id="korban_terdampak_3" name="korban_terdampak_3"
                                               maxlength="3" class="col-xs-12 col-sm-12" />
                                    </td>
                                </tr>
                                <tr>
                                    <input type="hidden" id="id_bobot_32" name="id_bobot_32" value="<?php echo $id_bobot_32->id_bobot; ?>" />
                                    <td class="col-xs-3 col-sm-3">Korban Mengungsi</td>
                                    <td class="col-xs-1 col-sm-1"></td>
                                    <td>
                                        <input type="number" id="korban_mengungsi_3" name="korban_mengungsi_3"
                                               maxlength="3" class="col-xs-12 col-sm-12" />
                                    </td>
                                </tr>
                                <tr>
                                    <input type="hidden" id="id_bobot_33" name="id_bobot_33" value="<?php echo $id_bobot_33->id_bobot; ?>" />
                                    <td class="col-xs-3 col-sm-3">Korban Luka</td>
                                    <td class="col-xs-1 col-sm-1"></td>
                                    <td>
                                        <input type="number" id="korban_luka_3" name="korban_luka_3"
                                               maxlength="3" class="col-xs-12 col-sm-12" />
                                    </td>
                                </tr>
                                <tr>
                                    <input type="hidden" id="id_bobot_34" name="id_bobot_34" value="<?php echo $id_bobot_34->id_bobot; ?>" />
                                    <td class="col-xs-3 col-sm-3">Korban Meninggal dan Hilang</td>
                                    <td class="col-xs-1 col-sm-1"></td>
                                    <td>
                                        <input type="number" id="korban_meninggal_hilang_3" name="korban_meninggal_hilang_3"
                                               maxlength="3" class="col-xs-12 col-sm-12" />
                                    </td>
                                </tr>
                                <tr>
                                    <input type="hidden" id="id_bobot_35" name="id_bobot_35" value="<?php echo $id_bobot_35->id_bobot; ?>" />
                                    <td class="col-xs-3 col-sm-3">Pasca Bencana</td>
                                    <td class="col-xs-1 col-sm-1"></td>
                                    <td>
                                        <input type="number" id="pasca_bencana_3" name="pasca_bencana_3"
                                               maxlength="3" class="col-xs-12 col-sm-12" />
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="modal-footer no-margin-top">
                            <button class="btn btn-sm btn-danger" data-dismiss="modal">
                                <i class="ace-icon fa fa-times"></i>
                                Batal
                            </button>

                            <button type="submit" name="update" class="btn btn-sm btn-primary">
                                <i class="ace-icon fa fa-floppy-o"></i>
                                Simpan
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <!--| Start: Proses Edit Data Pangan |-->
            <script src="../../assets/js/jquery-2.1.4.min.js"></script>
            <script type="text/javascript">
                $(document).on("click", "#btn-edit-kematian", function () {
                    var j_korban_terdampak_3            = $(this).data('bobot_31');
                    var j_korban_mengungsi_3            = $(this).data('bobot_32');
                    var j_korban_luka_3                 = $(this).data('bobot_33');
                    var j_korban_meninggal_hilang_3     = $(this).data('bobot_34');
                    var j_pasca_bencana_3               = $(this).data('bobot_35');

                    $("#modal-body-edit-kematian #korban_terdampak_3").val(j_korban_terdampak_3);
                    $("#modal-body-edit-kematian #korban_mengungsi_3").val(j_korban_mengungsi_3);
                    $("#modal-body-edit-kematian #korban_luka_3").val(j_korban_luka_3);
                    $("#modal-body-edit-kematian #korban_meninggal_hilang_3").val(j_korban_meninggal_hilang_3);
                    $("#modal-body-edit-kematian #pasca_bencana_3").val(j_pasca_bencana_3);
                });

                $(document).ready(function (e) {
                    $("#form-edit-kematian").on("submit", (function (e) {
                        e.preventDefault();
                        $.ajax({
                            url: '../../models/ketua/pu_pembobotan_kematian.php',
                            type: 'POST',
                            data: new FormData(this),
                            contentType: false,
                            cache: false,
                            processData: false,
                            success: function (msg) {
                                $('.table').html(msg);
                            }
                        });
                    }));
                });
            </script>
            <!--| End: Proses Edit Data Pangan |-->
        </div>
        <!--| End: Modal Edit Data Pangan |-->
        <!--| End: Alternatif Kematian |-->

        <!--| Start: Alternatif Lainnya |-->
        <div class="col-sm-3">
            <div class="table-header center">
                Alternatif: <strong>Paket Lainnya</strong>
            </div>

            <form name="alt_lainnya" method="post" enctype="multipart/form-data">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th class="center">No</th>
                        <th>Kriteria</th>
                        <th class="center">Utility</th>
                        <th  class="center">Bobot</th>
                    </tr>
                    </thead>

                    <tbody>
                    <!--| Start: Lainnya -> Jml. Korban Terdampak |-->
                    <tr>
                        <td class="center" rowspan="5">1</td>
                        <td><strong>Jumlah Korban Terdampak</strong></td>
                        <td></td>
                        <td class="center" rowspan="5"><?php echo $bobot_41->bobot; ?></td>
                    </tr>
                    <ul>
                        <tr>
                            <td><li>1 s.d. 20</li></td>
                            <td class="center">25</td>
                        </tr>
                        <tr>
                            <td><li>21 s.d. 30</li></td>
                            <td class="center">50</td>
                        </tr>
                        <tr>
                            <td><li>31 s.d. 50</li></td>
                            <td class="center">75</td>
                        </tr>
                        <tr>
                            <td><li>> 50</li></td>
                            <td class="center">100</td>
                        </tr>
                    </ul>
                    <!--| End: Lainnya -> Jml. Korban Terdampak |-->

                    <!--| Start: Lainnya -> Jml. Korban Mengungsi |-->
                    <tr>
                        <td class="center" rowspan="6">2</td>
                        <td><strong>Jumlah Korban Mengungsi</strong></td>
                        <td></td>
                        <td class="center" rowspan="6"><?php echo $bobot_42->bobot; ?></td>
                    </tr>
                    <ul>
                        <tr>
                            <td><li>0</li></td>
                            <td class="center">0</td>
                        </tr>
                        <tr>
                            <td><li>1 s.d. 10</li></td>
                            <td class="center">25</td>
                        </tr>
                        <tr>
                            <td><li>11 s.d. 20</li></td>
                            <td class="center">50</td>
                        </tr>
                        <tr>
                            <td><li>21 s.d. 30</li></td>
                            <td class="center">75</td>
                        </tr>
                        <tr>
                            <td><li>> 30</li></td>
                            <td class="center">100</td>
                        </tr>
                    </ul>
                    <!--| End: lainnya -> Jml. Korban Mengungsi |-->

                    <!--| Start: lainnya -> Jml. Korban Luka |-->
                    <tr>
                        <td class="center" rowspan="6">3</td>
                        <td><strong>Jumlah Korban Luka</strong></td>
                        <td></td>
                        <td class="center" rowspan="6"><?php echo $bobot_43->bobot; ?></td>
                    </tr>
                    <ul>
                        <tr>
                            <td><li>0</li></td>
                            <td class="center">0</td>
                        </tr>
                        <tr>
                            <td><li>1 s.d. 5</li></td>
                            <td class="center">25</td>
                        </tr>
                        <tr>
                            <td><li>6 s.d. 10</li></td>
                            <td class="center">50</td>
                        </tr>
                        <tr>
                            <td><li>11 s.d. 15</li></td>
                            <td class="center">75</td>
                        </tr>
                        <tr>
                            <td><li>> 15</li></td>
                            <td class="center">100</td>
                        </tr>
                    </ul>
                    <!--| End: Lainnya -> Jml. Korban Luka |-->

                    <!--| Start: Lainnya -> Jml. Korban Meninggal dan Hilang |-->
                    <tr>
                        <td class="center" rowspan="6">4</td>
                        <td><strong>Jumlah Korban Meninggal dan Hilang</strong></td>
                        <td></td>
                        <td class="center" rowspan="6"><?php echo $bobot_44->bobot; ?></td>
                    </tr>
                    <ul>
                        <tr>
                            <td><li>0</li></td>
                            <td class="center">0</td>
                        </tr>
                        <tr>
                            <td><li>1</li></td>
                            <td class="center">25</td>
                        </tr>
                        <tr>
                            <td><li>2</li></td>
                            <td class="center">50</td>
                        </tr>
                        <tr>
                            <td><li>3</li></td>
                            <td class="center">75</td>
                        </tr>
                        <tr>
                            <td><li>> 3</li></td>
                            <td class="center"></td>
                        </tr>
                    </ul>
                    <!--| End: Lainnya -> Jml. Korban Meninggal dan Hilang |-->

                    <!--| Start: Lainnya -> Kondisi Pasca Bencana |-->
                    <tr>
                        <td class="center" rowspan="5">5</td>
                        <td><strong>Kondisi Pasca Bencana</strong></td>
                        <td></td>
                        <td class="center" rowspan="5"><?php echo $bobot_45->bobot; ?></td>
                    </tr>
                    <ul>
                        <tr>
                            <td><li>Normal</li></td>
                            <td class="center">0</td>
                        </tr>
                        <tr>
                            <td><li>Waspada</li></td>
                            <td class="center">30</td>
                        </tr>
                        <tr>
                            <td><li>Siaga</li></td>
                            <td class="center">70</td>
                        </tr>
                        <tr>
                            <td><li>Awas</li></td>
                            <td class="center">100</td>
                        </tr>
                    </ul>
                    <!--| End: Lainnya -> Kondisi Pasca Bencana |-->
                    </tbody>

                    <tfoot>
                    <!--| End: SUM dan Tombol Aksi |-->
                    <tr>
                        <td class="center" colspan="3"><strong>Total</strong></td>
                        <td class="center">
                            <strong>
                                <?php
                                $total_lainnya = $bobot_41->bobot + $bobot_42->bobot + $bobot_43->bobot + $bobot_44->bobot + $bobot_45->bobot;
                                echo $total_lainnya;
                                ?>
                            </strong>
                        </td>
                    </tr>
                    <tr>
                        <td class="center" colspan="4">
                            <a id="btn-edit-lainnya" role="button" data-toggle="modal" data-target="#modal-edit-lainnya"
                               data-bobot_41="<?php echo $bobot_41->bobot; ?>"
                               data-bobot_42="<?php echo $bobot_42->bobot; ?>"
                               data-bobot_43="<?php echo $bobot_43->bobot; ?>"
                               data-bobot_44="<?php echo $bobot_44->bobot; ?>"
                               data-bobot_45="<?php echo $bobot_45->bobot; ?>">
                                <button type="submit" name="edit_lainnya" id="edit_lainnya" class="btn btn-sm btn-primary col-sm-12">
                                    <i class="ace-icon fa fa-pencil-square-o"></i>
                                    Perbarui
                                </button>
                            </a>
                        </td>
                    </tr>
                    <!--| End: SUM dan Tombol Aksi |-->
                    </tfoot>
                </table>
            </form>
        </div>

        <!--| Start: Modal Edit Lainnya |-->
        <div id="modal-edit-lainnya" class="modal fade" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header no-padding no-border">
                        <div class="table-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                                <span class="white">&times;</span>
                            </button>
                            <strong>Alternatif: Paket Lainnya</strong>
                        </div>
                    </div>
                    <form action="" id="form-edit-lainnya" method="post" enctype="multipart/form-data">
                        <div class="modal-body" id="modal-body-edit-lainnya">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th colspan="2">Kriteria</th>
                                    <th>Bobot</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <input type="hidden" id="id_bobot_41" name="id_bobot_41" value="<?php echo $id_bobot_41->id_bobot; ?>" />
                                    <td class="col-xs-3 col-sm-3">Korban Terdampak</td>
                                    <td class="col-xs-1 col-sm-1"></td>
                                    <td>
                                        <input type="number" id="korban_terdampak_4" name="korban_terdampak_4"
                                               maxlength="3" class="col-xs-12 col-sm-12" />
                                    </td>
                                </tr>
                                <tr>
                                    <input type="hidden" id="id_bobot_42" name="id_bobot_42" value="<?php echo $id_bobot_42->id_bobot; ?>" />
                                    <td class="col-xs-3 col-sm-3">Korban Mengungsi</td>
                                    <td class="col-xs-1 col-sm-1"></td>
                                    <td>
                                        <input type="number" id="korban_mengungsi_4" name="korban_mengungsi_4"
                                               maxlength="3" class="col-xs-12 col-sm-12" />
                                    </td>
                                </tr>
                                <tr>
                                    <input type="hidden" id="id_bobot_43" name="id_bobot_43" value="<?php echo $id_bobot_43->id_bobot; ?>" />
                                    <td class="col-xs-3 col-sm-3">Korban Luka</td>
                                    <td class="col-xs-1 col-sm-1"></td>
                                    <td>
                                        <input type="number" id="korban_luka_4" name="korban_luka_4"
                                               maxlength="3" class="col-xs-12 col-sm-12" />
                                    </td>
                                </tr>
                                <tr>
                                    <input type="hidden" id="id_bobot_44" name="id_bobot_44" value="<?php echo $id_bobot_44->id_bobot; ?>" />
                                    <td class="col-xs-3 col-sm-3">Korban Meninggal dan Hilang</td>
                                    <td class="col-xs-1 col-sm-1"></td>
                                    <td>
                                        <input type="number" id="korban_meninggal_hilang_4" name="korban_meninggal_hilang_4"
                                               maxlength="3" class="col-xs-12 col-sm-12" />
                                    </td>
                                </tr>
                                <tr>
                                    <input type="hidden" id="id_bobot_45" name="id_bobot_45" value="<?php echo $id_bobot_45->id_bobot; ?>" />
                                    <td class="col-xs-3 col-sm-3">Pasca Bencana</td>
                                    <td class="col-xs-1 col-sm-1"></td>
                                    <td>
                                        <input type="number" id="pasca_bencana_4" name="pasca_bencana_4"
                                               maxlength="3" class="col-xs-12 col-sm-12" />
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="modal-footer no-margin-top">
                            <button class="btn btn-sm btn-danger" data-dismiss="modal">
                                <i class="ace-icon fa fa-times"></i>
                                Batal
                            </button>

                            <button type="submit" name="update" class="btn btn-sm btn-primary">
                                <i class="ace-icon fa fa-floppy-o"></i>
                                Simpan
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <!--| Start: Proses Edit Data Lainnya |-->
            <script src="../../assets/js/jquery-2.1.4.min.js"></script>
            <script type="text/javascript">
                $(document).on("click", "#btn-edit-lainnya", function () {
                    var j_korban_terdampak_4            = $(this).data('bobot_41');
                    var j_korban_mengungsi_4            = $(this).data('bobot_42');
                    var j_korban_luka_4                 = $(this).data('bobot_43');
                    var j_korban_mininggal_hilang_4     = $(this).data('bobot_44');
                    var j_pasca_bencana_4               = $(this).data('bobot_45');

                    $("#modal-body-edit-lainnya #korban_terdampak_4").val(j_korban_terdampak_4);
                    $("#modal-body-edit-lainnya #korban_mengungsi_4").val(j_korban_mengungsi_4);
                    $("#modal-body-edit-lainnya #korban_luka_4").val(j_korban_luka_4);
                    $("#modal-body-edit-lainnya #korban_meninggal_hilang_4").val(j_korban_mininggal_hilang_4);
                    $("#modal-body-edit-lainnya #pasca_bencana_4").val(j_pasca_bencana_4);
                });

                $(document).ready(function (e) {
                    $("#form-edit-lainnya").on("submit", (function (e) {
                        e.preventDefault();
                        $.ajax({
                            url: '../../models/ketua/pu_pembobotan_lainnya.php',
                            type: 'POST',
                            data: new FormData(this),
                            contentType: false,
                            cache: false,
                            processData: false,
                            success: function (msg) {
                                $('.table').html(msg);
                            }
                        });
                    }));
                });
            </script>
            <!--| End: Proses Edit Data Lainnya |-->
        </div>
        <!--| End: Modal Edit Data Lainnya |-->
        <!--| End: Alternatif Lainnya |-->
    </div>
    <!--| End: Content Area |-->

</div>
</body>