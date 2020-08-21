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
            <a href="?pages=beranda">TRC</a>
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
            <h3 class="header smaller lighter blue">Tugas dan Wewenang <strong>Tim Reaksi Cepat (TRC)</strong></h3>
            <div class="widget-box">
                <div class="widget-body">
                    <div class="widget-main padding-20" style="line-height: 25px">
                        <!-- Content here -->
                        <table>
                            <tr>
                                <td valign="top"><i class="ace-icon fa fa-check bigger-110 green"></i></td>
                                <td>&nbsp;</td>
                                <td>Melaporkan data hasil observasi lapangan pada form peristiwa bencana yang sudah disediakan</td>
                            </tr>
                            <tr>
                                <td valign="top"><i class="ace-icon fa fa-check bigger-110 green"></i></td>
                                <td>&nbsp;</td>
                                <td>Mengedit data hasil observasi lapangan (bila diperlukan)</td>
                            </tr>
                            <tr>
                                <td valign="top"><i class="ace-icon fa fa-check bigger-110 green"></i></td>
                                <td>&nbsp;</td>
                                <td>Mengakses sistem pelaporan data observasi lapangan melalui aplikasi LINE Messenger</td>
                            </tr>
                            <tr>
                                <td valign="top"><i class="ace-icon fa fa-check bigger-110 green"></i></td>
                                <td>&nbsp;</td>
                                <td>Mengedit data akun/profile pribadi</td>
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
                                        &nbsp;Observasi Lapangan
                                    </a>
                                </h4>
                            </div>
                            <div class="panel-collapse collapse in" id="collapseOne">
                                <div class="panel-body">
                                    <p>
                                        Halaman Observasi Lapangan dapat diakses melalui <strong>Navigasi Menu > <a href="?pages=observasi_lapangan">Observasi Lapangan</a></strong>.
                                        Berikut adalah beberapa aksi yang dapat anda lakukan pada halaman ini:
                                    </p>
                                    <ul>
                                        <li>
                                            <strong>Input/Edit Data</strong>. Klik tombol <img src="../../assets/images/gallery/edit2.png" height="20"> pada baris data yang diinginkan
                                            untuk membuka Form Input/Edit data observasi lapangan. Lengkapi form isian, kemudian klik tombol <strong>Simpan</strong>
                                            untuk menyimpan data.
                                            
                                            <div class="alert alert-warning" style="text-align: justify; margin-bottom: 5px;">
                                            <strong>Catatan!</strong> Tombol Input/Edit data hanya akan muncul pada peristiwa bencana yang dimana Anda <strong>diberikan izin</strong>
                                            untuk melakukan input/edit. Pemberian izin ini dilakukan oleh user dengan Hak Akses/Level <strong>Admin</strong>. Sebagai gantinya apabila
                                            Anda tidak memiliki izin mengedit data, Anda hanya dapat melihat hasil observasi lapangan beserta informasi user yang ditugaskan untuk
                                            menginput dan mengedit data tersebut.
                                            </div>
                                        </li>
                                        <li>
                                            <strong>Lihat Hasil Observasi</strong>. Klik tombol <img src="../../assets/images/gallery/lihat_hasil_obs.png" height="20">
                                            pada baris peristiwa bencana untuk melihat data hasil observasi lapangan. Tombol ini hanya akan muncul ketika Anda tidak memiliki izin
                                            untuk menginput/mengedit data tersebut.
                                        </li>
                                        <li>
                                            <strong>Penanggung Jawab</strong>. Gunakan tombol <img src="../../assets/images/gallery/penanggung_jawab2.png" height="20">
                                            untuk melihat siapa user yang ditugaskan (diberi izin) untuk menginput/mengedit data observasi lapangan peristiwa bencana tertentu.
                                            Tombol ini juga hanya akan muncul ketika Anda tidak memiliki izin menginput/mengedit data observasi lapangan tersebut.
                                        </li>
                                        <li>
                                            <strong>Status <img src="../../assets/images/gallery/open.png" height="20px"></strong> menandakan bahwa data observasi lapangan
                                            peristiwa bencana tersebut masih dalam proses observasi (masih dapat mengalami perubahan).
                                        </li>
                                        <li>
                                            <strong>Status <img src="../../assets/images/gallery/closed.png" height="20px"></strong> menandakan bahwa data observasi lapangan
                                            peristiwa bencana tersebut masih dalam proses observasi (masih dapat mengalami perubahan).
                                        </li>
                                        <li>
                                            <strong>Pencarian Data</strong>. Gunakan fitur <img src="../../assets/images/gallery/search.png" height="30"> untuk mencari
                                            data berdasarkan kriteria tertentu. Tuliskan <i>key word</i> data yang ingin Anda cari, selanjutnya data akan otomatis
                                            ditampilkan pada tabel.
                                        </li>
                                    </ul>
                                    <div class="alert alert-info" style="text-align: justify;">
                                        <strong>Informasi!</strong> Anda juga dapat melakukan pelaporan hasil observasi lapangan menggunakan aplikasi <strong>LINE Messenger</strong>
                                        melalui smartphone Anda. Untuk informasi selengkapnya silahkan hubungi <strong>Admin</strong>.
                                    </div>
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