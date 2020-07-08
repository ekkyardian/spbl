<?php
/**
 * Created by PhpStorm.
 * User: Ekky Ardian Fitran
 * Date: 05/04/2020
 * Time: 16:55
 */

include "../../models/ketua/KtaLaporanCetak.php";

$KtaLaporanCetak = new KtaLaporanCetak($connection);

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
    <div class="nav-search" id="nav-search"></div>
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

                    <th>No</th>
                    <th>Nama Inisial</th>
                    <th>Jenis bencana</th>
                    <th class="hidden-480">Cakupan Lokasi</th>
                    <th>Waktu Peristiwa</th>
                    <th></th>
                    <th style="visibility: hidden" class="no-border no-margin no-padding no-radius"></th>
                </tr>
                </thead>

                <tbody>
                <!--| Start: Get list Data: tb_peristiwa |-->
                <?php
                $no = 1;
                $tampil_peristiwa = $KtaLaporanCetak->tampil_peristiwa_observasi();
                while ($data = $tampil_peristiwa->fetchObject()) {
                    ?>
                    <tr>


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
                                <div class="col-sm-6 no-padding">
                                    <form action="../../models/ketua/analisis_laporan.php" method="post" id="analisis_laporan">
                                        <input type="hidden" name="id_peristiwa" id="id_peristiwa" value="<?php echo $data->id_peristiwa; ?>" />
                                        <input type="hidden" name="laporan_tahap1" id="laporan_tahap1" value="<?php echo $data->laporan_tahap1; ?>" />
                                        <input type="hidden" name="laporan_tahap2" id="laporan_tahap2" value="<?php echo $data->laporan_tahap2; ?>" />
                                        <input type="hidden" name="tujuan" id="tujuan" value="cetak" />
                                        <a class="blue" href="javascript:{}" onclick="document.getElementById('analisis_laporan').submit();">
                                            <i class="ace-icon glyphicon glyphicon-print bigger-130"></i>
                                        </a>
                                    </form>
                                </div>
                                <div class="col-sm-6 no-padding">
                                    <form action="../../models/ketua/analisis_laporan.php" method="post" id="analisis_laporan2">
                                        <input type="hidden" name="id_peristiwa" id="id_peristiwa" value="<?php echo $data->id_peristiwa; ?>" />
                                        <input type="hidden" name="laporan_tahap1" id="laporan_tahap1" value="<?php echo $data->laporan_tahap1; ?>" />
                                        <input type="hidden" name="laporan_tahap2" id="laporan_tahap2" value="<?php echo $data->laporan_tahap2; ?>" />
                                        <input type="hidden" name="tujuan" id="tujuan" value="pdf" />
                                        <a class="red" href="javascript:{}" onclick="document.getElementById('analisis_laporan2').submit();">
                                            <i class="fa fa-file-pdf-o bigger-130"></i>
                                        </a>
                                    </form>
                                </div>
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
                        <td style="visibility: hidden" class="no-border no-margin no-padding no-radius"></td>
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