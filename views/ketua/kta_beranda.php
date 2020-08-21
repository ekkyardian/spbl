<?php
/**
 * Created by PhpStorm.
 * User: Ekky Ardian Fitran
 * Date: 05/04/2020
 * Time: 16:52
 */
?>

<body class="no-skin">
<div class="breadcrumbs ace-save-state" id="breadcrumbs">
    <!--| Start: URL Navigasi (Breadcrumb) |-->
    <ul class="breadcrumb">
        <li>
            <i class="ace-icon fa fa-bookmark home-icon"></i>
            <a href="?pages=beranda">Ketua</a>
        </li>
        <li class="active">Beranda</li>
    </ul>
    <!--| End: URL Navigasi (Breadcrumb) |-->
    <!--| Start: Search Navigasi |-->
    <div class="nav-search" id="nav-search"></div>
    <!--| End: Search Navigasi |-->
</div>
<div class="page-content">
    <!--| Start: Content Area |-->
    <div class="row">
        <!-- Wewenang Admin -->
        <div class="col-xs-12 col-md-6 col-lg-6">
            <h3 class="header smaller lighter blue">Tugas dan Wewenang <strong>Ketua Pelaksana</strong></h3>
            <div class="widget-box">
                <div class="widget-body">
                    <div class="widget-main padding-20" style="line-height: 25px">
                        <!-- Content here -->
                        <table>
                            <tr>
                                <td valign="top"><i class="ace-icon fa fa-check bigger-110 green"></i></td>
                                <td>&nbsp;</td>
                                <td>
                                    Menerima laporan yang merekap secara keseluruhan suatu peristiwa bencana yang terjadi,
                                    teridiri dari berita bencana, hasil observasi lapangan, analisis bantuan logistik
                                    prioritas, dan rincian kebutuhan logistik (dalam bentuk paket dan satuan)
                                </td>
                            </tr>
                            <tr>
                                <td valign="top"><i class="ace-icon fa fa-check bigger-110 green"></i></td>
                                <td>&nbsp;</td>
                                <td>
                                    Mengubah nilai bobot kriteria setiap alternatif yang digunakan sistem dalam
                                    proses analisis
                                </td>
                            </tr>
                            <tr>
                                <td valign="top"><i class="ace-icon fa fa-check bigger-110 green"></i></td>
                                <td>&nbsp;</td>
                                <td>Mengedit informasi akun/profile pribadi</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- Petunjuk Penggunaan -->
        <div class="col-lg-6 col-md-6">
            <h3 class="header smaller lighter blue">Petunjuk Penggunaan</h3>
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div id="accordion" class="accordion-style1 panel-group">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                                        <i class="ace-icon fa fa-angle-down bigger-110" data-icon-hide="ace-icon fa fa-angle-down" data-icon-show="ace-icon fa fa-angle-right"></i>
                                        &nbsp;Pembobotan
                                    </a>
                                </h4>
                            </div>
                            <div class="panel-collapse collapse in" id="collapseOne">
                                <div class="panel-body">
                                    <p>
                                        Halaman Pembobotan dapat diakses melalui <strong>Navigasi Menu > <a href="?pages=pembobotan">Pembobotan</a></strong>.
                                        Pada halaman ini Anda dapat melihat rincian kriteria, nilai utility, dan bobot untuk setiap alternatif yang digunakan oleh sistem
                                        untuk melakukan <strong>analisis bantuan logistik prioritas</strong>. Anda dapat mengubah nilai Bobot setiap Alternatif melalui tombol
                                        <img src="../../assets/images/gallery/perbarui_profile.png" height="30px"> yang terletak dibagian bawah tabel setiap Alternatif.
                                    </p>
                                    <p>
                                        Ada empat alternatif/solusi yang ada pada sistem ini, yang mana itu mengacu pada jenis bantuan logistik yang ada. Alternatif tersebut
                                        diantaranya adalah:
                                        <ul>
                                            <li>Paket Pangan;</li>
                                            <li>Paket Sandang;</li>
                                            <li>Paket Kematian; dan</li>
                                            <li>Paket Lainnya.</li>
                                        </ul>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
                                        <i class="ace-icon fa fa-angle-right bigger-110" data-icon-hide="ace-icon fa fa-angle-down" data-icon-show="ace-icon fa fa-angle-right"></i>
                                        &nbsp;Laporan Analisis
                                    </a>
                                </h4>
                            </div>
                            <div class="panel-collapse collapse" id="collapseThree">
                                <div class="panel-body">
                                    Halaman Laporan Analisis dapat diakses melalui <strong>Navigasi Menu > <a href="?pages=laporan_analisis">Laporan Analisis</a></strong>.
                                    Gunakan tombol <img src="../../assets/images/gallery/print.png" height="20"> untuk mencetak/melihat laporan analisis,  dan gunakan tombol
                                    <img src="../../assets/images/gallery/pdf.png" height="20"> untuk mendownload laporan analisis dalam bentuk PDF. 
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
                                        <i class="ace-icon fa fa-angle-right bigger-110" data-icon-hide="ace-icon fa fa-angle-down" data-icon-show="ace-icon fa fa-angle-right"></i>
                                        &nbsp;Profile
                                    </a>
                                </h4>
                            </div>
                            <div class="panel-collapse collapse" id="collapseTwo">
                                <div class="panel-body">
                                    Halaman Profile dapat diakses melalui <strong>Navigasi Menu > <a href="?pages=profile">Profile</a></strong>.
                                    Melalui halaman ini Anda dapat melihat informasi akun Anda, seperti nama lengkap, jenis kelamin, username, password, dan hak akses.
                                    Anda dapat mengedit informasi tersebut melalui tombol <img src="../../assets/images/gallery/perbarui_profile.png" height="30px">
                                    <p>Selain itu pada halaman ini juga Anda akan menemukan tombol <strong>Logout</strong> untuk keluar dari sistem.</p>
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseLima">
                                        <i class="ace-icon fa fa-angle-right bigger-110" data-icon-hide="ace-icon fa fa-angle-down" data-icon-show="ace-icon fa fa-angle-right"></i>
                                        &nbsp;Keluar dari Sistem (Logout)
                                    </a>
                                </h4>
                            </div>
                            <div class="panel-collapse collapse" id="collapseLima">
                                <div class="panel-body">
                                    Anda dapat keluar dari sistem melalui navigasi <strong>Welcome > Logout</strong> (lokasi: pojok kanan atas). Atau Anda juga dapat menemukan
                                    tombol Logout pada halaman Profile/Akun Pribadi: <strong>Menu Navigasi > <a href="?pages=profile">Profile</a></strong>.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- /.row -->
        </div>
    </div>
    <!--| End: Content Area |-->
</div>
</body>