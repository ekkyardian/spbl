<?php
include "../../models/admin/AdmPeristiwaBencana.php";

$AdmPeristiwaBencana = new AdmPeristiwaBencana($connection);

if (@$_GET['act'] == '') {

?>

<div class="breadcrumbs ace-save-state" id="breadcrumbs">

    <!--| Start: URL Navigasi (Breadcrumb) |-->
    <ul class="breadcrumb">
        <li>
            <i class="ace-icon fa fa-bookmark home-icon"></i>
            <a href="?pages=beranda">SPBL</a>
        </li>
        <li class="active">Peristiwa Bencana</li>
    </ul>
    <!--| End: URL Navigasi (Breadcrumb) |-->

    <!--| Start: Search Navigasi |-->
    <div class="nav-search" id="nav-search">
        <form class="form-search">
        <span class="input-icon">
            <input type="text" placeholder="Search ..." class="nav-search-input"
                   id="nav-search-input" autocomplete="off"/>
            <i class="ace-icon fa fa-search nav-search-icon"></i>
        </span>
        </form>
    </div>
    <!--| End: Search Navigasi |-->
</div>
<div class="page-content">

    <!--| Start: Content Area |-->
    <div class="page-header">
        <h1>
            Peristiwa Bencana
            <small>
                <i class="ace-icon fa fa-angle-double-right"></i>
                Daftar Peristiwa Bencana
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
        Hasil pencarian untuk data peristiwa bencana
    </div>

    <!--| Start: Tabel Peristiwa Bencana |-->
    <div class="row">
        <div class="col-sm-12">
            <table id="dynamic-table" class="table table-striped table-bordered table-hover">
                <thead>
                <tr>
                    <th class="center">
                        <label class="pos-rel">
                            <input type="checkbox" class="ace"/>
                            <span class="lbl"></span>
                        </label>
                    </th>
                    <th>No</th>
                    <th>Nama Inisial</th>
                    <th>Jenis bencana</th>
                    <th class="hidden-480">Cakupan Lokasi</th>

                    <th>
                        <i class="ace-icon fa fa-clock-o bigger-110 hidden-480"></i>
                        Waktu Peristiwa
                    </th>

                    <th></th>
                </tr>
                </thead>

                <tbody>
                <!--| Start: Get list Data: tb_peristiwa |-->
                <?php
                $no = 1;
                $tampil = $AdmPeristiwaBencana->tampil();
                while ($data = $tampil->fetch_object()) {
                    ?>
                    <tr>
                        <td class="center">
                            <label class="pos-rel">
                                <input type="checkbox" class="ace"/>
                                <span class="lbl"></span>
                            </label>
                        </td>

                        <td><?php echo $no++; ?></td>
                        <td><?php echo $data->nama_inisial; ?></td>
                        <td class="hidden-480"><?php echo $data->jenis_bencana; ?></td>
                        <td><?php echo $data->cakupan_lokasi; ?></td>
                        <td class="hidden-480">
                            <?php echo $data->tanggal_peristiwa; ?>&nbsp;
                            <?php echo $data->jam_peristiwa; ?>
                        </td>
                        <td>
                            <div class="hidden-sm hidden-xs action-buttons">
                                <a class="blue" href="#">
                                    <i class="ace-icon fa fa-search-plus bigger-130"></i>
                                </a>

                                <a id="update-data" role="button" class="green" data-toggle="modal" data-target="#update"
                                   data-id_peristiwa="<?php echo $data->id_peristiwa; ?>"
                                   data-jenis_bencana="<?php echo $data->jenis_bencana; ?>"
                                   data-nama_inisial="<?php echo $data->nama_inisial; ?>"
                                   data-cakupan_lokasi="<?php echo $data->cakupan_lokasi; ?>"
                                   data-tanggal_peristiwa="<?php echo $data->tanggal_peristiwa; ?>"
                                   data-jam_peristiwa="<?php echo $data->jam_peristiwa; ?>">
                                    <i class="ace-icon fa fa-pencil bigger-130"></i>
                                </a>

                                <a href="?pages=peristiwa_bencana&act=del&id=<?php echo $data->id_peristiwa; ?>"
                                   onclick="return confirm('Hapus data?')" class="red">
                                    <i class="ace-icon fa fa-trash-o bigger-130"></i>
                                </a>
                            </div>

                            <div class="hidden-md hidden-lg">
                                <div class="inline pos-rel">
                                    <button class="btn btn-minier btn-yellow dropdown-toggle" data-toggle="dropdown"
                                            data-position="auto">
                                        <i class="ace-icon fa fa-caret-down icon-only bigger-120"></i>
                                    </button>

                                    <ul class="dropdown-menu dropdown-only-icon dropdown-yellow dropdown-menu-right dropdown-caret dropdown-close">
                                        <li>
                                            <a href="#" class="tooltip-info" data-rel="tooltip" title="View">
                                    <span class="blue">
                                        <i class="ace-icon fa fa-search-plus bigger-120"></i>
                                    </span>
                                            </a>
                                        </li>

                                        <li>
                                            <a href="#" class="tooltip-success" data-rel="tooltip" title="Edit">
                                    <span class="green">
                                        <i class="ace-icon fa fa-pencil-square-o bigger-120"></i>
                                    </span>
                                            </a>
                                        </li>

                                        <li>
                                            <a href="#" class="tooltip-error" data-rel="tooltip" title="Delete">
                                    <span class="red">
                                        <i class="ace-icon fa fa-trash-o bigger-120"></i>
                                    </span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </td>
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
                        <strong>Tambah Data Peristiwa Bencana</strong>
                    </div>
                </div>
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="modal-body">
                        <table class="table">
                            <tbody>
                            <tr>
                                <td class="col-xs-3 col-sm-3">Nama Inisial</td>
                                <td class="col-xs-1 col-sm-1">:</td>
                                <td>
                                    <input type="text" id="nama_inisial" name="nama_inisial"
                                           placeholder="Nama Inisial" class="col-xs-12 col-sm-12"/>
                                </td>
                            </tr>
                            <tr>
                                <td class="col-xs-3 col-sm-3">Jenis Bencana</td>
                                <td class="col-xs-1 col-sm-1">:</td>
                                <td>
                                    <select class="form-control" id="jenis_bencana" name="jenis_bencana">
                                        <option value="">Jenis Bencana...</option>
                                        <option value="Banjir">Banjir</option>
                                        <option value="Tanah Longsor">Tanah Longsor</option>
                                        <option value="Kebakaran">Kebakaran</option>
                                        <option value="Gempa Bumi">Gempa Bumi</option>
                                        <option value="Tsunami">Tsunami</option>
                                        <option value="Kekeringan">Kekeringan</option>
                                        <option value="Gunung Meletus">Gunung Meletus</option>
                                        <option value="Angin Topan/Beliung">Angin Topan/Beliung</option>
                                        <option value="abah Penyakit">Wabah Penyakit</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td class="col-xs-3 col-sm-3">Cakupan Lokasi</td>
                                <td class="col-xs-1 col-sm-1">:</td>
                                <td>
                                    <textarea class="form-control limited col-xs-12 col-sm-12" id="cakupan_lokasi"
                                              name="cakupan_lokasi" maxlength="200" rows="5"></textarea>
                                </td>
                            </tr>
                            <tr>
                                <td class="col-xs-3 col-sm-3">Waktu Kejadian</td>
                                <td class="col-xs-1 col-sm-1">:</td>
                                <td>
                                    <input type="date" id="tanggal_peristiwa" name="tanggal_peristiwa"
                                           class="col-xs-5 col-sm-5"/>
                                    <input type="time" id="jam_peristiwa" name="jam_peristiwa"
                                           class="col-xs-3 col-sm-3"/>
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
                    $jenis_bencana = $connection->conn->real_escape_string($_POST['jenis_bencana']);
                    $nama_inisial = $connection->conn->real_escape_string($_POST['nama_inisial']);
                    $cakupan_lokasi = $connection->conn->real_escape_string($_POST['cakupan_lokasi']);
                    $tanggal_peristiwa = $connection->conn->real_escape_string($_POST['tanggal_peristiwa']);
                    $jam_peristiwa = $connection->conn->real_escape_string($_POST['jam_peristiwa']);

                    $AdmPeristiwaBencana->simpan($jenis_bencana, $nama_inisial, $cakupan_lokasi, $tanggal_peristiwa, $jam_peristiwa);
                    header("location: adm_index.php?pages=peristiwa_bencana");
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
                        <strong>Update Data Peristiwa Bencana</strong>
                    </div>
                </div>
                <form action="" id="form-update" method="post" enctype="multipart/form-data">
                    <div class="modal-body" id="modal_update">
                        <table class="table">
                            <tbody>
                            <tr>
                                <input type="hidden" id="id_peristiwa" name="id_peristiwa">
                                <td class="col-xs-3 col-sm-3">Nama Inisial</td>
                                <td class="col-xs-1 col-sm-1">:</td>
                                <td>
                                    <input type="text" id="nama_inisial" name="nama_inisial"
                                           placeholder="Nama Inisial" class="col-xs-12 col-sm-12"/>
                                </td>
                            </tr>
                            <tr>
                                <td class="col-xs-3 col-sm-3">Jenis Bencana</td>
                                <td class="col-xs-1 col-sm-1">:</td>
                                <td>
                                    <select class="form-control" id="jenis_bencana" name="jenis_bencana">
                                        <option value="">Jenis Bencana...</option>
                                        <option value="Banjir">Banjir</option>
                                        <option value="Tanah Longsor">Tanah Longsor</option>
                                        <option value="Kebakaran">Kebakaran</option>
                                        <option value="Gempa Bumi">Gempa Bumi</option>
                                        <option value="Tsunami">Tsunami</option>
                                        <option value="Kekeringan">Kekeringan</option>
                                        <option value="Gunung Meletus">Gunung Meletus</option>
                                        <option value="Angin Topan/Beliung">Angin Topan/Beliung</option>
                                        <option value="abah Penyakit">Wabah Penyakit</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td class="col-xs-3 col-sm-3">Cakupan Lokasi</td>
                                <td class="col-xs-1 col-sm-1">:</td>
                                <td>
                                    <textarea class="form-control limited col-xs-12 col-sm-12" id="cakupan_lokasi"
                                              name="cakupan_lokasi" maxlength="200" rows="5"></textarea>
                                </td>
                            </tr>
                            <tr>
                                <td class="col-xs-3 col-sm-3">Waktu Kejadian</td>
                                <td class="col-xs-1 col-sm-1">:</td>
                                <td>
                                    <input type="date" id="tanggal_peristiwa" name="tanggal_peristiwa"
                                           class="col-xs-5 col-sm-5"/>
                                    <input type="time" id="jam_peristiwa" name="jam_peristiwa"
                                           class="col-xs-3 col-sm-3"/>
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
                var j_id_peristiwa = $(this).data('id_peristiwa');
                var j_jenis_bencana = $(this).data('jenis_bencana');
                var j_nama_inisial = $(this).data('nama_inisial');
                var j_cakupan_lokasi = $(this).data('cakupan_lokasi');
                var j_tanggal_peristiwa = $(this).data('tanggal_peristiwa');
                var j_jam_peristiwa = $(this).data('jam_peristiwa');
                $("#modal_update #id_peristiwa").val(j_id_peristiwa);
                $("#modal_update #jenis_bencana").val(j_jenis_bencana);
                $("#modal_update #nama_inisial").val(j_nama_inisial);
                $("#modal_update #cakupan_lokasi").val(j_cakupan_lokasi);
                $("#modal_update #tanggal_peristiwa").val(j_tanggal_peristiwa);
                $("#modal_update #jam_peristiwa").val(j_jam_peristiwa);
            });

            $(document).ready(function (e) {
                $("#form-update").on("submit", (function (e) {
                    e.preventDefault();
                    $.ajax({
                        url: '../../models/admin/pu_peristiwa_bencana.php',
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

<!--[if !IE]> -->
<script src="../../assets/js/jquery-2.1.4.min.js"></script>
<!-- <![endif]-->

<!--[if IE]>
<script src="../../assets/js/jquery-1.11.3.min.js"></script>
<![endif]-->

<script type="text/javascript">
    if ('ontouchstart' in document.documentElement) document.write("<script src='../../assets/js/jquery.mobile.custom.min.js'>" + "<" + "/script>");
</script>

<!-- page specific plugin scripts -->
<script src="../../assets/js/jquery.dataTables.min.js"></script>
<script src="../../assets/js/jquery.dataTables.bootstrap.min.js"></script>
<script src="../../assets/js/dataTables.buttons.min.js"></script>
<script src="../../assets/js/buttons.flash.min.js"></script>
<script src="../../assets/js/buttons.html5.min.js"></script>
<script src="../../assets/js/buttons.print.min.js"></script>
<script src="../../assets/js/buttons.colVis.min.js"></script>
<script src="../../assets/js/dataTables.select.min.js"></script>

<!-- inline scripts related to this pages -->

<?php
} else if (@$_GET['act'] == 'del') {
    $AdmPeristiwaBencana->hapus($_GET['id']);
    header ("location: ?pages=peristiwa_bencana");
}
?>