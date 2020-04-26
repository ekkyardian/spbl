<?php
/**
 * Created by PhpStorm.
 * User: Ekky Ardian Fitran
 * Date: 05/04/2020
 * Time: 16:55
 */

include "../../models/ketua/KtaLaporanAnalisis.php";

$KtaLaporanAnalisis = new KtaLaporanAnalisis($connection);
?>

<div class="breadcrumbs ace-save-state" id="breadcrumbs">

    <!--| Start: URL Navigasi (Breadcrumb) |-->
    <ul class="breadcrumb">
        <li>
            <i class="ace-icon fa fa-bookmark home-icon"></i>
            <a href="?pages=beranda">SPBL</a>
        </li>
        <li class="active">Laporan Analisis</li>
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
    <!--| Start: Content Title |-->
    <div class="page-header">
        <h1>
            Laporan Analisis
            <small>
                <i class="ace-icon fa fa-angle-double-right"></i>
                Daftar Hasil Analisis dengan Metode SMART
            </small>
        </h1>
    </div>
    <!--| End: Content Title |-->

    <div class="table-header">
        Hasil pencarian untuk data peristiwa bencana
    </div>

    <!--| Start: Tabel Laporan Analisis |-->
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
                $tampil_peristiwa = $KtaLaporanAnalisis->tampil_peristiwa();
                while ($data = $tampil_peristiwa->fetch_object()) {
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
                                    <i class="ace-icon glyphicon glyphicon-print bigger-130"></i>
                                </a>

                                <a href="#" class="hidden-sm hidden-xs action-buttons red">
                                    <i class="fa fa-file-pdf-o bigger-130"></i>
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
    <!--| End: Tabel Laporan Analisis |-->
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