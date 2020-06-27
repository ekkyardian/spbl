<?php
/**
 * Created by PhpStorm.
 * User: Ekky Ardian Fitran
 * Date: 22/06/2020
 * Time: 18:26
 */

include "../../models/admin/AdmAkunLine.php";

$AdmAkunLine = new AdmAkunLine($connection);

if (@$_GET['act'] == '') {
?>

<body class="no-skin">
<div class="breadcrumbs ace-save-state" id="breadcrumbs">

    <!--| Start: URL Navigasi (Breadcrumb) |-->
    <ul class="breadcrumb">
        <li>
            <i class="ace-icon fa fa-bookmark home-icon"></i>
            <a href="?pages=beranda">SPBL</a>
        </li>
        <li><a href="#">Akun LINE</a></li>
        <li class="active">Semua Akun</li>
    </ul>
    <!--| End: URL Navigasi (Breadcrumb) |-->

    <!--| Start: Search Navigasi |-->
    <div class="nav-search" id="nav-search">
        <form class="form-search">
            <span class="input-icon">
            </span>
        </form>
    </div>
    <!--| End: Search Navigasi |-->

</div>
<div class="page-content">

    <!--| Start: Content Area |-->
    <div class="page-header">
        <h1>
            Akun LINE
            <small>
                <i class="ace-icon fa fa-angle-double-right"></i>
                Daftar Akun
            </small>
        </h1>
    </div>

    <!--| Start: Action Button |-->
    <div class="row">
        <div class="col-sm-6">
            <a href="#tambah-data" role="button" class="green" data-toggle="modal">
                <button class="btn btn-white btn-info btn-bold">
                    <i class="ace-icon glyphicon glyphicon-plus bigger-120 blue"></i>
                    Tambah Data
                </button>
            </a>
        </div>

        <div class="vspace-6-sm"></div>

        <div class="col-sm-6">
            <div class="clearfix">
                <div class="pull-right tableTools-container"></div>
            </div>
        </div>
    </div>
    <!--| End: Action Button |-->

    <div class="table-header">
        Hasil pencarian untuk data akun LINE
    </div>

    <!--| Start: Tabel Peristiwa Bencana |-->
    <div class="row">
        <div class="col-sm-12">
            <table id="dynamic-table" class="table table-striped table-bordered table-hover">
                <thead>
                <tr>
                    <th class="center">No</th>
                    <th>ID LINE</th>
                    <th>Display Name</th>
                    <th>URL Foto</th>
                    <th>User Pemilik</th>
                    <th></th>
                    <th style="visibility: hidden" class="no-border no-margin no-padding no-radius"></th>
                </tr>
                </thead>

                <tbody>
                <!--| Start: Get list Data: tb_peristiwa |-->
                <?php
                $no = 1;
                $tampil_akun_line = $AdmAkunLine->tampil_akun_line();
                while ($data = $tampil_akun_line->fetchObject()) {
                    ?>
                    <tr>
                        <td class="center"><?php echo $no++; ?></td>
                        <td><?php echo $data->id_line; ?></td>
                        <td><?php echo $data->display_name; ?></td>
                        <td><a href="https://<?php echo $data->url_foto; ?>" target="_blank"><?php echo $data->url_foto; ?></a></td>
                        <td>
                            <?php
                            $tampil_user = $AdmAkunLine->tampil_user($data->id_line);
                            $cek = $tampil_user->rowCount();

                            if ($cek > 0) {
                                $data_user = $tampil_user->fetchObject();
                                echo $data_user->nama_lengkap;
                            }
                            else {
                                echo "<span style='color: rgba(255,22,45,0.84)'><i>(Belum ditentukan)</i></span>";
                            }
                            ?>
                        </td>
                        <td align="center">
                            <div class="hidden-sm hidden-xs action-buttons">

                                <!-- Edit Button -->
                                <a id="update-data" role="button" class="green tooltip-success" data-rel="tooltip"
                                   title="Edit" data-toggle="modal" data-target="#update"
                                   data-id_line="<?php echo $data->id_line; ?>"
                                   data-display_name="<?php echo $data->display_name; ?>"
                                   data-url_foto="<?php echo $data->url_foto; ?>">
                                    <i class="ace-icon fa fa-pencil bigger-130"></i>
                                </a>

                                <!-- Hapus Button -->
                                <a href="?pages=akun_line&act=del&id=<?php echo $data->id_line; ?>" role="button"
                                   onclick="return confirm('Hapus akun LINE <?php echo $data->id_line." | ".$data->display_name; ?>?')"
                                   class="red tooltip-error" data-rel="tooltip" title="Hapus">
                                    <i class="ace-icon fa fa-trash-o bigger-130"></i>
                                </a>
                            </div>

                            <!--| Start: Menu aksi layar kecil |-->
                            <div class="hidden-md hidden-lg">
                                <div class="inline pos-rel">
                                    <button class="btn btn-minier btn-yellow dropdown-toggle" data-toggle="dropdown"
                                            data-position="auto">
                                        <i class="ace-icon fa fa-caret-down icon-only bigger-120"></i>
                                    </button>

                                    <ul class="dropdown-menu dropdown-only-icon dropdown-yellow dropdown-menu-right
                                    dropdown-caret dropdown-close">

                                        <!--| View Photo Profile |-->
                                        <li>
                                            <a href="?pages=kelola_akun&act=viewpic&id=<?php echo $data->id_user; ?>"
                                               class="tooltip-info" data-rel="tooltip" title="Foto">
                                                <span class="blue">
                                                    <i class="glyphicon glyphicon-picture bigger-120"></i>
                                                </span>
                                            </a>
                                        </li>

                                        <!--| Edit/Update |-->
                                        <li>
                                            <a id="update-data" role="button" class="tooltip-success" data-rel="tooltip"
                                               title="Edit"
                                               data-toggle="modal" data-target="#update"
                                               data-id_line="<?php echo $data->id_line; ?>"
                                               data-display_name="<?php echo $data->display_name; ?>"
                                               data-url_foto="<?php echo $data->url_foto; ?>">
                                                <span class="green">
                                                    <i class="ace-icon fa fa-pencil-square-o bigger-120"></i>
                                                </span>
                                            </a>
                                        </li>

                                        <!--| Hapus |-->
                                        <li>
                                            <a href="?pages=kelola_akun&act=del&id=<?php echo $data->id_user; ?>"
                                               role="button" class="tooltip-error" data-rel="tooltip" title="Delete"
                                               onclick="return confirm('Hapus data?')">
                                                <span class="red">
                                                    <i class="ace-icon fa fa-trash-o bigger-120"></i>
                                                </span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <!--| End: Menu aksi layar kecil |-->
                        </td>
                        <td style="visibility: hidden" class="no-border no-margin no-padding no-radius"></td>
                    </tr>
                <?php } ?>
                <!--| End: Get list data: tb_peristiwa |-->
                </tbody>
            </table>
        </div>
    </div>

    <!--| Start: Tambah Data Modal |-->
    <div id="tambah-data" class="modal fade" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header no-padding no-border">
                    <div class="table-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                            <span class="white">&times;</span>
                        </button>
                        <strong>Tambah Akun LINE Secara Manual</strong>
                    </div>
                </div>
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="modal-body">
                        <table class="table">
                            <tbody>
                            <tr>
                                <td class="col-xs-3 col-sm-3">ID LINE</td>
                                <td class="col-xs-1 col-sm-1">:</td>
                                <td>
                                    <input type="text" id="id_line" name="id_line" class="col-xs-12 col-sm-12"
                                    required/>
                                </td>
                            </tr>
                            <tr>
                                <td class="col-xs-3 col-sm-3">Display Name</td>
                                <td class="col-xs-1 col-sm-1">:</td>
                                <td>
                                    <input type="text" id="display_name" name="display_name" class="col-xs-12 col-sm-12" required/>
                                </td>
                            </tr>
                            <tr>
                                <td class="col-xs-3 col-sm-3">URL Foto</td>
                                <td class="col-xs-1 col-sm-1">:</td>
                                <td>
                                    <input type="text" id="url_foto" name="url_foto" class="col-xs-12 col-sm-12" required/>
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

                        <button type="submit" name="simpan" class="btn btn-sm btn-primary">
                            <i class="ace-icon fa fa-floppy-o"></i>
                            Simpan
                        </button>
                    </div>
                </form>
                <!--| Start: Tambah Data |-->
                <?php
                if (isset($_POST['simpan'])) {
                    $id_line       = $_POST['id_line'];
                    $display_name  = $_POST['display_name'];
                    $url_foto      = $_POST['url_foto'];

                    $AdmAkunLine->tambah_akun_line($id_line, $display_name, $url_foto);
                    header("location: adm_index.php?pages=akun_line");
                }
                ?>
                <!--| End: Tambah Data |-->
            </div>
        </div>
    </div>
    <!--| End: Tambah Data Modal |-->

    <!--| Start: Update Data Modal |-->
    <div id="update" class="modal fade" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header no-padding no-border">
                    <div class="table-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                            <span class="white">&times;</span>
                        </button>
                        <strong>Update Data Akun LINE</strong>
                    </div>
                </div>
                <form action="" id="form-update" method="post" enctype="multipart/form-data">
                    <div class="modal-body" id="modal_update">
                        <table class="table">
                            <tbody>
                            <tr>
                                <input type="hidden" id="id_user" name="id_user">
                                <td class="col-xs-3 col-sm-3">ID LINE</td>
                                <td class="col-xs-1 col-sm-1">:</td>
                                <td>
                                    <input type="text" id="id_line" name="id_line" class="col-xs-12 col-sm-12"/>
                                </td>
                            </tr>
                            <tr>
                                <td class="col-xs-3 col-sm-3">Display Name</td>
                                <td class="col-xs-1 col-sm-1">:</td>
                                <td>
                                    <input type="text" id="display_name" name="display_name" class="col-xs-12 col-sm-12"/>
                                </td>
                            </tr>
                            <tr>
                                <td class="col-xs-3 col-sm-3">URL Foto</td>
                                <td class="col-xs-1 col-sm-1">:</td>
                                <td>
                                    <input type="text" id="url_foto" name="url_foto" class="col-xs-12 col-sm-12"/>
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
                            Update
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <!--| Start: Update Data |-->
        <script src="../../assets/js/jquery-2.1.4.min.js"></script>
        <script type="text/javascript">
            $(document).on("click", "#update-data", function () {
                var j_id_line       = $(this).data('id_line');
                var j_display_name  = $(this).data('display_name');
                var url_foto        = $(this).data('url_foto');

                $("#modal_update #id_line").val(j_id_line);
                $("#modal_update #display_name").val(j_display_name);
                $("#modal_update #url_foto").val(url_foto);
            });

            $(document).ready(function (e) {
                $("#form-update").on("submit", (function (e) {
                    e.preventDefault();
                    $.ajax({
                        url: '../../models/admin/pu_akun_line.php',
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
        <!--| End: Update Data |-->
    </div>
    <!--| End: Update Data Modal |-->
    <!--| End: Content Area |-->

</div>
</body>

<?php
}
elseif (@$_GET['act'] == 'del') {
    $AdmAkunLine->hapus_akun_line($_GET['id']);
    header("location: ?pages=akun_line");
}
?>